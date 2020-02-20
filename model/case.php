<?php
  
  class CaseModel extends Model
  {
	  function __construct()
	  {
		  parent::__construct();
	  }
	  
	  function new_case($table, $data)
	   {
		   $this->db->insert($table, $data);
	   }
	   
	   function view_case($caseid)
	   {
         $case=$this->db->select("SELECT * FROM case_note WHERE case_id='$caseid'");
		 
		 return $case;
	   }
	   
	   function get_vitals($caseid="")
	   {
		   $vitals=$this->db->select("SELECT * FROM vital_signs WHERE caseid='$caseid' OR unique_ref='$caseid'");
		 
		 return $vitals;
	   }
	   
	   function add_vitals($table, $data)
	   {
		   $this->db->insert($table, $data);
	   }
	   
	   function update_vitals($ref, $data)
	   {
		    $where=array('unique_ref'=>$ref);
	       $update=$this->db->update('vital_signs', $data, $where);
	   }
	   
	   function update_case($caseid, $data)
	   {
		    $where=array('case_id'=>$caseid);
	       $update=$this->db->update('case_note', $data, $where);
	   }
  }