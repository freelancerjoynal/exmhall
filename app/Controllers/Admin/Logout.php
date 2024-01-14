<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController AS BaseController;
class Logout extends BaseController {
  
  public function __construct(){
    
    
  }
  
	public function frontend_logout(){    			
		
		session()->remove('is_logged_in');
    return redirect()->to(base_url('')); 
  }  
	
  public function admin_logout(){    			
		
		session()->remove('is_admin_logged_in');
    return redirect()->to(base_url('')); 
  }    
}
?>
