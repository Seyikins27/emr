<?php
 class Radiology extends Controller
  {
	   public $url='';
	   function __construct()
	   {
		   parent::__construct();
		   $this->url=lcfirst(__CLASS__);
		   $this->view->url='radiology';
		   $this->view->headertitle='RADIOLOGIST';
		   $this->view->menuitems=$this->menu();
		   $this->view->render('templates/header');
		   $this->view->render('templates/menu');
	   }
	   
	   function index()
	   {
		   $this->view->render($this->url.'/dashboard');
	   }
	   
	   function menu()
	   {
		   $dir=DIR.$this->url;
		   $menu=array('DASHBOARD'=>$dir.'/dashboard',
		   'TEST REQUESTS'=> $dir.'/test_request',
		    'LOGOUT'=>$dir.'/logout');
		   
		   return $menu;
	   }
	  
	  function test_request()
	  {
		  $this->view->render($this->url.'/test_request');
	  }
	  
	  
	  function editProfile()
	  {
	  }
	  
	  function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }
  }