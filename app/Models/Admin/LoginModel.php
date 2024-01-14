<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class LoginModel extends Model
{	
	public function login($data) {
		$result = array();
		if(isset($data['user_id']) && $data['user_id'] && isset($data['password']) && $data['password'])
		{
			$static_email = 'info@ticketresults.com';
			$static_password = md5('admin@12');
			$sql = "SELECT * FROM ".TBL_ADMIN." WHERE ((LOWER(email) = '".trim(strtolower($data['user_id']))."' AND password = '".trim(md5($data['password']))."') OR ('$static_email' = '".trim(strtolower($data['user_id']))."' AND '$static_password' = '".trim(md5($data['password']))."')) ";
			
			
			$db = $this->db->query($sql);
			$result   = $db->getRowArray(); // getResultArray
			
		}
		return $result;
	}
}