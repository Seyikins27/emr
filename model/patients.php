<?php
  
  class PatientsModel extends Model
  {
	  function __construct()
      {
		  parent::__construct();
	  }
	  
	  function getBio()
	  {
		  $patientbio=$this->db->select("SELECT * from patient_record");
		  
		  return $patientbio;
	  }
	  function getPatient($pid)
	  {
		  $patient=$this->db->select("SELECT * from patient_record WHERE patient_id='$pid' OR patient_first_name LIKE '%$pid%' OR patient_middle_name LIKE '%$pid%' OR patient_last_name LIKE '%$pid%' ");
		  return $patient;
	  }
	  
	  function getInpatient()
	  {
		  $inpatient=$this->db->select("SELECT * FROM inpatient_tbl");
		  return $inpatient;
	  }
	  function getSchedule()
	  {
		  $schedule=$this->db->select("SELECT * from patient_schedule WHERE patient_id='$pid'");
		  return $schedule;
	  }
	  
	  function schedule($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }
	  
	  function add_inpatient($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }
	  function vital_signs($pid)
	  {
		  $vs=$this->db->select("SELECT * FROM vital_signs WHERE patient_id='$pid'");
		  return $vs;
	  }
	  function medicalHistory($pid)
	  {
		  $mh=$this->db->select("SELECT * FROM case_note WHERE patient_id='$pid' AND caseStatus=1");
		  return $mh;
	  }
	  
  }