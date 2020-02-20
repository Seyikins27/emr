<?php

  Class Components extends Controller
  {
	  function __construct()
	  {
		  parent::__construct();
	  }
	  
	   function gen()
	   {
		   $date=substr(date('Y'), 2,2);
		   $prefix='THC';
		   $length=5;
	       $rand=substr(str_shuffle("0123456789ABCDE"), 0,$length );
		   $id=$prefix.$date.$rand;
		   echo $id;
	   }
	   
	   function genpass()
	   {
		   $length=8;
	       $rand=substr(str_shuffle("0123456789ABCDE"), 0,$length );
		   echo $rand;
	   }
	   
	   function populateState($ct)
	    {
		  if($ct=="NG")
		  { 
			$this->loadModel('components');
		    $states=$this->model->state();
			$size=sizeof($states);
			for($i=0; $i<$size; $i++)
			{
		    echo"<option value=".$states[$i]['state_id'].">".$states[$i]['name']."</option>";
			}
		  }
		  else
		  {
			  echo"<option value='NIL'></option>";
		  }
	  }
	  
	  
	  
	   function populateLga($st)
	  {
		 
			$this->loadModel('components');
		    $lga=$this->model->local_govt($st);
			$size=sizeof($lga);
			for($i=0; $i<$size; $i++)
			{
		    echo"<option value=".$lga[$i]['local_id'].">".$lga[$i]['local_name']."</option>";
			}
		  
	  }
	  
	  function work($type)
	  {
		  echo"<div class='form-group'>";
			  echo"<label for='designation'>Designation</label>";
			  echo"<select id='designation' name='designation' class='form-control' onchange='getDept(this.value)' onclick=e='getDept(this.value)''>";
		  if($type=="acc")
		  {
			  
			echo"<option value='ACCOUNTANT'>ACCOUNTANT</option>";
			echo"<option value='BOOK KEEPING'>BOOK KEEPING</option>";         
		    echo"<option value='CASHIER'>CASHIER</option>";
			echo"<option value='ADMINISTRATIVE'>ADMINISTRATIVE</option>";
			 
		  }
		  else if($type=="lab")
		  {
			  echo"<option value='LAB TECHNICIAN'>LAB TECHNICIAN</option>";
		  }
		  else if($type=="med")
		  {
			  echo"<option value='DOC'>DOCTOR</option>";
			  echo"<option value='NUR'>NURSE</option>";
		  }
		  else if($type=="phm")
		  {
			echo"<option value='PHARMACIST'>PHARMACIST</option>";
		  }
		   else if($type=="rad")
		  {
			echo"<option value='RADIOLOGIST'>RADIOLOGIST</option>";
		  }
		  else
		  {
			  echo"<option value='ADMINISTRATIVE'>ADMINISTRATIVE</option>";
		  }
		   echo "</select>";
			  echo"</div>";
	  }
	  
	  function ward($pt)
	  {
		  if($pt=="in")
		  { 
		  
		    echo"<label for='ward'>Ward</label>";
			echo "<select id='ward' name='ward' class='form-control' onchange='getRoom(this.value)'  onchange='getRoom(this.value)'>";
			$this->loadModel('components');
			$wards=$this->model->ward();
			$size=sizeof($wards);
			for($i=0; $i<$size; $i++)
			{
		    echo"<option value=".$wards[$i]['id'].">".$wards[$i]['ward_name']."</option>";
			}
			echo"</select>";
		  }
		  else
		  {
		  }
	  }
	  
	  function room($wardid)
	  {
		   echo"<label for='room'>ROOM</label>";
			echo "<select id='room_name' name='room_name' class='form-control'>";
			$this->loadModel('components');
			$room=$this->model->room($wardid);
			$size=sizeof($room);
			for($i=0; $i<$size; $i++)
			{
		    echo"<option value=".$room[$i]['room_id'].">".$room[$i]['room_name']."</option>";
			}
			echo"</select>";
	  }
	  
	  
	  function searchPatient($string)
	  {
		  $this->loadModel('patients');
		  $data=$this->model->getPatient($string);
		  $size=sizeof($data);
		    for($i=0; $i<$size; $i++)
			{
				echo "<tr>";
				echo"<td>".$data[$i]['patient_id']."</td>";
				echo"<td>".Complib::patient_name($data[$i]['patient_id'])."</td>";
				echo"<td>".$data[$i]['gender']."</td>";
				echo"<td>".$data[$i]['DOB']."</td>";
				echo"<td>".$data[$i]['phone']."</td>";
				echo"<td>".$data[$i]['picture']."</td>";
				echo"<td><a href='add/".$data[$i]['patient_id']."'>Add to Ward</a></td>";
				echo"</tr>";
			}
			 echo" </tbody>
         </table>";
	  }
  }