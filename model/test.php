<?php

  class TestModel extends Model
  {
	  function __construct()
	  {
		  parent::__construct();
	  }
	  
	  function addTest($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }
	  
	  function removeTest()
	  {
	  }
  }