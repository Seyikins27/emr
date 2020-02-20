<?php

   class DoctorModel extends Model
   {
	   
	   function __construct()
	   {
		   parent::__construct();
	   }
	   function getDoctor()
	   {
		   $getDoctor=$this->db->select("SELECT * FROM staff_tbl WHERE designation='DOC'");
		   
		   return $getDoctor;
	   }
	   function get_schedule($docid, $daterange="")
	   {
		   $date=date('Y-m-d');
		   if(empty($daterange))
		   {
		   $schedule=$this->db->select("SELECT * FROM case_note INNER JOIN patient_Schedule ON patient_schedule.unique_ref=case_note.unique_ref AND patient_schedule.cleared_status=1 AND patient_schedule.doctor_id='$docid' AND caseStatus=0");
		   return $schedule;
		   }
		   else
		   {
			   $schedule=$this->db->select("SELECT * FROM case_note INNER JOIN patient_Schedule ON patient_schedule.unique_ref=case_note.unique_ref AND patient_schedule.cleared_status=1 AND patient_schedule.doctor_id='$docid' AND date BETWEEN '$daterange' AND $date");
		   return $schedule;
		   }
	   }
	   
	   function new_case($table, $data)
	   {
		   $this->db->insert($table, $data11);
	   }
   }