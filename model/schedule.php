<?php 
 class scheduleModel extends Model
 {
	 
	function __construct()
	{
		parent:: __construct();
    } 
	
	function unconfirmedSchedule()
	{
		$unconfirmed=$this->db->select("SELECT * FROM patient_schedule WHERE schedule_status=0");
		return $unconfirmed;
	}
	
	function scheduleHistory($pid)
	{
		$history=$this->db->select("SELECT * FROM patient_schedule WHERE patient_id='$pid'");
		
		return $history;
	}
	 
 }