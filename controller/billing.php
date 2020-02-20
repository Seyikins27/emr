<?php

  class Billing extends Controller
  {

	 public $url='';
	   function __construct()
	   {
		   parent::__construct();
		   Session::init();
		    if(Session::get('loggedIn')==true && substr(Session::get('priv'),0, 2)=='BL')
		   {
		   $this->url=lcfirst(__CLASS__);
		   $this->view->url='frontdesk';
		   $this->view->headertitle='FRONTDESK PORTAL';
		   $this->view->menuitems=$this->menu();
		   $this->view->render('templates/header');
		   $this->view->render('templates/menu');
		  }
		  else
		  {
			   session_destroy();
			   header('location:'.DIR.'index');

		  }
	   }

	   function index()
	   {
		   $this->view->render($this->url.'/dashboard');
	   }

	   function menu()
	   {
		   $dir=DIR.$this->url;
		   $menu=array('DASHBOARD'=>$dir.'/dashboard',
		   'PATIENT BILLS'=>$dir.'/patient_bills',
		    'VIEW ACCOUNTS'=>$dir.'/view_accounts',
			'DISCHARGE NOTE'=>$dir.'/discharge_note',
			'LOGOUT'=>$dir.'/logout');

		   return $menu;
	   }



	function patient_bills()
	{
		$this->view->url='billing';
		$this->loadModel('cart');
		$this->view->all=$this->model->view_pending();
		$this->view->render($this->url.'/patient_bills');
    }

	function clear($id, $ref)
	{
		$this->loadModel('cart');
		$this->model->clear($id,$ref);
    }

	function payment($ref)
	{
    $this->loadModel('cart');
    $this->view->pending=$this->model->view_uncleared_cart($ref);
    $this->view->render($this->url.'/payment');

  }

    function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }

  }
