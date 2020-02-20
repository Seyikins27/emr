<?php

class Upload
{
	public static $postfile="";
	public static $sizelimit="500000";
	public  static $allowedtypes='';
	
	
	function init($name)
	{
		self::$postfile=$name;
		self::getSize();
	    self::getType();
	}
	
	
	
	function getSize()
	{
		$filesize=self::$postfile['size'];
		return $filesize;
	}
	
	function getType()
	{
		$filename= self::$postfile['name'];
		$file_ext = substr($filename, strripos($filename, '.'));
		return $file_ext;
		
	}
	
	function allowtype()
	{
	  if(in_array(self::getType(), self::$allowedtypes))
	  {
	  }
	  else
	  {
		  self::error('FILE TYPE NOT SUPPORTED');
		  exit;
		  
	  }
	}
	
	function allowsize()
	{
	   if(self::getSize()>self::$sizelimit)
	   {
		   self::error('YOU FILE SIZE HAS EXCEEDED '.self::$sizelimit);
		   exit;
	   }	
	   else if(self::getSize()<=0)
	   {
		   $this->error('YOUR FILE SIZE IS TOO SMALL');
		   exit;
	   }
	   else
	   {
	   }
	}
	
   function subdir_exists($filepath)
   {
	   if(!is_dir($filepath))
	   {
		   mkdir($filepath, 0777, true);
	   }
	   
   }
	
   function load($filepath)
   {
	   self::allowtype();
	   self::allowsize();
	   self::subdir_exists($filepath);
	   
	   $newfilename = date("Ymdhms").self::getType();
	 
	 if(file_exists($newfilename))
	 {
	  $newfilename = date("Ymdhms")."_1".self::getType();
	 }
	
		$path=$filepath.$newfilename;
	    move_uploaded_file(self::$postfile["tmp_name"], $path);
		$_SESSION['errors']['file']="FILE UPLOADED SUCCESSFULLY";
	 
	    return $path;
    }
    function getName()
	{
		
	}
	function error($msg)
	{
		echo $msg;
	}
}
?>