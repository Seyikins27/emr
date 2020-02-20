<?php

  class PatientModel extends Model 
  {
	  function __construct()
	  {
		  parent:: __construct();
	  }
	  
	  function addPatient($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }
	  function bio($privilege)
	  {
	  }
	  
	  function admissionStatus()
	  {
		  
	  }
	  
	  function bills()
	  {
		  
	  }
	  
	  function medicalLog()
	  {
		  
	  }
	  
	  function history()
	  {
		  
	  }
  }
  