<?php

  class CartModel extends Model
  {
	  public $patient_id='';

	  function __construct()
	  {
		  parent:: __construct();

	  }

	  function add_cart($table, $data)
	  {
		  $this->db->insert($table, $data);
	  }

	  function view_pending()
	  {

		  $cart=$this->db->select("SELECT * FROM patient_cart WHERE payment_status=0");
		  return $cart;
	  }
	  function view_all_cart()
	  {
		  $pid=$this->patient_id;
		  $cart=$this->db->select("SELECT * FROM patient_cart where patient_id='$pid'");
		  return $cart;
	  }

	  function view_uncleared_cart($ref)
	  {
		  $pid=$this->patient_id;
		  $cart=$this->db->select("SELECT * FROM patient_cart where payment_status=0 AND reference_no='$ref'");        return $cart;
	  }

	  function view_cleared_cart($startdate, $enddate)
	  {
		  $pid=$this->patient_id;
		  $cart=$this->db->select("SELECT * FROM patient_cart where patient_id='$pid' AND payment_status=1");
		  return $cart;
	  }

	  function update_cart($a, $b)
	  {
		 echo "Hello",$a." and ".$b;
	  }
	  function clear($id,$ref)
	  {
		$data=array('payment_status'=>1);
		$data2=array('cleared_status'=>1);
		$where=array('cart_id'=>$id, 'reference_no'=>$ref);
		$where2=array('id'=>$id, 'reference_no'=>$ref);
	  $this->db->update('patient_cart', $data, $where);
	  $this->db->update('patient_schedule', $data2, $where2);
	  }
	  function delete_cart()
	  {

	  }


  }
