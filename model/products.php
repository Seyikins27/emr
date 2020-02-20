<?php
  
  class ProductsModel extends Model
  {
	  function __construct()
	  {
		  parent:: __construct();
	  }
	  
	  function add_product($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }
	  
	  function view_consultation_fee()
	  {
		  $cf=$this->db->select("SELECT * FROM inventory WHERE product_id=1");
		  
		  return $cf;
	  }
  }