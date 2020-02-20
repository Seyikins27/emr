<?php
  class Nurse extends Controller
  {
	  public $url='';
	  public $userid='';
	   function __construct()
	   {
		    parent::__construct();
		   Session::init();
		    if(Session::get('loggedIn')==true && substr(Session::get('priv'),0, 2)=='NR')
		   {
		   $this->userid=Session::get('sessionid'); 
		   $this->url=lcfirst(__CLASS__);
		   $this->view->url='nurse';
		   $this->view->headertitle='NURSE PORTAL';
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
		   $menu='';
		   if(Session::get('priv')=='NR1')
		   {
		   $menu=array('DASHBOARD'=>$dir.'/dashboard', 
			'YOUR PATIENTS'=>$dir.'/your_patients',
			'MY SCHEDULE'=>$dir.'/your_schedule',
		    'LOGOUT'=>$dir.'/logout');
		   }
		   else if(Session::get('priv')=='NR0')
		   {
            $menu=array('DASHBOARD'=>$dir.'/dashboard',
		    'ADD PATIENT TO WARD'=>$dir.'/add_to_ward', 
			'ASSIGN PATIENT TO NURSE'=>$dir.'/assign',
			'MANAGE ROASTER'=>$dir.'/manage_roaster',
			'YOUR PATIENTS'=>$dir.'/your_patients',
			'MY SCHEDULE'=>$dir.'/your_schedule',
		    'LOGOUT'=>$dir.'/logout');
			}
		   return $menu;
	   }
	   
	   function add_to_ward()
	   {
		$this->view->render($this->url.'/add'); 
	   }
	  
	  function add($pid)
	  {
		
		  $this->loadModel('components');
		  $this->view->wards=$this->model->ward();
		  $this->loadModel('patients');
		  $this->view->patient=$this->model->getPatient($pid);
		  if(isset($_POST['submit']))
		  {
			  $ward='';
			  $room='';
			  $date=date('Y-m-d');
			  $time='';
			  
			  if(isset($_POST['ward']))
			  {
				  $ward=$_POST['ward'];
				  
				  if(empty($ward))
				  {
					  echo "<span class='label label-warning'><i>SELECT A WARD</i></span>";
					  exit;
				  }
			  }
			  
			  if(isset($_POST['room_name']))
			  {
				  $room=$_POST['room_name'];
				  
				  if(empty($room))
				  {
					 echo "<span class='label label-warning'><i>SELECT A ROOM</i></span>";
					  exit;
				  }
			  }
			  
			  
			   if(isset($_POST['time']))
			  {
				  $time=$_POST['time'];
				  
				  if(empty($time))
				  {
					 echo "<span class='label label-warning'><i>INPUT THE TIIME OF ADMISSION e.g 9:00am</i></span>";
					  exit;
				  }
			  }
			  
			  $indata=array('patient_id'=>$pid, 'date_admitted'=>$date, 'time_admitted'=>$time, 'ward'=>$ward, 'room_number'=>$room, 'date_discharged'=>'0000-00-00', 'status'=>0);
			
		 $this->model->add_inpatient('inpatient_tbl', $indata);
		  }
		  
		  $this->view->render($this->url.'/addpatient');   
	  }
	  function your_patients()
	  {
		$this->view->render($this->url.'/patients');   
	  }
	  
	  function your_schedule()
	  {
		$this->view->render($this->url.'/schedule');   
	  }
	  
	  function manage_roaster()
	  {
		  $this->view->render($this->url.'/roaster');  
	  }
	  
	  function patient_schedule()
	  {
		  $this->loadModel('nurse');
		  $this->view->schedule=$this->model->get_schedule($this->userid);
		  $this->view->render('doctor/patients');
	  }
	  
	  function consult($pid)
	  {
		  $this->loadModel('patients');
		  $this->view->vital_signs=$this->model->vital_signs($pid);
		  $this->view->caseHistory=$this->model->medicalHistory($pid);
		  $this->view->pid=$pid;
		  $this->view->url=$this->url;
		  $this->loadModel('drugs');
		  $this->view->drugs=$this->model->getDrugs();
		  $this->view->render($this->url.'/consult');
		  $this->view->render($this->url.'/panel');
	  }
	  
	 
	  
	  function testrefer($pid)
	  {
		  
		  $this->view->render($this->url.'/test');
	  }
	 
	  function editProfile()
	  {
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