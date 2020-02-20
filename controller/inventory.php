<?php
  
  class Inventory extends Controller
  {
	  
	  public $url='';
	  
	   function __construct()
	   {
		   parent::__construct();
		    Session::init();
		   if(Session::get('loggedIn')==true && Session::get('priv')=='IV1')
		   {
		   $this->url=lcfirst(__CLASS__);
		   $this->view->url='inventory';
		   $this->view->pagetitle='INVENTORY OFFICER';
		   $this->view->headertitle='INVENTORY PORTAL';
		   $this->loadModel('schedule');
		   $this->view->unc=$this->model->unconfirmedSchedule();
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
		   $menu=array('DASHBOARD'=>$dir.'/',
		   'ADD NEW PRODUCTS'=>$dir.'/add',
		   'RESTOCK'=>$dir.'/restock',
		   'REQUEST'=>$dir.'/request',
		   'VIEW INVENTORY'=>$dir.'/view',         
		   'LOGOUT'=>$dir.'/logout');

		   return $menu;
	   }
	   
	   function add()
	   {
		   $this->view->render($this->url.'/add');
	   }
	   
	   function restock()
	   {
		   
	   }
	   
	   function request()
	   {
		   
	   }
	   
	   function view_inventory()
	   {
	   }
	   
	  function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }

  }