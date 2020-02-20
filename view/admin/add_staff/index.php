 
<script>

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


function getDept(des)
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
    document.getElementById('userid').value=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","/TRHS/components/gen",true);
xmlhttp.send();
}


function genPass()
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
    document.getElementById('pass').value=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","/TRHS/components/genpass",true);
xmlhttp.send();
}


function getWork(ctr)
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
    document.getElementById('worktype').innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","/TRHS/components/work/"+ctr,true);
xmlhttp.send();
}



</script>
<div class="page-content">
  <div class="row-fluid">
    <div class="span12">
				<h4>ADD NEW STAFF </h4><hr/>
    <form method="post" action="<?php echo DIR;?>admin/add_staff">
 <div class="col-lg-12"><!-- Row 3 COL 2-->
  <div class="tab-content">

   <!--beginning of bio-->
  	<div class="tab-pane fade in active" id="bio">
     <div class="clr_20"></div>
     <div class="col-md-12">
<div class="col-md-12 set">

<div class="col-sm-6">
<div class="form-group">
														<label for="inputEmail">First Name</label>
														<input type="text" class="form-control" name="first_name" placeholder="First Name" required value=""/>
												</div>
												<div class="form-group">
														<label for="inputEmail">Last Name</label>
														<input type="text" class="form-control" name="last_name" placeholder="Last Name" required/>
												</div>

  <div class="form-group">
																<label for="gender">Gender</label><br/>
																<label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
																<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
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

																<label for="dob">Date of Birth</label><br/>
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
														<label for="email">Email</label>
														<input type="text" class="form-control" maxlenght="11" name="email" placeholder="Email" required/>
												</div>
												<div class="form-group">
														<label for="addr">Address</label>
														<textarea class="form-control" row="3" name="addr" required></textarea>
												</div>


 </div>

 </div>
 </div>
 <!--end of bio-->

     </div>

     <div  id="prof">
     <!--begnning of profession-->

     <div class="col-md-12">
<div class="col-md-12 set">

<div class="col-sm-6">

 <div class="form-group">
														<label for="inputEmail">Work Category</label>
														<select class="form-control" name="workcat"  id="workcat" onchange="getWork(this.value)" onclick="getWork(this.value)">
																<option value="acc">ACCOUNTS</option>
                                                          <option value="frd">FRONTDESK</option>

<option value="inv">INVENTORY</option>                                                        <option value="lab">LABORATORY</option>

<option value="med">MEDICAL</option>

<option value="phm">PHARMACY</option>

<option value="rad">RADIOLOGY</option>

</select>
  </div>

  <div class="form-group" id="worktype">
  </div>

 </div>


<div class="col-sm-6">
<div class="form-group">
														<label for="soo">User Type</label>
														<select class="form-control" name="usertype" id="usertype">
																<option>---Select---</option>
                                                          <option value="SA">SUPER ADMIN</option>
                                                          <option value="DA">DEPARTMENTAL ADMIN</option>
                                                          <option value="RG">REGULAR</option>

 </select>
 </div>

 <div class="form-group">
														<label for="dept">Department</label>
														<select class="form-control" name="dept" id="dept">
																<option>---Select---</option>
<?php
																if(isset($this->dept))
																{
	$dept=$this->dept;
	$size=sizeof($dept);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$dept[$i]['id'].">".$dept[$i]['dept_name']."</option>";
    }
																}
																?>

 </select>
 </div>

<div class="form-group">
														<label for="inputEmail">OFFICE NUMBER</label>
														<input type="text" class="form-control" name="office_no" placeholder="Office Number" required/>
												</div>


   </div>


 </div>
 </div>

     <!--end of profession-->
     </div>

     <div id="login">
   <!--begninnig of login-->

   <div class="form-group">

														<label for="userid">USER ID</label>
														<input type="text" class="form-control"  name="userid"  required  id="userid" />
  </div>
 <div class="form-group">                                                        <input type="button" class="btn btn-success" value="Generate ID" name="gen" onclick="getId()"/>
</div>
<div class="form-group">

														<label for="pass">PASSWORD</label>
														<input type="text" class="form-control"  name="pass" id="pass"  required />
	</div>
     <div class="form-group">                                                        <input type="button" class="btn btn-success" value="Generate Password" name="genpass" onclick="genPass()"/>
</div>

    <div class="form-group">

	<input type="submit" class="btn btn-success" value="ADD USER" name="submit"/>
   </div>
   <!--end of login-->
     </div>

  </div>

</div>
    </form>
	</div>
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
