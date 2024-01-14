<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class StudentsModel extends Model
{
		public function get_students_list($filter = array()) {
			
			
			$conditions = " WHERE 1=1";
			if(array_key_exists('id', $filter) && $filter['id']) {
				$conditions .= " AND id = ". (int)$filter['id'];
			}
			
			$sql = "SELECT * FROM ".TBL_STUDENTS." ORDER BY `created_at` DESC" ;
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray(); 
			$this->db->close();
			return $result;
		}
		
		public function get_student_details($student_id) {
			
			$sql = "SELECT * FROM " . TBL_STUDENTS. " WHERE id = " . (int)$student_id;
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray(); 
			$this->db->close();
			return $result;
		}
		
		public function getSearchStudent($searchBook) {
            if(empty($searchBook))
               return array();
        
            $result = $this->db->like('name', $searchBook)
                     ->or_like('mobile', $searchBook)
                     ->get('name');
        
            return $result;
        } 
		
}