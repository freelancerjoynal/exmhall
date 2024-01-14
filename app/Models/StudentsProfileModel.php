<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentsProfileModel extends Model
{	
  
		
		public function get_packages() {
		
			$sql = "SELECT * FROM ".TBL_PACKAGES;
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray(); 
			$this->db->close();
			return $result;
		}
		
		public function get_each_package($package_id) {
		
			$sql = "SELECT * FROM ".TBL_PACKAGES . " WHERE id = " . (int)$package_id;
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray(); 
			$this->db->close();
			return $result;
		}
		
		public function get_student_profile_data($student_id) {
		
			$sql = "SELECT * FROM ".TBL_STUDENTS." WHERE id = " . (int)$student_id;
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray(); 
			$this->db->close();
			return $result;
		}
		
		
}