<?php
  class Doctor extends Controller
  {
	  public $url='';
	  public $userid='';
	   function __construct()
	   {
		    parent::__construct();
			
		   Session::init();
		    if(Session::get('loggedIn')==true && substr(Session::get('priv'),0, 2)=='DC')
		   {
		   $this->userid=Session::get('sessionid'); 
		   $this->url=lcfirst(__CLASS__);
		   $this->view->url='doctor';
		   $this->view->headertitle='DOCTOR PORTAL';
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
		    'VIEW PATIENT SCHEDULE'=>$dir.'/patient_schedule', 
			'DAILY REPORTS'=>$dir.'/reports',
			'MY SCHEDULE'=>$dir.'/schedule',
		    'LOGOUT'=>$dir.'/logout');
		   
		   return $menu;
	   }
	  
	  function patient_schedule()
	  {
		  $this->loadModel('doctor');
		  $this->view->schedule=$this->model->get_schedule($this->userid);
		  $this->view->render('doctor/patients');
	  }
	  
	  function consult($case_id, $pid)
	  {
		  
		  $this->loadModel('patients');
		  $this->view->vital_signs=$this->model->vital_signs($pid);
		  $this->view->caseHistory=$this->model->medicalHistory($pid);
		  $this->view->pid=$pid;
		  $this->view->url=$this->url;
		  $this->loadModel('drugs');
		  $this->view->drugs=$this->model->getDrugs();
		  $this->loadModel('case');
		  $this->view->patient_case=$this->model->view_case($case_id);
		  $this->view->patient_vitals=$this->model->get_vitals($case_id);
		  $this->view->render($this->url.'/consult');
		  //$this->view->render($this->url.'/panel');
	  }
	  
	  function patient_case($caseid)
	  {
		  
	  }
	  
	  function testrefer($pid)
	  {
		  
		  $this->view->render($this->url.'/test');
	  }
	  
	  function medicalHistory()
	  {
	  }
	  
	  function editProfile()
	  {
	  }
	  
	  function save_case($caseid)
	  {
		  
		  $height='';
		  $weight='';
		  $bmi='';
		  $temperature='';
		  $pulse='';
		  $bp='';
		  $complaints='';
		  $symptoms='';
		  $diagnosis='';
		  $comments='';
		  $prescription='';
		  $tests='';
		  $ref='';
		 
		  $this->loadModel('case');
		  
		  if(isset($_POST['ref']))
		  {
			  $ref=$_POST['ref'];
		  }
		 
		  if(isset($_POST['height']))
		  {
			 $height=$this->sanitize($_POST['height']);
		  }
		  
		   if(isset($_POST['weight']))
		  {
			  $weight=$this->sanitize($_POST['weight']);
		  }
		  
		  if(isset($_POST['bmi']))
		  {
			  $bmi=$this->sanitize($_POST['bmi']);
		  }
		  
		  if(isset($_POST['temp']))
		  {
			  $temperature=$this->sanitize($_POST['temp']);
		  }
		  
		  if(isset($_POST['pulse']))
		  {
			 $pulse=$this->sanitize($_POST['pulse']);
		  }
		  if(isset($_POST['bp']))
		  {
			  $bp=$this->sanitize($_POST['bp']);
		  }
		  if(isset($_POST['complaints']))
		  {
			  $complaints=$this->sanitize($_POST['complaints']);
		  }
		  if(isset($_POST['symptoms']))
		  {
			 $symptoms =$this->sanitize($_POST['symptoms']);
		  }
		  if(isset($_POST['diagnosis']))
		  {
			  $diagnosis=$this->sanitize($_POST['diagnosis']);
		  }
		  if(isset($_POST['comments']))
		  {
			  $comments=$this->sanitize($_POST['comments']);
		  }
		  if(isset($_POST['prescription']))
		  {
			  $prescriptions=$_POST['prescription'];
			  foreach($prescriptions as $drugs)
			  {
				 $prescription=implode(',', $prescriptions);
			  }
		  }
		  if(isset($_POST['tests']))
		  {
			  $tests=$this->sanitize($_POST['tests']);
		  }
		  
		  if(isset($_POST['vitalsbtn']))
		  {
			  $date=date('Y-m-d');
			  $data=array('caseid'=>$caseid,'date'=>$date, 'height'=>$height, 'weight'=>$weight, 'BMI'=>$bmi, 'temperature'=>$temperature, 'pulse'=>$pulse, 'BP'=>$bp);
			  
			  $this->model->update_vitals($ref, $data);
		  }
		  
		  
		if(isset($_POST['physicalExambtn']))
		{
			$data=array('symptom'=>$symptoms, 'complaints'=>$complaints, 'diagnosis'=>$diagnosis, 'comments'=>$comments);
			$this->model->update_case($caseid, $data);
	    }
		
		if(isset($_POST['prescbtn']))
		{
			$data=array('prescription'=>$prescription);
			$this->model->update_case($caseid, $data);
	    }
		
		if(isset($_POST['allbtn']))
		{
			$data=array('caseStatus'=>1);
			$this->model->update_case($caseid, $data);
	    }
		
		header("location:javascript://history.go(-1)");
      }
	  function schedule()
	  {
		  $this->view->render($this->url.'/select');
	  }
	  
	  function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }
  }