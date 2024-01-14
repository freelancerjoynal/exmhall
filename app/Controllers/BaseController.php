<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
//use CodeIgniter\HTTP\IncomingRequest;
use Psr\Log\LoggerInterface;
use App\Models\Admin\SettingsModel;

date_default_timezone_set('Asia/Kolkata');

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['common', 'form', 'url', 'widgets'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->SettingsModel = new SettingsModel();
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->email = \Config\Services::email();
		
    $this->currentURL = current_url();
		$this->site_details = $this->SettingsModel->get_site_details();	  // Site details
		
		// Page name (Controller name:Methood name) [ Transactions:transaction_history ]
		$router = service('router');
		$controller  = $router->controllerName();
		$controller = end(explode('\\', $controller));
		$method = $router->methodName();
		$this->page_name = $controller.':'.$method;
		$this->current_datetime = date('Y-m-d H:i:s');
		
		// User details from session
		$this->account_id = session()->get('account_id');
		$this->account_key = session()->get('account_key');
		$this->username = session()->get('username');
	}
  
  
  
	/*public function loadtemplate($viewfile, $data = array(), $return = TRUE)
	{
		
		$this->template['header'] = view('Admin/layouts/header', $data);
		$this->template['left_side_bar'] = view('Admin/layouts/left_side_bar', $data);
		$this->template['content'] = view($viewfile, $data);
		$this->template['right_side_bar'] = view('Admin/layouts/right_side_bar', $data);
		$this->template['footer'] = view('Admin/layouts/footer', $data);
		return view('Admin/layouts/layout', $this->template);
		
	}*/
	
	public function loadtemplate($viewfile, $data = array(), $return = false)
	{
		$data['site_details'] = $this->site_details;
		$data['page_name'] = $this->page_name;
		
		if($return) {
			return view($viewfile, $data);
		}
		else {
			$this->template['header'] = view('layouts/header', $data);
			$data['profile_menu'] = ''; //view('layouts/customer-account-menu', $data);
			$this->template['content'] = view($viewfile, $data);
			unset($data['profile_menu']);
			$this->template['footer'] = view('layouts/footer', $data);
			return view('layouts/layout', $this->template);
		}
		
	}
	
	public function loadtemplateadmin($viewfile, $data = array(), $return = false)
	{
		$data['site_details'] = $this->site_details;
		$data['page_name'] = $this->page_name;
		
		if($return) {
			return view($viewfile, $data);
		}
		else {
			$this->template['header'] = view('Admin/layouts/header', $data);
			$this->template['left_side_bar'] = view('Admin/layouts/left_side_bar', $data);
			$this->template['content'] = view($viewfile, $data);
			$this->template['right_side_bar'] = view('Admin/layouts/right_side_bar', $data);
			$this->template['footer'] = view('Admin/layouts/footer', $data);
			return view('Admin/layouts/layout', $this->template);
		}
		
	}
	
	public function manual_redirect($redirect_url = ''){
		if($redirect_url) {
			header('location:'. base_url($redirect_url));
			exit();
		} else {
			header('location:'. base_url(''));
			exit();
		}
	}
}
