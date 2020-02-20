


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
xmlhttp.open("GET","/HIS/components/work/"+ctr,true);
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
														<label for="inputEmail">Work Category</label>
														<select class="form-control" name="workcat"  id="workcat" onchange="getWork(this.value)" onclick="getWork(this.value)">
																<option value="acc">ACCOUNTS</option>
                                                          <option value="frd">FRONTDESK</option>
                                                        <option value="lab">LABORATORY</option>
                                                        
<option value="med">MEDICAL</option>

<option value="phm">PHARMACY</option>

<option value="oth">OTHERS</option>																
</select>
  </div>
  
  	<div class="form-group" id="worktype">
    
    </div>
  
   
   	<div class="form-group">
														<label for="phone">Designation</label>
														<input type="text" class="form-control" maxlenght="11" name="phone" placeholder="e.g. administrative officer, consultant" required/>
												</div>
												
                                                
                                                <div class="form-group">

<button class="btn btn-success" data-target="#login"data-toggle="tab" >NEXT >></button>

</div>
   
 </div>             	   


<div class="col-sm-6">
<div class="form-group">
														<label for="soo">User Type</label>
														<select class="form-control" name="usertype" id="usertype" onclick="getLga(this.value)" onchange="getLga(this.value)">
																<option>---Select---</option>
                                                          <option>SUPER ADMIN</option>
                                                          <option>DEPARTMENTAL ADMIN</option>
                                                          <option>REGULAR</option>
																
 </select>
 </div>
 
 <div class="form-group">
														<label for="soo">Department</label>
														<select class="form-control" name="usertype" id="usertype" onclick="getLga(this.value)" onchange="getLga(this.value)">
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