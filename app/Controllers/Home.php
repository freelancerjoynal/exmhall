<?php

namespace App\Controllers;

//use App\Models\Admin\ProductsModel;

class Home extends BaseController
{
	public function __construct(){
		//$this->ProductsModel = new ProductsModel();
	}
	
	public function index()
	{
		$data = array();
		
		
		return $this->loadtemplate('home', $data);
	}
	

	
}
