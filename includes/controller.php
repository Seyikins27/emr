<?php

  class Controller
  {// beginning of class

	function __construct()
	  {
		  $this->view = new View();

	  }

	   function loadModel($model)
	  {
		  require MDL.DS.$model.'.php';

		  $prefix=ucfirst($model);
		  $suffix="Model";
		  $class=$prefix.$suffix;
		  $this->model=new $class();

	  }


	  static function sanitize($input, $empty=1)
	{
	   if($empty==0)
	   {
		   if(!empty($input))
		   {
	    $input = escapeShellCmd($input);
		$input=filter_var($input, FILTER_SANITIZE_STRING);
		$input =htmlspecialchars($input,ENT_QUOTES);

		return $input;
		   }
		   else if(empty($input))
		   {
		   $this->error("Field cannot be empty");
			   exit;
		   }
	   }
	   else
	   {

	    $input = escapeShellCmd($input);
		$input=filter_var($input, FILTER_SANITIZE_STRING);
		$input =htmlspecialchars($input,ENT_QUOTES);

		return $input;

	   }


	}


	  static function sanitize_email($input, $empty=1)
	  {
	    $errors=array();
	   if($empty==0)
	   {
		   if(!empty($input))
		   {
	    $input = escapeShellCmd($input);
		$input=filter_var($input, FILTER_SANITIZE_EMAIL);
		$input =htmlspecialchars($input,ENT_QUOTES);

		return $input;
		   }
		   else if(empty($input))
		   {
		   $this->error($input." Field cannot be empty");
			   exit;
		   }
	   }
	   else
	   {

	    $input = escapeShellCmd($input);
		$input=filter_var($input, FILTER_SANITIZE_EMAIL);
		$input =htmlspecialchars($input,ENT_QUOTES);

		return $input;

	   }


	 }

	 static function upload($filename)
	 {
		 if($_FILES[$filename]['name'])
		     {

				  $doc=$_FILES[$filename];

			     self::loadModel('docs');

		         $newname=$this->model->upload($doc);
			  }

			else
			 {
				$this->error("NOT SET, YOU HAVE NOT UPLOADED ANY FILE");
				exit;
			 }
			 return $newname;
	 }

	 function error($errmsg)
	 {
		 echo $errmsg;
	 }

	  function redirect($link)
	  {
		  header('location:'.URL.$link);
	  }
  }// end of class
