<?php
namespace App\Controllers;

use App\Controllers\BaseController AS BaseController;
use App\Models\StudentsProfileModel;

class StudentProfile extends BaseController
{
	public function __construct(){
		if(!session()->get('is_logged_in')) {
			$this->manual_redirect('#login');
		}
		
		$this->StudentsProfileModel = new StudentsProfileModel();
	}
	
	public function student_profile()
	{
		$data = array();
		
		$student_id = session()->get('user_data')['id'];
		$data['packages'] = $this->StudentsProfileModel->get_packages();
		$data['student_details'] = $this->StudentsProfileModel->get_student_profile_data($student_id);
		return $this->loadtemplate('students/profile', $data);
		
	}
	
	public function student_profile_save() {
		
		if ($this->request->getMethod() === 'post')
    {
			$formData = $this->request->getPost();
			$s_dob = isset($formData['s_dob']) && $formData['s_dob'] ? date('Y-m-d', strtotime($formData['s_dob'])) : null;
			$last_update = date('Y-m-d H:i:s');
			$student_id = session()->get('user_data')['id'];
			$student_details = $this->StudentsProfileModel->get_student_profile_data($student_id);
			$is_package_update = 0;
			
			$update_data = [
				'name'						=>	$formData['s_name'],
				'mobile'					=>	$formData['s_mobile'],
				'college'					=>	$formData['s_college'],
				'address'					=>	$formData['s_address'],
				'dob'							=>	$s_dob,
				'last_update'			=>	$last_update,
			];
			
			// Password update if entered
			if(isset($formData['s_password']) && $formData['s_password']) {
				$update_data['password'] = password_encryption($formData['s_password']);
			}
			
			// Package Update
			if(isset($formData['s_package']) && $formData['s_package']) {
				
				if($student_details['package_id'] != (int)$formData['s_package']) {
					
					$is_package_update = 1;
				}
				
				$package_details = $this->StudentsProfileModel->get_each_package((int)$formData['s_package']);
				$update_data['package_id'] 			 = $package_details['id'];
				$update_data['package_name']		 = $package_details['package_name'];
				$update_data['package_duration'] = $package_details['package_duration'];
				$update_data['package_amount'] 	 = $package_details['package_amount'];
			}
			
			// Transaction ID Update
			if(isset($formData['s_transaction_id']) && $formData['s_transaction_id']) {
				if(strtolower($student_details['transaction_id']) != strtolower($formData['s_transaction_id'])) {
					
					$is_package_update = 1;
				}
				
				$update_data['transaction_id'] = $formData['s_transaction_id'];
			}
			
			// Transaction Image
			if(isset($formData['s_transaction_image']) && $formData['s_transaction_image']) {
				$is_package_update = 1;
			}
			
			// Status update
			if($is_package_update) {
				
				$update_data['status'] = '0';
			}
			
			
			$conditions = ['id' => $student_id];
			$affected = $this->SettingsModel->data_update(TBL_STUDENTS, $update_data, $conditions);
			if($affected) {
				
				$this->session->setFlashdata('success_profile', 'Profile updated');
			}
			else {
				$this->session->setFlashdata('error_profile', 'Sorry, we are facing some technical issue');
			}
				
		}
		
		return redirect()->to(base_url('profile')); 
	}
	
}
