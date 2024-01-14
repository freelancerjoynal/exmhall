<?php 
namespace App\Controllers;

use App\Controllers\BaseController AS BaseController;
use App\Models\StudentsModel;
//use CodeIgniter\Controller;

class StudentsLogin extends BaseController
{
	public function __construct(){
		/*if(session()->get('is_admin_logged_in')) {
			if(session()->get('account_type') == 2) {
				$this->manual_redirect();
			} else {
				$this->manual_redirect('admin/dashboard');
			}
		}*/
		
		$this->StudentsModel = new StudentsModel();
	}
	
	public function login_auth()
	{
		$data = array();
		$response_arr = array('status' => 0, 'msg' => '', 'data' => '');
		
		if ($this->request->getMethod() === 'post')
    {
			$formData = $this->request->getPost();
			$student_data = $this->StudentsModel->login($formData);
			
			if(!empty($student_data)) {
				$student_details = $this->StudentsModel->get_each_student_data(array('id' => $student_data['id']));
				setLoginSessionData($student_details);
				$response_arr['status'] = 1;
				$this->session->setFlashdata('success_profile', 'Logged in successfully');
			}
    }
		
		echo json_encode($response_arr);
	}
	


}
