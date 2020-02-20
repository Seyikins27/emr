<?php

  class PatientData extends Model
  {
	  public $patientId='';
	  
	  function __construct($id)
	  {
		  parent::__construct();
		  $this->patientId=$id;
	  }
	  
	  function bio()
	  {
		  $biodata=$this->db->select("SELECT * FROM patient_record WHERE patient_id=$this->patientId");
		  return $biodata;
	  }
	  
	  function vital_signs()
	  {
		  $vital_signs=$this->db->select("SELECT * FROM vital_signs WHERE patient_id=$this->patientId");
		  return $vital_signs;
	  }
	  
	  function med_history()
	  {
		  $history=$this->db->select("SELECT * FROM case WHERE patient_id=$this->patientId");
		  return $history;
	  }
	  
	  function lab_tests()
	  {
		  $tests=$this->db->select("SELECT * FROM lab_results WHERE patient_id=$this->patientId");
		  return $tests;
	  }
	  
	  function drugs()
	  {
		  $drugs=$this->db->select("");
		  return $drugs;
	  }
	  
	  function admission_status()
	  {
		  $status=$this->db->select("SELECT * FROM admission_status WHERE patient_id=$this->patientId");
		  return $status;
	  }
	  
	  function accounts()
	  {
		  $acct=$this->db->select("SELECT * FROM patient_cart WHERE patient_id=$this->patientId AND payment_status=0");
		  return $acct;
	  }
	  
	  
	  
  }