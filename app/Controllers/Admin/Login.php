<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\LoginModel;
//use CodeIgniter\Controller;

class Login extends BaseController
{
	public function __construct(){
		if(session()->get('is_admin_logged_in')) {
			if(session()->get('account_type') == 2) {
				$this->manual_redirect();
			} else {
				$this->manual_redirect('admin/dashboard');
			}
		}
		
		$this->LoginModel = new LoginModel();
	}
	
	public function index()
	{
		$data = array();
		$data['form_action'] = base_url('admin');
		$data['site_details']	=	$this->site_details;
		
		if ($this->request->getMethod() === 'post')
    {
			if($this->validation->run($this->request->getPost(), 'admin_login')) {
				$formData = $this->request->getPost();
				$return_data = $this->LoginModel->login($formData);
				
				if(!empty($return_data)) {
					setAdminLoginSessionData($return_data);  // store login details into session
					return redirect()->to(base_url('admin/dashboard')); 
				}
				else {
					$this->session->setFlashdata('error', 'Invalid username or password');
					return redirect()->to(base_url('admin')); 
				}
			} 
			else {
				$this->session->setFlashdata('error', $this->validation->listErrors());
				return redirect()->to(base_url('admin')); 
			}
    }
		
		return view('Admin/login', $data);
	}
	


}
