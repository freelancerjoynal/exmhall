<?php
namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\SubjectsModel;

class Subjects extends BaseController
{
	public function __construct()
	{
		if(!session()->get('is_admin_logged_in')) 
		{
			$this->manual_redirect('admin/logout');
		}
		
	$this->SubjectsModel = new SubjectsModel();
	}
	public function subject_add()
	{
		$data = array();
	    $data['form_action'] = base_url('admin/masters/subject-add-save');
		$data['all_classes'] = $this->SubjectsModel->all_classes_details();
		
		if ($this->request->getMethod() === 'post')
		{
			$formData = $this->request->getPost(); 
			$insert_data = [
				'class_id'			=>	$formData['class_id'],
				'subject_name'		=>	$formData['subject_name'],
			   ];
				
			$insert_id = $this->SettingsModel->data_insert(TBL_SUBJECTS, $insert_data);
			if($insert_id) {
						
			$this->session->setFlashdata('success', 'Subject added');
			return redirect()->to(base_url('admin/masters/subjects')); 
			} 
			else 
			{
			$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/masters/subject-add'));
			}
				
		}
		
		return $this->loadtemplateadmin('Admin/masters/subjects/subjects-form', $data);
	}


	public function subjects_list()
	{
		
		$data = array();
		$data['subjects_list'] = $this->SubjectsModel->get_subjects_list();
		
		return $this->loadtemplateadmin('Admin/masters/subjects/subjects-list', $data);
	}
	
	public function subjects_edit($subject_id = null)
	{
		
		$data = array();
		$data['form_action'] = base_url('admin/masters/subject-edit-save');
		
		
		if ($this->request->getMethod() === 'post')
		{
				$formData = $this->request->getPost();
				
				$last_update = date('Y-m-d H:i:s');
				$update_data = [
					'class_id'								=>	$formData['class_id'],
					'subject_name'							=>	$formData['subject_name'],
					'last_update'							=>	$last_update,
				];
				
					$conditions = ['id' => $formData['id']];
					$affected = $this->SettingsModel->data_update(TBL_SUBJECTS, $update_data, $conditions);
					if($affected) {
						
					$this->session->setFlashdata('success', 'Subject Updated');
					return redirect()->to(base_url('admin/masters/subjects')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/masters/subject-edit/' . $formData['id'])); 
				}
				
		}
		
		// Autofill
		$data['subject_details'] = $this->SubjectsModel->get_subject_details($subject_id);
		$data['all_classes'] = $this->SubjectsModel->all_classes_details();
		//pre($data);
		
		
		return $this->loadtemplateadmin('Admin/masters/subjects/subjects-form', $data);
	}
	
	public function subject_delete($subject_id)
	{
		if(isset($subject_id) && $subject_id) {
				
				$conditions = ['id' => $subject_id];
				$return_data = $this->SettingsModel->data_delete(TBL_SUBJECTS, $conditions);
				if($return_data) {
					$this->session->setFlashdata('success', 'Class Deleted');
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
				}
			
		}
		
		return redirect()->to(base_url('admin/masters/subjects')); 
	}
	
	
	
	
	
}
