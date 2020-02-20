<?php
  
  class Complib extends Model
  {
	  function __construct()
	  {
		  parent:: __construct();
	  }
	  
	  static function getDept($id)
	   {
		    $dept=$this->db->select("select dept_name from department WHERE id='$id'");
		   
		   return $dept;
	   }
	   
	   static function resolve($table,$id,$column,$data)
	   {
		   
		   $resdata=Database::select("SELECT $data FROM $table WHERE $column='$id'");
		   
		   return $resdata[0][$data];
	   }
	   
	   static function patient_name($pid)
	   {
		   $patient_name=Database::select("SELECT patient_first_name, patient_middle_name, patient_last_name FROM patient_record WHERE patient_id='$pid'");
		   
		   return $patient_name[0]['patient_last_name']." ".$patient_name[0]['patient_first_name'];
	   }
	   
	   static function staff_name($sid)
	   {
		    $staff_name=Database::select("SELECT firstname, lastname FROM staff_tbl WHERE staff_id='$sid'");
		   
		   return $staff_name[0]['lastname']." ".$staff_name[0]['firstname'];
	   }
  }