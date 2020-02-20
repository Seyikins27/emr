<?php
  class Frontdesk extends Controller
  {

	  public $url='';
	  public $unc='';
	   function __construct()
	   {
		   parent::__construct();
		    Session::init();
		   if(Session::get('loggedIn')==true && Session::get('priv')=='FD1')
		   {
		   $this->url=lcfirst(__CLASS__);
		   $this->view->url='frontdesk';
		   $this->view->pagetitle='TRISATE FRONTDESK OFFICER';
		   $this->view->headertitle='FRONTDESK PORTAL';
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
           $this->view->render($this->url.'/unconfirmed');
	   }

	   function menu()
	   {
		   $dir=DIR.$this->url;
		   $menu=array('DASHBOARD'=>$dir.'/',
		   'ADD PATIENTS'=>$dir.'/add',
		   'VIEW PATIENTS'=>$dir.'/view_patients',
		   'SCHEDULE PATIENTS'=>$dir.'/schedule_patients',           'PATIENT BILLING'=>$dir.'/billing',
		   'AMBULANCE SERVICE'=>$dir.'/ambulance_service',           'DISCHARGE NOTE'=>$dir.'/discharge_note',
		   'LOGOUT'=>$dir.'/logout');

		   return $menu;
	   }

	  function id()
	  {
		  $length=5;
	      $rand=substr(str_shuffle("0123456789ABCDE"), 0,$length );
		  $prefix='TRPT';
		  $year=substr(date('Y'),2,2);
		  $id=$prefix.$year.$rand;
		  return $id;
	  }

	  function ref()
	  {
	  $length=5;
	      $rand=substr(str_shuffle("0123456789ABCDE"), 0,$length );

		  return $rand;
	  }

	  function add()
	  {
		 $this->loadModel('components');
		 $this->view->countries=$this->model->countries();

	     $message=array();
		 Session::init();
		 $_SESSION['fields']=array();

		 if(isset($_POST['submit']))
		 {
			$fname='';
			$lname='';
			$oname='';
			$fname='';
			$occupation='';
			$gender='';
			$marital_status='';
			$dob='';
			$noc='';
			$bg='';
			$gno='';
			$nationality='';
			$soo='';
			$lga='';
			$phone='';
			$email='';
			$addr='';
			$nkname='';
			$nkphone='';
			$nkaddr='';

			if(isset($_POST['first_name']))
			{

			$fname=$this->sanitize($_POST['first_name']);
			$_SESSION['fields']['fname']=$fname;
				if(empty($fname) || trim($fname)=="")
				{
				$message['fname_error']='First name field is empty';
				}
			}

			if(isset($_POST['last_name']) )
			{
			$lname=$this->sanitize($_POST['last_name']);
			$_SESSION['fields']['lname']=$lname;
				if(empty($lname)|| trim($fname)=="")
				{
				$message['lname_errors']='Last name field is empty';
				}
			}

			if(isset($_POST['other_name']))
			{

			$oname=$this->sanitize($_POST['other_name']);
			$_SESSION['fields']['oname']=$oname;
				if(empty($oname)|| trim($oname)=="")
				{
				$message['oname_errors']='Other name field is empty';
				}
			}

			if(isset($_POST['occupation']))
			{
			$occupation=$this->sanitize($_POST['occupation']);        $_SESSION['fields']['occupation']=$occupation;
				if(empty($occupation))
				{
					$message['occ_errors']='Occupation field is empty';
				}
			}

			if(isset($_POST['gender']))
			{
			$gender=$this->sanitize($_POST['gender']);
			$_SESSION['fields']['gender']=$gender;
			   if(empty($gender))
				{
				$message['gender_errors']='Gender field is empty';
				}
			}

			if(isset($_POST['marital_status']))
			{
				$marital_status=$this->sanitize($_POST['marital_status']);
				$_SESSION['fields']['marital']=$marital_status;
				if(empty($marital_status))
				{
					$message['marital_errors']='Marital Status field is empty';
				}
			}

			if(isset($_POST['dob']))
			{
				$dob=$this->sanitize($_POST['dob']);
				$_SESSION['fields']['dob']=$dob;
				if(empty($dob))
				{
					$message['dob_errors']='Date of birth is empty';
				}
			}

			if(isset($_POST['noc']))
			{
				$noc=$this->sanitize($_POST['noc']);
				$_SESSION['fields']['noc']=$noc;

			}

			if(isset($_POST['bg']))
			{
				$bg=$this->sanitize($_POST['bg']);
			    $_SESSION['fields']['bg']=$bg;
				if(empty($bg))
				{
					$message['bg_errors'][]='Select your blood group';
				}
			}
			if(isset($_POST['gno']))
			{
				$gno=$this->sanitize($_POST['gno']);
				$_SESSION['fields']['gno']=$gno;
				if(empty($gno))
				{
					$message['gno_errors']='Select your genotype';
				}
			}
			if(isset($_POST['nationality']))
			{
				$nationality=$this->sanitize($_POST['nationality']);
			   $_SESSION['fields']['nationality']=$nationality;
				if(empty($nationality))
				{
					$message['nation_errors']='Select your country';
				}
			}
			if(isset($_POST['soo']))
			{
				$soo=$this->sanitize($_POST['soo']);
			   $_SESSION['fields']['soo']=$soo;
			}

			if(isset($_POST['lga']))
			{
				$lga=$this->sanitize($_POST['lga']);
				$_SESSION['fields']['lga']=$lga;
			}

			if(isset($_POST['phone']))
			{
				$phone=$this->sanitize($_POST['phone']);
				$_SESSION['fields']['phone']=$phone;
				if(empty($phone))
				{
					$message['phone_errors']='Enter your phone number';
				}
			}

			if(isset($_POST['email']))
			{
			$email=$this->sanitize_email($_POST['email']);
			$_SESSION['fields']['email']=$email;
				if(empty($email))
				{
					$message['email_errors']='Email field is empty';
				}
			}
			if(isset($_POST['addr']))
			{
				$addr=$this->sanitize($_POST['addr']);
				$_SESSION['fields']['addr']=$addr;
				if(empty($addr))
				{
					$message['addr_errors']='Address field is empty';
				}
			}
			if(isset($_POST['nkname']))
			{
				$nkname=$this->sanitize($_POST['nkname']);
			    $_SESSION['fields']['nkname']=$nkname;
				if(empty($nkname))
				{
					$message['nkname_errors']='Next of kin name is empty';
				}
			}
			if(isset($_POST['nkphone']))
			{
			$nkphone=$this->sanitize($_POST['nkphone']);;             $_SESSION['fields']['nkphone']=$nkphone;
				if(empty($nkphone))
				{
					$message['nkphone_errors']='Next of kin phone is empty';
				}
			}
			if(isset($_POST['nkaddr']))
			{

			$nkaddr=$this->sanitize($_POST['nkaddr']);
			$_SESSION['fields']['nkaddr']=$nkaddr;
				if(empty($nkaddr))
				{
					$message['nkaddr_errors']='Next of kin address is empty';
				}
			}

	// if there are no longer errors upload picture and submit form
					if(sizeof($message)<=0)
					{
						$id=$this->id();
						$date=date('Y-m-d');

						date_default_timezone_set('GMT');

						$time=date('H:i:s');
						$pix='';
						$dirname=explode('/', $id);
						$newid='';
						foreach($dirname as $drname){
			           $newid=$drname[0].$drname[1].$drname[2];
						}
					if($_FILES['picture']['name']){
					Upload::init($_FILES['picture']);
					Upload::$allowedtypes=array('.jpeg','.jpg','.gif','.png', '.PNG');
					$pix=Upload::load(ATT.DS.$newid.DS);
					}
					else
					{
						$pix='';
					}
						unset($_SESSION['fields']);

						$message['success']="Patient Added Succesfully,  Patients ID number is ".$id;
					$data=array('patient_id'=>$id, 'patient_first_name'=>$fname, 'patient_middle_name'=>$oname, 'patient_last_name'=>$lname, 'gender'=>$gender, 'marital_status'=>$marital_status, 'number_of_children'=>$noc, 'occupation'=>$occupation, 'DOB'=>$dob, 'phone'=>$phone, 'email'=>$email, 'picture'=>$pix, 'nationality'=>$nationality, 'state_of_origin'=>$soo, 'local_govt'=>$lga, 'address'=>$addr, 'next_of_kin_name'=>$nkname, 'next_of_kin_address'=>$nkaddr, 'next_of_kin_phone'=>$nkphone, 'date_of_registration'=>$date, 'time_of_registration'=>$time, 'blood_group'=>$bg, 'genotype'=>$gno);
					
					

			$this->loadModel('patient');
		    $this->model->addPatient('patient_record', $data);
					}
		 }

		 $this->view->errors=$message;
		 $this->view->render($this->url.'/add');
         $this->view->render($this->url.'/unconfirmed');

	  }

	  function schedule($pid)
	  {
		  $this->loadModel('patients');
		  $this->view->patient_details=$this->model->getPatient($pid);
		  $this->loadModel('doctor');
		  $this->view->doctors=$this->model->getDoctor();
		  $this->loadModel('components');
		  $this->view->med=$this->model->med_dept();
		  $this->view->sponsors=$this->model->sponsors();
		  $this->loadModel('products');
		  $this->view->cf=$this->model->view_consultation_fee();
		  $this->view->render($this->url.'/schedule');
          $this->view->render($this->url.'/unconfirmed');
	 }
       
	   function billing()
	   {
            $this->view->render($this->url.'/unconfirmed');
		  
	   }
	   
	  function appointment()
	  {
		    $message=array();
		 Session::init();
		 $_SESSION['fields']=array();

		  if(isset($_POST['submit']))
		  {
			  $patient_type='';
			  $name='';
			  $pid='';
			  $price='';
			  $date='';
			  $time='';
			  $visit='';
			  $section='';
			  $doctors='';
			  $sponsor='';
			  $complaint='';

			   if(isset($_POST['patient_type']))
			 {
				 $patient_type=$_POST['patient_type'];
			 }

			  if(isset($_POST['name']))
			 {

			$name=$this->sanitize($_POST['name']);
			$_SESSION['fields']['name']=$name;
				if(empty($name) || trim($name)=="")
				{
				$message['name_error']='Name field is empty';
				}
			}

			  if(isset($_POST['pid']))
			 {

			  $pid=$this->sanitize($_POST['pid']);

			}

			 if(isset($_POST['price']))
			 {

			  $price=$this->sanitize($_POST['price']);

			}

			 if(isset($_POST['date']))
			 {

			$date=$_POST['date'];
			$_SESSION['fields']['date']=$date;
				if(empty($date) || trim($date)=="")
				{
				$message['fname_error']='Date field is empty';
				}
			}

			 if(isset($_POST['time']))
			 {

			$time=$this->sanitize($_POST['time']);
			$_SESSION['fields']['time']=$time;
				if(empty($time) || trim($time)=="")
				{
				$message['time_error']='Time field is empty';
				}
			}

			if(isset($_POST['visit']))
			{
				$visit=$this->sanitize($_POST['visit']);
			   $_SESSION['fields']['visit']=$visit;
			}

			if(isset($_POST['section']))
			{
				$section=$this->sanitize($_POST['section']);
			   $_SESSION['fields']['section']=$section;
			}


			if(isset($_POST['doctors']))
			{
				$doctors=$this->sanitize($_POST['doctors']);
			   $_SESSION['fields']['doctors']=$doctors;
			}

			if(isset($_POST['sponsor']))
			{
				$sponsor=$this->sanitize($_POST['sponsor']);
			   $_SESSION['fields']['sponsor']=$sponsor;
			}

			if(isset($_POST['complaint']))
			{
				$complaint=$this->sanitize($_POST['complaint']);
			   $_SESSION['fields']['complaint']=$complaint;
			}
			$date=date('Y-m-d');
			$ref=$this->ref();
			if(sizeof($message)<=0)
					{
						$ward='';
						$room='';
						$indata='';
						$this->loadModel('patients');
						if($patient_type=="in")
						{
							if(isset($_POST['ward']))
							{
								$ward=$_POST['ward'];
						    }

							if(isset($_POST['room_name']))
							{
								$room=$_POST['room_name'];
						    }

							$indata=array('patient_id'=>$pid, 'date_admitted'=>$date, 'time_admitted'=>$time, 'ward'=>$ward, 'room_number'=>$room, 'date_discharged'=>'0000-00-00', 'status'=>0);

							$this->model->add_inpatient('inpatient_tbl', $indata);
						}
						else if($patient_type=="out")
						{

						}
						$refid=$this->id();
						$data=array('unique_ref'=>$refid, 'cleared_status'=>0, 'date'=>$date, 'doctor_id'=>$doctors, 'patient_id'=>$pid, 'time'=>$time, 'visit_type'=>$visit, 'sponsor'=>$sponsor, 'dept_name'=>$section,'complaints'=>$complaint, 'reference_no'=>$ref, 'patient_type'=>$patient_type);

						$cart_data=array('patient_id'=>$pid, 'product_id'=>1, 'price'=>$price, 'date_added'=>$date, 'date_paid'=>'0000-00-00','reference_no'=>$ref);

                  $casedata=array('patient_id'=>$pid, 'unique_ref'=>$refid,'date'=>$date, 'complaints'=>$complaint, 'doctor_id'=>$doctors);
				  $vitalsdata=array('patient_id'=>$pid, 'unique_ref'=>$refid);
						
				  $this->model->schedule('patient_schedule', $data);
				  $this->loadModel('cart');
				  $this->model->patient_id=$pid;
				  $this->model->add_cart('patient_cart', $cart_data);
                  $this->loadModel('case');
				  $this->model->new_case('case_note', $casedata);
				  $this->model->add_vitals('vital_signs', $vitalsdata);
						unset($_SESSION['fields']);

						$message['success']="Patient ". $pid." Scheduled Succesfully for ".$date." ";
					}
			 $this->view->render($this->url.'/schedule');
       $this->view->render($this->url.'/unconfirmed');
		  }


	  }
	 function schedule_patients()
	 {
	   $this->view->url='frontdesk';
		 $this->loadModel('patients');
		 $this->view->bio=$this->model->getBio();
		 $this->view->render($this->url.'/schedule_patients');
     $this->view->render($this->url.'/unconfirmed');
	 }
	 function view_patients()
	 {
		 $this->view->url='frontdesk';
		 $this->loadModel('patients');
		 $this->view->bio=$this->model->getBio();
		 $this->view->render($this->url.'/view_patients');
		 $this->view->render($this->url.'/unconfirmed');
		
       
	 }

	  function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }
  }
