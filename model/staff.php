<?php
 class StaffModel extends Model
 {
	 function __construct()
	 {
		 parent::__construct();
     }
	 
	 function add($table, $data)
	 {
		 $this->db->insert($table, $data);
	 }
	 
	 
	 function getall()
	 {
		 $allstaff=$this->db->select("SELECT * FROM staff_tbl");
		 
		 return $allstaff;
	 }
	 
	 function getdetails($staffId)
	 {
		 $details=$this->db->select("SELECT * FROM staff_tbl WHERE staff_id='$staffId'");
		 
		 return $details;
	 }
 }

