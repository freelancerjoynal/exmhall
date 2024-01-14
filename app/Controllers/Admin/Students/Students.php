<?php
namespace App\Controllers\Admin\Students;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\StudentsModel;

class Students extends BaseController
{
	public function __construct(){
		if(!session()->get('is_admin_logged_in')) {
			$this->manual_redirect('admin/logout');
		}
		
		$this->StudentsModel = new StudentsModel();
	}
	
	public function students_list()
	{ 
		$data = array();
		$data['students'] = $this->StudentsModel->get_students_list();
		
		
		return $this->loadtemplateadmin('Admin/students/students-list', $data);
	}
	
	public function status_edit($student_id = null)
	{
			$student_details = $this->StudentsModel->get_student_details($student_id);
			
			if($student_details && !empty($student_details['package_id'])) {
				
				$last_update = date('Y-m-d H:i:s');
				$package_duration = $student_details['package_duration'];
				$expire_update = date('Y-m-d H:i:s', strtotime('+ '. $package_duration .'days'));
				$update_data = [
					'status'								=>	'1',
					'expire_date'						=>	$expire_update,
					'last_update'						=>	$last_update,
				];
				
				$conditions = ['id' => $student_id];
				$affected = $this->SettingsModel->data_update(TBL_STUDENTS, $update_data, $conditions);
				if($affected) {
					$this->session->setFlashdata('success', 'Status Updated');
				}
				else 
				{
					$this->session->setFlashdata('error', 'Sorry, something went wrong');
				}
				
			}
			else {
				$this->session->setFlashdata('error', 'Sorry, user has not choosen any plan yet');
			}
			
			return redirect()->to(base_url('admin/students')); 
				
	}
	
	function searchBooks() {
        $data = array();
		$data['students'] = $this->StudentsModel->getSearchStudent();
		return $this->loadtemplateadmin('Admin/students/students-list', $data);
    }
	
}
