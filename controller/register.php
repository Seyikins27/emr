<?php

  class Register extends Controller
  {
	  function __construct()
	  {
		  parent:: __construct();
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
	  
	  function newPatient()
	  {
		  

    if(isset($_POST['submit']))
	   {//if the submit button is clicked
		  if(isset($_POST['first_name']) && isset($_POST['last_name'])&& isset($_POST['other_name']) && isset($_POST['occupation']) && isset($_POST['gender']) && isset($_POST['marital_status']) && isset($_POST['dob']) && isset($_POST['noc']) && isset($_POST['bg']) && isset($_POST['gno']) && isset($_POST['nationality']) && isset($_POST['soo']) && isset($_POST['lga']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['addr']) && isset($_POST['nkname']) && isset($_POST['nkphone']) && isset($_POST['nkaddr']))
		  {
			$fname=$this->sanitize($_POST['first_name']);
			$lname=$this->sanitize($_POST['last_name']);
			$oname=$this->sanitize($_POST['other_name']);
			$fname=$this->sanitize($_POST['first_name']);
			$occupation=$this->sanitize($_POST['occupation']);
			$gender=$this->sanitize($_POST['gender']);
			$marital_status=$this->sanitize($_POST['marital_status']);
			$dob=$this->sanitize($_POST['dob']);
			$noc=$this->sanitize($_POST['noc']);
			$bg=$this->sanitize($_POST['bg']);
			$gno=$this->sanitize($_POST['gno']);
			$nationality=$this->sanitize($_POST['nationality']);
			$soo=$this->sanitize($_POST['soo']);
			$lga=$this->sanitize($_POST['lga']);
			$phone=$this->sanitize($_POST['phone']);
			$email=$this->sanitize($_POST['email']);
			$addr=$this->sanitize($_POST['addr']);
			$nkname=$this->sanitize($_POST['nkname']);
			$nkphone=$this->sanitize($_POST['nkphone']);
			$nkaddr=$this->sanitize($_POST['nkaddr']);
			
			$id=$this->id();
			$date=date('Y-m-d');
			
			date_default_timezone_set('GMT');
			
			$time=date('H:i:s');
			$pix='';
					if($_FILES['picture']['name']){
					Upload::init($_FILES['picture']);
					Upload::$allowedtypes=array('.jpeg','.jpg','.gif','.png', '.PNG');
					$pix=Upload::load(ATT.DS.$id.DS);
					}
					else
					{
						$pix='';
					}
					$data=array('patient_id'=>$id, 'patient_first_name'=>$fname, 'patient_middle_name'=>$oname, 'patient_last_name'=>$lname, 'gender'=>$gender, 'marital_status'=>$marital_status, 'number_of_children'=>$noc, 'occupation'=>$occupation, 'DOB'=>$dob, 'phone'=>$phone, 'email'=>$email, 'picture'=>$pix, 'nationality'=>$nationality, 'state_of_origin'=>$soo, 'local_govt'=>$lga, 'address'=>$addr, 'next_of_kin_name'=>$nkname, 'next_of_kin_address'=>$nkaddr, 'next_of_kin_phone'=>$nkphone, 'date_of_registration'=>$date, 'time_of_registration'=>$time, 'blood_group'=>$bg, 'genotype'=>$gno);
					
					$this->loadModel('patient');
		    $this->model->addPatient('patient_record', $data);
		  }
	    }// end of submit button
	  }
  }