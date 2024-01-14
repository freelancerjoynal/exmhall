<?php
namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\ClassesModel;

class Classes extends BaseController
{
	public function __construct(){
		if(!session()->get('is_admin_logged_in')) {
			$this->manual_redirect('admin/logout');
		}
		
		$this->ClassesModel = new ClassesModel();
	}

	public function classes_list()
	{
		$data = array();
		$data['classes_list'] = $this->ClassesModel->get_classes_list();
		return $this->loadtemplateadmin('Admin/masters/classes/classes-list', $data);
	}
	
	public function class_add()
	{
		
		$data = array();
		$data['form_action'] = base_url('admin/masters/class-add-save');
		
		if ($this->request->getMethod() === 'post')
    {
			
				$formData = $this->request->getPost(); 
				
				$insert_data = [
					'class_name'					=>	$formData['class_name'],
				];
				
				$insert_id = $this->SettingsModel->data_insert(TBL_CLASSES, $insert_data);
				if($insert_id) {
						
					$this->session->setFlashdata('success', 'Class added');
					return redirect()->to(base_url('admin/masters/classes')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/masters/class-add'));
				}
				
		}
		
		
		return $this->loadtemplateadmin('Admin/masters/classes/classes-form', $data);
	}
	
	public function class_edit($class_id = null)
	{
		
		$data = array();
		$data['form_action'] = base_url('admin/masters/class-edit-save');
		
		if ($this->request->getMethod() === 'post')
		{
				$formData = $this->request->getPost();
				
				$last_update = date('Y-m-d H:i:s');
				$update_data = [
					'class_name'								=>	$formData['class_name'],
					'last_update'								=>	$last_update,
				];
				
					$conditions = ['id' => $formData['id']];
					$affected = $this->SettingsModel->data_update(TBL_CLASSES, $update_data, $conditions);
					if($affected) {
						
					$this->session->setFlashdata('success', 'Class Updated');
					return redirect()->to(base_url('admin/masters/classes')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/masters/class-edit/' . $formData['id'])); 
				}
				
		}
		
		
		// Autofill
		$data['class_details'] = $this->ClassesModel->get_class_details($class_id);
		//pre($data['class_details']);
		
		return $this->loadtemplateadmin('Admin/masters/classes/classes-form', $data);
	}
	
	public function class_delete($class_id)
	{
		if(isset($class_id) && $class_id) {
				
				$conditions = ['id' => $class_id];
				$return_data = $this->SettingsModel->data_delete(TBL_CLASSES, $conditions);
				if($return_data) {
					$this->session->setFlashdata('success', 'Class Deleted');
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
				}
			
		}
		
		return redirect()->to(base_url('admin/masters/classes')); 
	}
	
}
