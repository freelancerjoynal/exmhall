<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentExamModel extends Model
{	
  
		
		public function get_all_exams($filters = array()) {
			
			$filter_query = ' WHERE 1=1';
			if(array_key_exists('class_id', $filters) && $filters['class_id']) {
				$filter_query .= " AND C.id = " . (int)$filters['class_id'];
			}
			
			if(array_key_exists('subject_id', $filters) && $filters['subject_id']) {
				$filter_query .= " AND S.id = " . (int)$filters['subject_id'];
			}
			
			if(array_key_exists('topic_id', $filters) && $filters['topic_id']) {
				$filter_query .= " AND T.id = " . (int)$filters['topic_id'];
			}
			
		
			$sql = "SELECT Q.*, C.class_name, S.subject_name, T.topic_name, (SELECT COUNT(question_id) FROM ". TBL_QUIZ_QUESTIONS ." AS QQ WHERE QQ.quiz_id = Q.quiz_id) AS questions_count FROM ".TBL_QUIZ . " AS Q";
			$sql .= " LEFT JOIN ". TBL_TOPICS ." AS T ON T.id = Q.quiz_category_id";
			$sql .= " LEFT JOIN ". TBL_SUBJECTS ." AS S ON S.id = T.subject_id";
			$sql .= " LEFT JOIN ". TBL_CLASSES ." AS C ON C.id = S.class_id";
			$sql .= " $filter_query";
			//pre($sql);
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray(); 
			
			$this->db->close();
			return $result;
		}
		
		public function get_exam_details($exam_id, $part_id) 
		{
			$sql = "SELECT Q.*, C.id AS class_id, C.class_name, S.id AS subject_id, S.subject_name, T.id AS topic_id, T.topic_name, (SELECT COUNT(question_id) FROM ". TBL_QUIZ_QUESTIONS ." AS QQ WHERE QQ.quiz_id = Q.quiz_id AND QQ.part_id = '". $part_id ."') AS questions_count FROM ".TBL_QUIZ . " AS Q";
			$sql .= " LEFT JOIN ". TBL_TOPICS ." AS T ON T.id = Q.quiz_category_id";
			$sql .= " LEFT JOIN ". TBL_SUBJECTS ." AS S ON S.id = T.subject_id";
			$sql .= " LEFT JOIN ". TBL_CLASSES ." AS C ON C.id = S.class_id";
			$sql .= " WHERE Q.quiz_id = " . (int)$exam_id;
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray();
			$this->db->close();
			return $result;
		}
		
		public function exam_questions_list($exam_id, $part_id)  
		{
			$sql = "SELECT QQ.*, Q.quiz_name, Q.quiz_seo_url, C.class_name, S.subject_name, T.topic_name FROM ".TBL_QUIZ_QUESTIONS . " AS QQ";
			$sql .= " INNER JOIN ". TBL_QUIZ ." AS Q ON Q.quiz_id = QQ.quiz_id";
			$sql .= " LEFT JOIN ". TBL_TOPICS ." AS T ON T.id = Q.quiz_category_id";
			$sql .= " LEFT JOIN ". TBL_SUBJECTS ." AS S ON S.id = T.subject_id";
			$sql .= " LEFT JOIN ". TBL_CLASSES ." AS C ON C.id = S.class_id";
			$sql .= " WHERE Q.quiz_id = " . (int)$exam_id . ' AND QQ.part_id = ' . (int)$part_id;
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray();
			$this->db->close();
			return $result;
		}
		
		
		/*	Filter section	*/
		public function all_classes_details() 
		{
			$sql = "SELECT * FROM " .TBL_CLASSES;
			$db = $this->db->query($sql);
			$result = $db->getResultArray();
			$this->db->close();
			return $result;
		}
		
		public function ajax_get_subject_list($class_id) 
		{
			$sql = "SELECT * FROM " .TBL_SUBJECTS . " WHERE class_id = " . (int)$class_id;
			$db = $this->db->query($sql);
			$result = $db->getResultArray();
			$this->db->close();
			return $result;
		}
		
		public function ajax_get_topic_list($subject_id) 
		{
			$sql = "SELECT * FROM " .TBL_TOPICS . " WHERE subject_id = " . (int)$subject_id;
			$db = $this->db->query($sql);
			$result = $db->getResultArray();
			$this->db->close();
			return $result;
		}
		
		public function student_exam_check($exam_id, $student_id)
		{
			$sql = "SELECT * FROM " .TBL_QUIZ_ATTEMPTS . " WHERE status = 0 AND quiz_id = " . (int)$exam_id . " AND user_id = " . (int)$student_id;
			$db = $this->db->query($sql);
			$result = $db->getRowArray();
			$this->db->close();
			return $result;
		}
		
		
		
		
}