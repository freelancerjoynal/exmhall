<?php
namespace App\Controllers;

use App\Controllers\BaseController AS BaseController;
use App\Models\StudentExamModel;

class StudentExam extends BaseController
{
	public function __construct(){
		if(!session()->get('is_logged_in')) {
			$this->manual_redirect('#login');
		}
		else {
			
			// Check Membership
			$user_data = session()->get('user_data');
			$today_date = date('Y-m-d H:i:s');
			
			if($user_data['status'] != 1) {
				session()->setFlashdata('error_profile', 'Your account is not active');
				$this->manual_redirect('profile');
			}
			else if(empty($user_data['package_id']) || empty($user_data['transaction_id'])) {
				session()->setFlashdata('error_profile', 'Please choose any membership plan');
				$this->manual_redirect('profile');
			}
			else if(strtotime($user_data['expire_date']) <= strtotime($today_date)) {
				session()->setFlashdata('error_profile', 'Your membership plan is expired. Please renew');
				$this->manual_redirect('profile');
			}
			
			//echo '<pre>'; print_r(session()->get('user_data')); die;
			
			
		}
		
		$this->StudentExamModel = new StudentExamModel();
	}
	
	public function student_exams()
	{
		$data = array();
		// Filter section
		$data['all_classes'] = $this->StudentExamModel->all_classes_details();
		
		$data['exams_list'] = $this->StudentExamModel->get_all_exams();
		$data['exams_list'] = $this->loadtemplate('exam/exam-list-loop', $data, true);
		
		
		session()->remove('student_exam_result');
		session()->remove('student_exam_final_result');
		
		return $this->loadtemplate('exam/exam-list', $data); 
		
	}
	
	public function student_exam_check($exam_id)
	{
		$student_id = session()->get('user_data')['id'];
		$ongoing_exam = $this->StudentExamModel->student_exam_check($exam_id, $student_id);
		if($ongoing_exam) {
			$ongoing_exam['part_completed'] = (int)$ongoing_exam['part_completed'];
			$part_id = (isset($ongoing_exam['part_completed']) && $ongoing_exam['part_completed'] < 5 ? $ongoing_exam['part_completed']+1 : 1);
		}
		else {
			
			$exam_attempts = [
				'quiz_id'			=>	$exam_id,
				'user_id'			=>	$student_id
			];
			
			$insert_id = $this->SettingsModel->data_insert(TBL_QUIZ_ATTEMPTS, $exam_attempts);
			$part_id = 1;
		}
		
		return redirect()->to(base_url('exam' . '/' . $exam_id . '/' . $part_id));
		
	}
	
	public function student_exam($exam_id, $part_id)
	{
		$data = array();
		
		if($part_id > 5) return redirect()->to(base_url('exams'));
		
		$student_id = session()->get('user_data')['id'];
		$ongoing_exam = $this->StudentExamModel->student_exam_check($exam_id, $student_id);
		session()->set('exams_attempt_id', $ongoing_exam['attempt_id']);
		session()->set('exams_part_id', $part_id);
		
		$data['part_id'] = $part_id;
		$data['exams_details'] = $this->StudentExamModel->get_exam_details($exam_id, $part_id);
		$data['exams_questions_list'] = $this->StudentExamModel->exam_questions_list($exam_id, $part_id);
		
		session()->remove('student_exam_result');
		session()->remove('student_exam_final_result');
		
		session()->set('exams_details', $data['exams_details']);  // To prevent multiple sql call
		session()->set('exams_questions_list', $data['exams_questions_list']);  // To prevent multiple sql call
		//pre($data['exams_questions_list']);
		
		return $this->loadtemplate('exam/exam-panel', $data);
		
	}
	
