<?php
namespace App\Controllers\Admin\Settings;

use App\Controllers\BaseController AS BaseController;

class Settings extends BaseController
{
	public function __construct(){
		if(!session()->get('is_admin_logged_in')) {
			$this->manual_redirect('admin/logout');
		}
		
	}
	
	public function site_settings()
	{
		
		$data = array();
		$data['form_action'] = base_url('admin/site-settings-save');
		
		if ($this->request->getMethod() === 'post')
    {
			
				$formData = $this->request->getPost(); 
				
				$updated_at = date('Y-m-d H:i:s');
				$update_data = [
					'admin_account_details'			=>	$formData['admin_account_details'],
					'updated_at'								=>	$updated_at,
				];
				
				$affectedRows = $this->SettingsModel->site_details_update($update_data, $formData['id']);
				if($affectedRows) {
						
					$this->session->setFlashdata('success', 'Settings details saved');
					return redirect()->to(base_url('admin/site-settings')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/site-settings'));
				}
				
		}
		 
		
		return $this->loadtemplateadmin('Admin/settings/settings-form', $data);
	}
	
	
}
