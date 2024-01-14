<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class SubjectsModel extends Model
{
		public function get_subjects_list() 
		{
			$sql = "SELECT S.*, C.class_name FROM ".TBL_SUBJECTS . " AS S";
			$sql .= " LEFT JOIN ".TBL_CLASSES . " AS C ON C.id = S.class_id";
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray();   //  For multiple row return
			//$result = $db->getRowArray(); //  For single row return
			$this->db->close();
			//pre($result);
			return $result;
		}
		
		
		public function get_subject_details($subject_id) 
		{
			$sql = "SELECT * FROM ".TBL_SUBJECTS. " WHERE id = " . $subject_id;
			$db = $this->db->query($sql);
			$result = $db->getRowArray();
			$this->db->close();
			return $result;
		}
		
		public function all_classes_details() 
		{
			$sql = "SELECT * FROM " .TBL_CLASSES;
			$db = $this->db->query($sql);
			$result = $db->getResultArray();
			$this->db->close();
			return $result;
		}
		
		
		
}