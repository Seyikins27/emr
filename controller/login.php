<?php

 class Login extends Controller
 {
	 public $message="";
	 function auth()
	 {
		  if(isset($_POST['login']))
		 {
			 if(isset($_POST['user_id']) && isset($_POST['password']))
			 {
				 $user=$_POST['user_id'];
				 $pass=$_POST['password'];
				 
				 if(!empty($user) && !empty($pass))
				 {
					 $this->loadModel('login');
					 $data=array($user, $pass);
					 echo $this->model->Auth($data);
				 }
				 else
				 {
					 $this->message="FIELDS ARE EMPTY";
				 }
			 }
		 }
		 else
		 {
			 $this->message="ERROR ";
			
			
		 }
		 
		 echo $this->message;
	 }
	 
	 
	 
	 
	 
	 
 }