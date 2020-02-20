<?php
  
  class FrontdeskModel extends HipaaModel
  {
	 
	  
	  function __construct()
	  {
		  parent::__construct();
		  $this->hipaa=new HipaaModel();
	  }
	  
	  
	  function get_patient_bio($privilege, $pid)
      {
		  $bio=$this->hipaa->returnData($privilege, $pid);
		  return $bio;
	  }	  
  }