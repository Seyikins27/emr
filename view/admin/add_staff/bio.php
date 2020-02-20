


<script>
function getId()
{

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
    document.getElementById('uid').innerHTML=xmlhttp.responseText;
	alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("GET","/HIS/admin/gen",true);
xmlhttp.send();
}



function getCountry(ctr)
{
	
if (ctr=="")
  {
  document.getElementById('soo').innerHTML="";
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
    document.getElementById('soo').innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","/HIS/components/populateState/"+ctr,true);
xmlhttp.send();
}



function getLga(state)
{
	
if (state=="")
  {
  document.getElementById('lga').innerHTML="";
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
    document.getElementById('lga').innerHTML=xmlhttp.responseText;
	console.log(xmlhttp.responseText);
    }
  }
xmlhttp.open("GET","/HIS/components/populateLga/"+state,true);
xmlhttp.send();
}

</script>



<div class="col-md-12">
<div class="col-md-12 set">
<form method="post" action="">
<div class="col-sm-6">
<div class="form-group">
														<label for="inputEmail">First Name</label>
														<input type="text" class="form-control" name="first_name" placeholder="First Name" required/>
												</div>
												<div class="form-group">
														<label for="inputEmail">Last Name</label>
														<input type="text" class="form-control" name="last_name" placeholder="Last Name" required/>
												</div>
  
  <div class="form-group">
																<label for="inputEmail">Gender</label><br/>
																<label class="radio-inline"><input type="radio" name="sex" value="male">Male</label>
																<label class="radio-inline"><input type="radio" name="sex" value="female">Female</label>
  </div>
														<div class="form-group">
																<label for="inputEmail">Marital Status</label><br/>
																<select class="form-control" name="marital_status">
																		<option selected>---Select---</option>
																		<option value="single">Single</option>
																		<option value="married">Married</option>
																		<option value="divored">Divored</option>
																		<option value="widowed">Widowed</option>
																</select>
</div>
												
	<div class="form-group">
														
																<label for="inputEmail">Date of Birth</label><br/>
																<input type="text" class="form-control" maxlength="10" name="dob" id="dob" required/>
	</div>
   </div>
   
   <div class="col-sm-6">							
                              
 <div class="form-group">
														<label for="inputEmail">Nationality</label>
														<select class="form-control" name="nationality"  id="nationality" onclick="getCountry(this.value)" onchange="getCountry(this.value)">
																<option selected>---Select---</option>
																<?php
																if(isset($this->countries))
																{
	$countries=$this->countries;
	$size=sizeof($countries);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$countries[$i]['country_code'].">".$countries[$i]['country_name']."</option>";
    }															
																}
																?>
	</select>
  </div>
  
  <div class="form-group">
														<label for="soo">State of Origin</label>
														<select class="form-control" name="soo" id="soo" onclick="getLga(this.value)" onchange="getLga(this.value)">
																<option>---Select---</option>
																
														</select>
												</div>
  
   <div class="form-group">
														<label for="lga">Local Goverment</label>
														<select class="form-control" name="lga" id="lga">
																<option selected>---Select---</option>
																
</select>
   </div>
   
   	<div class="form-group">
														<label for="phone">Phone</label>
														<input type="text" class="form-control" maxlenght="11" name="phone" placeholder="Phone" required/>
												</div>
												<div class="form-group">
														<label for="addr">Address</label>
														<textarea class="form-control" row="3" name="addr" required></textarea>
												</div>
                                                
                                                <div class="form-group">

<button class="btn btn-success" data-target="#prof"data-toggle="tab" >NEXT >></button>

</div>
   
 </div>
 </form>             	   
 </div>
 </div>
                                    
                                    
  <script type="text/javascript">
   
         // When the document is ready
    
        $(document).ready(function () {
  
              
                $('#dob').datepicker({
  
                  format: "dd-mm-yyyy"
                }); 
 
            
            });
        </script>				