	public function exam_answers_submit()
	{
		
		$data = array();
		$exams_details = session()->get('exams_details');
		$exams_questions_list = session()->get('exams_questions_list');
		$student_id = session()->get('user_data')['id'];
			
		if ($this->request->getMethod() === 'post' && !empty($exams_details) && !empty($exams_questions_list))
    {
			
			$formData = $this->request->getPost();
			if($formData && !empty($exams_questions_list)) {
					
				$student_final_result = array();
				$student_final_result['total_marks'] = 0;
				$student_final_result['total_obtained_marks'] = 0;
				$student_final_result['total_questions'] = 0;
				$student_final_result['total_correct_answers'] = 0;
				$student_final_result['total_wrong_answers'] = 0;
				$student_final_result['total_skipped_answers'] = 0;
				$student_final_result['percentage'] = 0;
				$student_final_result['part_id'] = session()->get('exams_part_id');
				
				foreach($exams_questions_list as $question_key => $question_details) {
					
					$student_result = array();
					$question_id = $question_details['question_id'];
					$correct_answers = json_decode($question_details['correct_answers'], true);
					$correct_answer = !empty($correct_answers) && is_array($correct_answers) ? $correct_answers[0] : array();
					$student_result['correct_answer'] = $correct_answer;
					$student_final_result['total_questions'] = count($exams_questions_list);
					$student_final_result['total_marks'] += $question_details['correct_marks'];
					
					if(!empty($formData['exam_question']) && array_key_exists($question_id, $formData['exam_question'])) {
						
						$answer_given = $formData['exam_question'][$question_id];
						
						$student_result['is_skipped'] = 0;
						$student_result['answer'] = $answer_given;
						
						if(strtolower(trim($answer_given)) == strtolower(trim($correct_answer))) {
							// Correct answer
							$student_result['is_correct'] = 1;
							$student_final_result['total_obtained_marks'] += $question_details['correct_marks'];
							$student_final_result['total_correct_answers'] += 1;
						}
						else {
							// Wrong answer
							$student_result['is_correct'] = 0;
							$student_final_result['total_wrong_answers'] += 1;
						}
						
					}
					else {
						// Skipped answer
						$student_result['is_skipped'] = 1;
						$student_final_result['total_skipped_answers'] += 1;
						
					}
					
					
					// Result save into array
					$exams_questions_list[$question_key]['student_result'] = $student_result;
					
				}
					
				// Percentage calculate
				
				$student_final_result['percentage'] = ($student_final_result['total_obtained_marks'] * 100) / $student_final_result['total_marks'];
				$student_final_result['percentage'] = round($student_final_result['percentage']);
				
				session()->set('student_exam_result', $exams_questions_list);
				session()->set('student_exam_final_result', $student_final_result);
				
				$result_json = array(
					'student_exam_result'				=>  $exams_questions_list,
					'student_exam_final_result' =>	$student_final_result
				);
				
				
				// DATA SAVE INTO TABLE
				/*$exam_attempts = array(
					'quiz_id'						=>	$exams_details['quiz_id'],
					'user_id'						=>	$student_id,
					'marks'							=>	$student_final_result['total_obtained_marks'],
					'correct_answers'		=>	$student_final_result['total_correct_answers'],
					'wrong_answers'			=>	$student_final_result['total_wrong_answers'],
					'skipped_answers'		=>	$student_final_result['total_skipped_answers'],
					'percentage'				=>	$student_final_result['percentage'],
					'result_json'				=>	json_encode($result_json),
					'status'						=>	1,
				);
				
				$insert_id = $this->SettingsModel->data_insert(TBL_QUIZ_ATTEMPTS, $exam_attempts);*/
				
				$quiz_attempts_parts = array(
					'attempt_id'				=>	session()->get('exams_attempt_id'),
					'part_id'						=>	session()->get('exams_part_id'),
					'correct_answers'		=>	$student_final_result['total_correct_answers'],
					'wrong_answers'			=>	$student_final_result['total_wrong_answers'],
					'skipped_answers'		=>	$student_final_result['total_skipped_answers'],
					'total_marks'				=>	$student_final_result['total_marks'],
					'obtained_marks'		=>	$student_final_result['total_obtained_marks'],
					'percentage'				=>	$student_final_result['percentage'],
					'result_json'				=>	json_encode($result_json),
				);
				
				$insert_id = $this->SettingsModel->data_insert(TBL_QUIZ_ATTEMPTS_PARTS, $quiz_attempts_parts);
				if($insert_id) {
					
					// UPDATE ATTEMPTS TABLE
					$last_update = date('Y-m-d H:i:s');
					$update_data = [
						'part_completed'				=>	session()->get('exams_part_id'),
						'last_update'						=>	$last_update,
					];
					
					// IF LAST PART THEN SET STATUS AS EXAM COMPLETED
					if(session()->get('exams_part_id') && session()->get('exams_part_id') == 5) {
						$update_data['status'] = 1;
					}
				
					$conditions = ['attempt_id' => session()->get('exams_attempt_id')];
					$affected = $this->SettingsModel->data_update(TBL_QUIZ_ATTEMPTS, $update_data, $conditions);
					
					return redirect()->to(base_url('exam-result'));
				}
				else {
					return redirect()->to(base_url('exams'));
				}
				
				
			}
		
		}
		else {
			return redirect()->to(base_url('exams'));
		}
		
	}
	
