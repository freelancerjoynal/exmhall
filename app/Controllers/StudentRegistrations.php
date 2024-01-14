<?php
namespace App\Controllers;

use App\Controllers\BaseController AS BaseController;
use App\Models\StudentsModel;

class StudentRegistrations extends BaseController
{
	public function __construct(){
		/*if(session()->get('is_logged_in')) {
			$this->manual_redirect('admin/logout');
		}*/
		
		$this->StudentsModel = new StudentsModel();
	}
	
	public function student_registration_save()
	{
		
		$data = array();
		$response_arr = array('status' => 0, 'msg' => '', 'data' => '');
		
		if ($this->request->getMethod() === 'post')
    {
			$formData = $this->request->getPost();
			
			$insert_data = [
				'account_key'			=>	student_account_number(),
				'name'						=>	$formData['name'],
				'email'						=>	$formData['email'],
				'mobile'					=>	$formData['mobile'],
				'password'				=>	password_encryption($formData['password']),
			];
			
			$insert_id = $this->SettingsModel->data_insert(TBL_STUDENTS, $insert_data);
			if($insert_id) {
					
				$student_details = $this->StudentsModel->get_each_student_data(array('id' => $insert_id));
				setLoginSessionData($student_details);
				$response_arr['status'] = 1;
				$this->session->setFlashdata('success_profile', 'Registration successfuly');
			}
				
		}
		
		echo json_encode($response_arr);
	}
	
}
