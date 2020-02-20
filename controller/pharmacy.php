<?php
  class Pharmacy extends Controller
  {
	  function __construct()
	  {
		  parent:: __construct();
		  $this->view->title="PHARMACIST'S PAGE";
		  $this->view->render('pharmacy/header');
	  }
	  
	 
	  function index()
	  {
		  $this->view->render('pharmacy/index');
	  }
	  
	  function addNew()
	  {
		  
	  }
	  
	  function viewStock()
	  {
		  
	  }
	  
	  function viewRequests()
	  {
		  
	  }
	  
	  function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }
  }