<script>
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
<div class="col-sm-7 col-xs-12">
  <div class="col-sm-12 wrapper">
   <?php
		if(isset($this->patient_details)):?>
        <?php 
		 $data=$this->patient_details;
		?>
    
   
<h1>Appointment Form: <?php echo $data[0]['patient_id']; ?></h1><hr/>

<?php


if(isset($this->errors))
{
	$err=$this->errors;
	foreach($err as $msg):?>
	<?php if(isset($err['success'])):?>
	
	
		 <div id="myAlert" class="alert alert-success"> <a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Success!</strong> <?php echo $msg; ?> 
       		 </div>
    <?php else: ?>
     <div id="myAlert" class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Error!</strong> <?php echo $msg; ?> 
     </div>
  <?php endif; ?>


<?php endforeach; }?>


<form id="form" method="post" action="<?php echo DIR;?>frontdesk/appointment">
  <div class="form-group">
  <label for="patient_type">PATIENT TYPE</label><br/>
																<select class="form-control" name="patient_type" id="patient_type" onchange="getFields(this.value)" onclick="getFields(this.value)">																<option value="out">OUT PATIENT</option>																		<option value="in">IN PATIENT</option>
																</select>
                                                                <div id="fields">
                                                                </div>
                                                                
                                                                <div id="room">
                                                                </div>
                    							
<p>Name:
  <input type="text" class="form-control" name="name" value="<?php echo $data[0]['patient_last_name']." ".$data[0]['patient_first_name']." ".$data[0]['patient_middle_name']; ?>" disabled="disabled" />
  <input type="hidden" value="<?php echo $data[0]['patient_id']; ?>" name="pid" />
  
   <?php
																if(isset($this->cf))
																{
	$cf=$this->cf;
	$size=sizeof($cf);
	for($i=0; $i<$size; $i++)
	{
		echo "<input type='hidden' value=".$cf[$i]['price']." name='price'/>";
    }															
																}
																?>
  
  </p>
  
  <div class="form-group">
												
  Appointment Date:<input class="form-control" type="text" placeholder="Select date" id="date" name="date"/>
  </div>
  
  <div class="form-group">
												
  Time:<input type="time" class="form-control" name="time" />
 </div>
  
  <div class="form-group">
  Visit Type:
  <select name="visit"class="form-control">
    <option value="init"> Initial</option>
    <option value="foll">Follow Up</option>
  </select>
  </div>
  
  <div class="form-group">												   Section
  <select class="form-control" name="section">
   <?php
																if(isset($this->med))
																{
	$med=$this->med;
	$size=sizeof($med);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$med[$i]['id'].">".$med[$i]['dept_name']."</option>";
    }															
																}
																?>
  </select>   
  </div>
    
<br />
  <div class="form-group">
												
  Provider:
  <select name="doctors" class="form-control" >
    <?php
																if(isset($this->doctors))
																{
	$doc=$this->doctors;
	$size=sizeof($doc);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$doc[$i]['staff_id'].">".$doc[$i]['firstname']." ".$doc[$i]['lastname']."</option>";
    }															
																}
																?>
  </select>
  </div>
  
  <div class="form-group">
  <br />  
  Sponsor:
  <select  name="sponsor" class="form-control">
       <?php
																if(isset($this->sponsors))
																{
	$sponsors=$this->sponsors;
	$size=sizeof($sponsors);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$sponsors[$i]['id'].">".$sponsors[$i]['sponsor_name']."</option>";
    }															
																}
																?>

  </select> 
  </div>
  
  
       <br />
  <div class="form-group">											
  Main Complaint
  <textarea class="form-control" id="Instruct" row="10" name="complaint" />  
</textarea>
  </div>
   <div class="form-group">	
<input type="submit" class="btn btn-success" value="Schedule Appointment" name="submit"/>
</form>
<?php endif;?>
  </div>
</div>

   
 <script type="text/javascript">
   
         // When the document is ready
    
        $(document).ready(function () {
           var today= new Date();
              
                $('#date').datepicker({
                  
                  format: "dd-mm-yyyy",
				  startDate: today ,
				  endDate: "+1m"
                }); 
 
            
            });
			
			
			
        </script>	