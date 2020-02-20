<?php

   class ComponentsModel extends Model
   {
	   function __construct()
	   {
		   parent::__construct();
		   
	   }
	   
	   function countries()
	   {
		   $cts=$this->db->select("select * from countries");
		   return $cts;
	   }
	   
	   function state()
	   {
		 $state=$this->db->select("select * from states");
		 return $state;
	   }
	   
	   function local_govt($state)
	   {
		 $lga=$this->db->select("select * from locals where state_id='$state'");
		 return $lga;
	   }
	   
	   function department()
	   {
		   $dept=$this->db->select("select * from department ORDER BY dept_name ASC");
		   
		   return $dept;
	   }
	   
	   function med_dept()
	   {
		    $dept=$this->db->select("select * from department WHERE type='med' ORDER BY dept_name ASC");
		   
		   return $dept;
	  }
	   
	   function sponsors()
	   {
		   $sponsor=$this->db->select("select * from sponsor_tbl ORDER BY id");
		   
		   return $sponsor;
	   }
	   function ward()
	   {
		    $ward=$this->db->select("select * from ward_tbl ORDER BY id");
		   
		   return $ward;
	   }
	   
	   function room($ward_no)
	   {
		    $room=$this->db->select("select * from room WHERE ward_id='$ward_no' ORDER BY room_id");
		   
		   return $room;
	   }
   }