	public function exam_result()
	{
		
		$data['exams_details'] = session()->get('exams_details');
		$student_exam_result = session()->get('student_exam_result');
		$student_exam_final_result = session()->get('student_exam_final_result');
		
		if($student_exam_result && !empty($student_exam_result) && !empty($student_exam_final_result)) {
			
			$data['student_exam_result'] = $student_exam_result;
			$data['student_exam_final_result'] = $student_exam_final_result; 
			
			//pre($student_exam_final_result);
			return $this->loadtemplate('exam/exam-result', $data);
			
		}
		else {
			return redirect()->to(base_url('exams'));
		}
		
		
	}
	
	
	
	//  Exam listing filters ajax call
	public function ajax_get_subject_list() {
		 
		 $html = '<option value=""> Select your subject </option>';
		 if ($this->request->getMethod() === 'post')
			{
				
					$class_id = $this->request->getPost('class_id');
					if($class_id) {
						
						$subjects_list = $this->StudentExamModel->ajax_get_subject_list($class_id);
						if(!empty($subjects_list)) {
							
							
							foreach($subjects_list as $subject_details) {
								
								$html .= '<option value="'. $subject_details["id"] .'" '. $is_selcted .' > '. $subject_details["subject_name"] .' </option>';
								
							} 
							
						}
						
					}
					
					
			}
			
			echo json_encode($html);
		 
	 }
	 
	 public function ajax_get_topic_list() {
		 
		 $html = '<option value=""> Select your topic </option>';
		 if ($this->request->getMethod() === 'post')
			{
				
				$subject_id = $this->request->getPost('subject_id');
				if($subject_id) {
					
					$topic_list = $this->StudentExamModel->ajax_get_topic_list($subject_id);
					if(!empty($topic_list)) {
						
						
						foreach($topic_list as $topic_details) {
							
							$html .= '<option value="'. $topic_details["id"] .'" '. $is_selcted .' > '. $topic_details["topic_name"] .' </option>';
							
						} 
						
					}
					
				}
					
			}
			
			echo json_encode($html);
		 
	 }
	 
	 
	 public function ajax_exam_advance_filter() {
		 
		 $exams_list = '';
		 if ($this->request->getMethod() === 'post')
			{
				
				$post_data = $this->request->getPost();
				
				if($post_data) {
					
					$data['exams_list'] = $this->StudentExamModel->get_all_exams($post_data);
					$exams_list = $this->loadtemplate('exam/exam-list-loop', $data, true);
					
				}
					
			}
			
			echo $exams_list;
		 
	 }
	
	
	
	
	
	
	
}
