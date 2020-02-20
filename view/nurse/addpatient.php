<script type="text/javascript">
function getFields(pt)
{
	
if (pt=="")
  {
  document.getElementById('fields').innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById('fields').innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","/TRHS/components/ward/"+pt,true);
xmlhttp.send();
}


function getRoom(pt)
{
	
if (pt=="")
  {
  document.getElementById('room').innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById('room').innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","/TRHS/components/room/"+pt,true);
xmlhttp.send();
}

</script>

<div class="col-sm-9 col-xs-12">
  <div class="col-sm-12 wrapper">
	<h1>Add Patients to ward</h1><a href='<?php echo DIR?>/nurse/add_to_ward'class="btn btn-success">Back</a><hr/>
    <?php
     if(isset($this->patient)):?>
        <?php 
		 $data=$this->patient;
		
		?>
  
    <form action="<?php echo DIR;?>/nurse/add/ <?php echo $data[0]['patient_id'];?>" method="post">
    <div class="form-group">
    <label>Patient ID: <?php echo $data[0]['patient_id'];?></label>
    <br />
    <label>Patient Name</label>
    <input type="text" disabled name="name" value="<?php echo Complib::patient_name($data[0]['patient_id'])?>" />
    </div>
    <?php endif; ?>
    
     <div class="form-group">
  <label for="ward">WARD</label><br/>
<select class="form-control" name="ward" id="patient_type" onchange="getRoom(this.value)" onclick="getRoom(this.value)">
		 <?php
		   if(isset($this->wards))
		   {
			$wards=$this->wards;
			$size=sizeof($wards);
			for($i=0; $i<$size; $i++)
			{
		    echo"<option value=".$wards[$i]['id'].">".$wards[$i]['ward_name']."</option>";
			}
		   }
		 ?>										
		</select>
        </div>
          <div class="form-group" id="room">
          
          </div>
          
          <div class="form-group" >
           <label for="time">Admission Time</label>
           <input type="time" name="time" class="form-control" placeholder="e.g 9:00am" />
          </div>
          
    <div class="form-group">
    <input type="submit" class="btn btn-success" value="Admit Patient to Ward" name="submit"/>
    </div>
    </form>
  </div>
</div>
