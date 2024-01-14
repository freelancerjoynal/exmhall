<?php 
namespace App\Controllers\Admin\Dashboard;

use App\Controllers\BaseController AS BaseController;
use App\Models\Admin\DashboardModel;

class Dashboard extends BaseController
{
	public function __construct(){
		if(!session()->get('is_admin_logged_in')) {
			$this->manual_redirect('logout');
		}
		$this->DashboardModel = new DashboardModel();
	}
	
	public function index()
	{
		$data = array();
		$data['dashboard_reports'] = array();// $this->DashboardModel->get_dashboard_reports();
		
		return $this->loadtemplateadmin('Admin/dashboard/dashboard', $data);
		
	}
	


}
