<?php
namespace App\Controllers\Admin\Exams;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\ExamsModel;

class Exams extends BaseController
{   
    public function __construct(){
		if(!session()->get('is_admin_logged_in')) {
			$this->manual_redirect('admin/logout');
		}
		
		$this->ExamsModel = new ExamsModel();
	}
	
	
	public function exam_list()
	{
		$data = array();
		$data['exam_list'] = $this->ExamsModel->all_exam_list();
		
		
		return $this->loadtemplateadmin('Admin/exams/exams-list', $data);
	}
	
	public function exam_insert()
	{
		$data = array();
		$data['form_action'] = base_url('admin/exams/exam-add-save');
		$data['all_classes'] = $this->ExamsModel->all_classes_details();
		
		if ($this->request->getMethod() === 'post')
    {
			
				$formData = $this->request->getPost(); 
				//pre($formData);
				
				$insert_data = [
					'quiz_category_id'		=>	$formData['topic_id'],
					'quiz_name'		        =>	$formData['quiz_name'],
					'quiz_seo_url'		    =>	get_seo_url($formData['quiz_name']),
					'time_limit'		    	=>	$formData['time_limit'],
				];
				
				$insert_id = $this->SettingsModel->data_insert(TBL_QUIZ, $insert_data);
				if($insert_id) {
						
					$this->session->setFlashdata('success', 'Exam added');
					return redirect()->to(base_url('admin/exams')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/exams/exam-add'));
				}
				
		}
		
		return $this->loadtemplateadmin('Admin/exams/exams-form', $data);
	 }
	 
	 public function exam_edit($exam_id = null)
	{
		
		$data = array();
		$data['form_action'] = base_url('admin/exams/exam-edit-save');
		
		
		
		if ($this->request->getMethod() === 'post')
		{
				$formData = $this->request->getPost();
				
				$last_update = date('Y-m-d H:i:s');
				$update_data = [
					'quiz_category_id'		=>	$formData['topic_id'],
					'quiz_name'		        =>	$formData['quiz_name'],
					'quiz_seo_url'		    =>	get_seo_url($formData['quiz_name']),
					'time_limit'		    	=>	$formData['time_limit'],
					'last_update'					=>	$last_update,
				];
				
				
				$conditions = ['quiz_id' => $formData['id']];
				$affected = $this->SettingsModel->data_update(TBL_QUIZ, $update_data, $conditions);
				if($affected) {
					
					$this->session->setFlashdata('success', 'Exam Updated');
					return redirect()->to(base_url('admin/exams')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/exams/exam-edit/' . $formData['id'])); 
				}
				
		}
		
		// Autofill 
		$data['exam_details'] = $this->ExamsModel->get_exam_details($exam_id);
		$data['all_classes'] = $this->ExamsModel->all_classes_details();
		
		
		return $this->loadtemplateadmin('Admin/exams/exams-form', $data);
	}
	
	public function exam_delete($exam_id) { 
		if(isset($exam_id) && $exam_id) {
				
				$conditions = ['quiz_id' => $exam_id];
				$return_data = $this->SettingsModel->data_delete(TBL_QUIZ, $conditions);
				if($return_data) {
					$this->session->setFlashdata('success', 'Exam Deleted');
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
				}
			
		}
		
		return redirect()->to(base_url('admin/exams')); 
	}
	 
	 public function ajax_get_subject_list() {
		 
		 $html = '<option value=""> Select any item </option>';
		 if ($this->request->getMethod() === 'post')
			{
				
					$class_id = $this->request->getPost('class_id');
					$selected_subject_id = $this->request->getPost('selected_subject_id');
					if($class_id) {
						
						$subjects_list = $this->ExamsModel->ajax_get_subject_list($class_id);
						if(!empty($subjects_list)) {
							
							
							foreach($subjects_list as $subject_details) {
								
								$is_selcted = '';
								if($selected_subject_id && $selected_subject_id == $subject_details["id"]) {
									$is_selcted = 'selected';
								}
								
								$html .= '<option value="'. $subject_details["id"] .'" '. $is_selcted .' > '. $subject_details["subject_name"] .' </option>';
								
							} 
							
						}
						
					}
					
					
			}
			
			echo json_encode($html);
		 
	 }
	 
	 public function ajax_get_topic_list() {
		 
		 $html = '<option value=""> Select any item </option>';
		 if ($this->request->getMethod() === 'post')
			{
				
					$subject_id = $this->request->getPost('subject_id');
					$selected_topic_id = $this->request->getPost('selected_topic_id');
					if($subject_id) {
						
						$topic_list = $this->ExamsModel->ajax_get_topic_list($subject_id);
						if(!empty($topic_list)) {
							
							
							foreach($topic_list as $topic_details) {
								
								$is_selcted = '';
								if($selected_topic_id && $selected_topic_id == $topic_details["id"]) {
									$is_selcted = 'selected';
								}
								
								$html .= '<option value="'. $topic_details["id"] .'" '. $is_selcted .' > '. $topic_details["topic_name"] .' </option>';
								
							} 
							
						}
						
					}
					
					
			}
			
			echo json_encode($html);
		 
	 }
	 
	 
	 /*============================================  QUESTIONS  ==================================================*/
	 
		public function exam_questions_list() { 
			$data = array();
			$data['exam_questions_list'] = $this->ExamsModel->exam_questions_list();
			
			return $this->loadtemplateadmin('Admin/exams/exams-question-list', $data);
		}
		
		public function exam_question_insert()
		{
			$data = array();
			$data['form_action'] = base_url('admin/exam-question-add-save');
			$data['all_exams'] = $this->ExamsModel->all_exam_list();

			if ($this->request->getMethod() === 'post')
			{
				
					$formData = $this->request->getPost(); 
					
					$correct_answer = explode(',', $formData['correct_answer']);
					$wrong_answer = explode(',', $formData['wrong_answer']);
					
					$insert_data = [
						'quiz_id'							=>	$formData['quiz_id'],
						'part_id'							=>	$formData['part_id'],
						'question'		        =>	$formData['question'],
						'correct_answers'		  =>	json_encode($correct_answer),
						'wrong_answers'		    =>	json_encode($wrong_answer),
						'correct_marks'		    =>	$formData['marks'],
					];
					
					$insert_id = $this->SettingsModel->data_insert(TBL_QUIZ_QUESTIONS, $insert_data);
					if($insert_id) {
							
						$this->session->setFlashdata('success', 'Question added');
						return redirect()->to(base_url('admin/exam-questions')); 
					} else {
						$this->session->setFlashdata('error', 'Sorry, something went wrong');
						return redirect()->to(base_url('admin/exam-question-add'));
					}
					
			}
			
			
			return $this->loadtemplateadmin('Admin/exams/exams-question-form', $data);
		}
		
		public function exam_questions_edit($exam_question_id = null)
		{
			
			$data = array();
			$data['form_action'] = base_url('admin/exam-question-edit-save');
			
			
			
			if ($this->request->getMethod() === 'post')
			{
					$formData = $this->request->getPost();
					
					$correct_answer = explode(',', $formData['correct_answer']);
					$wrong_answer = explode(',', $formData['wrong_answer']);
					$last_update = date('Y-m-d H:i:s');
					
					$update_data = [
						'quiz_id'							=>	$formData['quiz_id'],
						'part_id'							=>	$formData['part_id'],
						'question'		        =>	$formData['question'],
						'correct_answers'		  =>	json_encode($correct_answer),
						'wrong_answers'		    =>	json_encode($wrong_answer),
						'correct_marks'		    =>	$formData['marks'],
						'last_update'					=>	$last_update,
					];
					
					
					$conditions = ['question_id' => $formData['id']];
					$affected = $this->SettingsModel->data_update(TBL_QUIZ_QUESTIONS, $update_data, $conditions);
					if($affected) {
						
						$this->session->setFlashdata('success', 'Question Updated');
						return redirect()->to(base_url('admin/exam-questions')); 
					} else {
						$this->session->setFlashdata('error', 'Sorry, something went wrong');
						return redirect()->to(base_url('admin/exam-question-edit/' . $formData['id'])); 
					}
					
			}
			
			// Autofill 
			$data['exam_question_details'] = $this->ExamsModel->get_exam_question_details($exam_question_id);
			$data['all_exams'] = $this->ExamsModel->all_exam_list();
			
			return $this->loadtemplateadmin('Admin/exams/exams-question-form', $data);
		}
		
		public function exam_questions_delete($exam_question_id) {
			
			if(isset($exam_question_id) && $exam_question_id) {
					
					$conditions = ['question_id' => $exam_question_id];
					$return_data = $this->SettingsModel->data_delete(TBL_QUIZ_QUESTIONS, $conditions);
					if($return_data) {
						$this->session->setFlashdata('success', 'Question Deleted');
					} else {
						$this->session->setFlashdata('error', 'Sorry, something went wrong');
					}
				
			}
			
			return redirect()->to(base_url('admin/exam-questions')); 
		}
		
	
}

?>