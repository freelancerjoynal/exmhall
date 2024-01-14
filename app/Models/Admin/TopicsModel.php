<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class TopicsModel extends Model
{
		
		public function get_topics_list() 
		{
			$sql = "SELECT T.*, S.subject_name, C.id AS class_id, C.class_name FROM ".TBL_TOPICS." AS T";
			$sql .= " LEFT JOIN " . TBL_SUBJECTS . " AS S ON S.id = T.subject_id" ;
			$sql .= " LEFT JOIN " . TBL_CLASSES . " AS C ON C.id = S.class_id" ;
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray();   //  For multiple row return
			//$result = $db->getRowArray(); //  For single row return
			$this->db->close();
			//pre($result);
			return $result;
		}
		
		
	    public function get_topic_details($topic_id) {
			
			$sql = "SELECT T.*, C.id AS class_id, C.class_name FROM ".TBL_TOPICS." AS T";
			$sql .= " LEFT JOIN " . TBL_SUBJECTS . " AS S ON S.id = T.subject_id" ;
			$sql .= " LEFT JOIN " . TBL_CLASSES . " AS C ON C.id = S.class_id" ;
			$sql .= " WHERE T.id = " . $topic_id;
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray();
			$this->db->close();
			
			return $result;
			
		}
		
		public function all_subjects_details() 
		{
			$sql = "SELECT * FROM " .TBL_SUBJECTS;
			$db = $this->db->query($sql);
			$result = $db->getResultArray();
			$this->db->close();
			return $result;
		}
		
		
}