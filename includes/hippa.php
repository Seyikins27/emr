<?php

  class HipaaModel extends PatientData
  {
	  public $privilege='';
	  public $pid='';
	  function __construct()
	  {
		  parent::construct();
		 
	  }
	  //reutrn data according to privileges
	  function returnData($priv, $patientId)
	  {
		 $this->privilege=$priv;
		 $this->pid=$patientId;
		 $data='';
		 $$this->pd= new PatientData($patientId); 
		 switch ($priv)
		 {
			 case "SA":
			  $data=array_merge($this->pd->bio(),$this->pd->admission_status(),$this->pd->accounts());
			 break;
			 
			 case substr($priv, 0, 2)="DC":
			 $data= array_merge($this->pd->bio(), $this->pd->vital_signs(),$this->pd->med_history(), $this->pd->lab_tests(), $this->pd->drugs(), $this->pd->admission_status(),$this->pd->accounts());
			 break;
			 
			  case substr($priv, 0, 2)="NR":
			 $data= array_merge($this->pd->bio(), $this->pd->vital_signs(),$this->pd->med_history(),  $this->pd->drugs(), $this->pd->admission_status());
			 break;
			 
			 case substr($priv, 0, 2)="FD":
			 $data= array_merge($this->pd->bio(),$this->pd->admission_status(),$this->pd->accounts());
			 break;
			 
			  case substr($priv, 0, 2)="PH":
			 $data= array_merge($this->pd->bio(), $this->pd->drugs(),$this->pd->accounts());
			 break;
			 
			  case substr($priv, 0, 2)="BL":
			 $data= array_merge($this->pd->bio(),$this->pd->admission_status(),$this->pd->accounts());
			 break;
			 
			  case substr($priv, 0, 2)="LB":
			 $data= array_merge($this->pd->bio(), $this->pd->vital_signs(), $this->pd->drugs(),$this->pd->admission_status(),$this->pd->accounts());
			 break;
			 
			 case "":
			 $data=array("");
			 break;
			 
			 default:
			 $data="";
			 break;
	     }
		 
		 return $data;
	  }// end of function
	  
  }//end of class