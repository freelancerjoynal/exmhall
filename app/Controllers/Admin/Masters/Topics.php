<?php
namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\TopicsModel;
use App\Models\Admin\SubjectsModel;

class Topics extends BaseController
{
	public function __construct(){
		if(!session()->get('is_admin_logged_in')) {
			$this->manual_redirect('admin/logout');
		}
		
		$this->TopicsModel = new TopicsModel();
		$this->SubjectsModel = new SubjectsModel();
	}

	
	
	public function topic_delete($topic_id)
	{
		if(isset($topic_id) && $topic_id) {
				
				$conditions = ['id' => $topic_id];
				$return_data = $this->SettingsModel->data_delete(TBL_TOPICS, $conditions);
				if($return_data) {
					$this->session->setFlashdata('success', 'Topic Deleted');
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
				}
			
		}
		
		return redirect()->to(base_url('admin/masters/topics')); 
	}
	
	public function topic_add()
	{
		$data = array();
		$data['form_action'] = base_url('admin/masters/topic-add-save');
		$data['all_classes'] = $this->SubjectsModel->all_classes_details();
		//$data['all_subjects'] = $this->TopicsModel->all_subjects_details();
		
		if ($this->request->getMethod() === 'post')
         {
			
				$formData = $this->request->getPost(); 
				
				$insert_data = [
						'subject_id'		=>	$formData['subject_id'],
						'topic_name'		=>	$formData['topic_name'],
					//pre($formData)
					
				];
				
				$insert_id = $this->SettingsModel->data_insert(TBL_TOPICS, $insert_data);
				if($insert_id) {
						
					$this->session->setFlashdata('success', 'Topic added');
					return redirect()->to(base_url('admin/masters/topics')); 
				} else {
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
					return redirect()->to(base_url('admin/masters/topic_add'));
				}
				
		}
		
		return $this->loadtemplateadmin('Admin/masters/topics/topics-form', $data);
	}
	
	
	public function topics_edit($topic_id = null)
	{
		
		$data = array();
		$data['form_action'] = base_url('admin/masters/topic-edit-save');
		
		
		
		if ($this->request->getMethod() === 'post')
		{
				$formData = $this->request->getPost();
				
				$last_update = date('Y-m-d H:i:s');
				$update_data = [
					'subject_id'							=>	$formData['subject_id'],
					'topic_name'							=>	$formData['topic_name'],
					'last_update'							=>	$last_update,
				];
				
					$conditions = ['id' => $formData['id']];
					$affected = $this->SettingsModel->data_update(TBL_TOPICS, $update_data, $conditions);
					if($affected) {
						
						$this->session->setFlashdata('success', 'Topic Updated');
						return redirect()->to(base_url('admin/masters/topics')); 
					} else {
						$this->session->setFlashdata('error', 'Sorry, something went wrong');
						return redirect()->to(base_url('admin/masters/topic-edit/' . $formData['id'])); 
					}
				
		}
		
		// Autofill
		$data['topic_details'] = $this->TopicsModel->get_topic_details($topic_id);
		//$data['all_subjects'] = $this->TopicsModel->all_subjects_details();
		$data['all_classes'] = $this->SubjectsModel->all_classes_details();
		
		
		//$data['all_classes'] = $this->SubjectsModel->all_classes_details();
		//pre($data);
		
		
		return $this->loadtemplateadmin('Admin/masters/topics/topics-form', $data);
	}
	
	public function topics_list()
	{
		
		$data = array();
		$data['topics_list'] = $this->TopicsModel->get_topics_list();
		//pre($data);
		return $this->loadtemplateadmin('Admin/masters/topics/topics-list', $data);
	}
	
	
	
	
}
