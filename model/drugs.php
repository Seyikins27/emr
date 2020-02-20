<?php

  class DrugsModel extends Model
  {
	  function __construct()
	  {
		  parent::__construct();
	  }
	  
	  
	  function getDrugs()
	  {
		  $drugs=$this->db->select("SELECT * FROM drugs_tbl");
		  return $drugs;
	  }
	  
	  function add($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }
	  
	  function removeDrug()
	  {
		  
	  }
  }

