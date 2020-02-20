<?php
  
  class ResolverModel extends Model
  {
	  function __construct()
	  {
		  parent::__construct();
	  }
	  
	    function resolve($table,$id,$column,$data)
	   {
		   
		   $resdata=$this->db->select("SELECT $data FROM $table WHERE $column='$id'");
		   
		   return $resdata;
	   }
  }