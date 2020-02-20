
<script type="text/javascript">

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
xmlhttp.open("GET","/TRHS/components/populateState/"+ctr,true);
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
xmlhttp.open("GET","/TRHS/components/populateLga/"+state,true);
xmlhttp.send();
}

</script>




<div class="col-sm-7 col-xs-12">
<div class="col-sm-12 wrapper">
				<h1>Add new patient</h1><hr/>
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
                <div class="col-md-12">
					<div class="col-md-12 set">
								<form method="post" enctype="multipart/form-data" action="<?php echo DIR;?>frontdesk/add">
										<div class="col-sm-6">
												<div class="form-group">
														<label for="first_name">First Name</label>
														<input type="text" class="form-control" name="first_name" placeholder="First Name" required value="<?php if(isset($_SESSION['fields']['fname'])){ echo $_SESSION['fields']['fname']; }?>" />
												</div>
												<div class="form-group">
														<label for="last_name">Last Name</label>
														<input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="<?php if(isset($_SESSION['fields']['lname'])){ echo $_SESSION['fields']['lname']; }?>"/>
												</div>
												<div class="form-group">
														<label for="other_name">Other Name</label>
														<input type="text" class="form-control" name="other_name" placeholder="Other Name" required value="<?php if(isset($_SESSION['fields']['oname'])){ echo $_SESSION['fields']['oname']; }?>"/>
												</div>
												<div class="form-group">
														<label for="occupation">Occupation</label>
														<input type="text" class="form-control" name="occupation" placeholder="Occupation" required value="<?php if(isset($_SESSION['fields']['occupation'])){ echo $_SESSION['fields']['occupation']; }?>"/>
												</div>
                                                
                                               
                                                
												<div class="form-group">
														<div class="col-sm-6">
																<label for="gender">Sex</label><br/>
																<label class="radio-inline"><input type="radio" name="gender" value="male"  >Male</label>
																<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
														</div>
														<div class="col-sm-6">
																<label for="marital_status">Marital Status</label><br/>
																<select class="form-control" name="marital_status">
																		<option selected>---Select---</option>
																		<option value="single">Single</option>
																		<option value="married">Married</option>
																		<option value="divored">Divored</option>
																		<option value="widowed">Widowed</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<div class="col-sm-12"><br/></div>
														<div class="col-sm-6">
																<label for="dob">Date of Birth</label><br/>
																<input type="text" class="form-control" maxlength="10" name="dob" id="dob" placeholder="yyyy-mm-dd" required value="<?php if(isset($_SESSION['fields']['dob'])){ echo $_SESSION['fields']['dob']; }?>"/>
														</div>
														<div class="col-sm-6">
																<label for="noc">Number of children</label><br/>
																<input class="form-control" type="number" name="noc" placeholder="Number of children" value="<?php if(isset($_SESSION['fields']['noc'])){ echo $_SESSION['fields']['noc']; }?>"/>
														</div>
												</div>
												<div class="form-group">
														<div class="col-sm-12"><br/></div>
														
												</div>
												<div class="form-group">
														<div class="col-sm-12"><br/></div>
														<div class="col-sm-6">
																<label for="bg">Blood Group</label><br/>
																<select class="form-control" name="bg">
																		<option selected>---Select---</option>
																		<option value="O+">O+</option>
																		<option value="O-">O-</option>
                                                                        <option value="A+">A+</option>
                                                                        <option value="A-">A-</option>
                                                                        <option value="B+">B+</option>
                                                                        <option value="B-">B-</option>
                                                                        <option value="AB+">AB+</option>
                                                                        <option value="AB-">AB-</option>
                                                                         <option value="RH+">RH+</option>
																</select>
														</div>
														<div class="col-sm-6">
																<label for="gno">Genotype</label><br/>
																<select class="form-control" name="gno">
																		<option selected>---Select---</option>
																		<option value="AA">AA</option>
																		<option value="AS">AS</option>
																		<option value="SS">SS</option>
                                                                        <option value="SC">SC</option>
                                                                        <option value="AC">AC</option>
																</select>
														</div>
												</div>
										</div>
                                        
										<div class="col-sm-6">
                                        
                                         <div class="form-group">
														<label for="picture">Display Picture</label>
														<input type="file" class="form-control" name="picture" placeholder="Upload Picture" required/>
												</div>
												<div class="form-group">
														<label for="nationality">Nationality</label>
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
										</div>
										<div class="col-sm-6">
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
														<input type="text" class="form-control" maxlenght="11" name="phone" placeholder="Phone" required value="<?php if(isset($_SESSION['fields']['phone'])){ echo $_SESSION['fields']['phone']; }?>"/>
												</div>
                                                
  <div class="form-group">
														<label for="email">Email</label>
														<input type="text" class="form-control"  name="email" placeholder="Email" required value="<?php if(isset($_SESSION['fields']['email'])){ echo $_SESSION['fields']['email']; }?>"/>
												</div>
												<div class="form-group">
														<label for="addr">Address</label>
														<textarea class="form-control" row="3" name="addr" required><?php if(isset($_SESSION['fields']['addr'])){ echo $_SESSION['fields']['addr']; }?></textarea>
												</div>
												<div class="form-group">
														<label for="nkname">Name of Next of Kin</label>
														<input type="text" class="form-control" maxlenght="40" name="nkname" placeholder="Name of Next of Kin" required value="<?php if(isset($_SESSION['fields']['nkname'])){ echo $_SESSION['fields']['nkname']; }?>"/>
												</div>
												<div class="form-group">
														<label for="nkphone">Phone of Next of Kin</label>
														<input type="text" class="form-control" maxlenght="11" name="nkphone" placeholder="Phone of Next of Kin" required value="<?php if(isset($_SESSION['fields']['nkphone'])){ echo $_SESSION['fields']['nkphone']; }?>"/>
												</div>
												<div class="form-group">
														<label for="nkaddr">Address of Next of Kin</label>
														<textarea class="form-control" row="3" name="nkaddr" required><?php if(isset($_SESSION['fields']['nkaddr'])){ echo $_SESSION['fields']['nkaddr']; }?></textarea>
												</div>
										</div>
                                        
                                         
                                  
                                       
                                  
                                    <input type="submit" class="btn btn-success" value="ADD PATIENT" name="submit"/>
								</form>
					</div>
				</div>
        </div>
        </div>
        
        
       <script type="text/javascript">
   
         // When the document is ready
    
        $(document).ready(function () {
  
              
                $('#dob').datepicker({
  
                  format: "yyyy-mm-dd"
                }); 
 
            
            });
			
			
        </script>	