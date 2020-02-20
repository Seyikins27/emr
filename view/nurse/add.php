<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery-1.12.4.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<script type="text/javascript">

function searchPatient(str)
{
	
if (str=="")
  {
  document.getElementById('patient').innerHTML="";
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
    document.getElementById('patient').innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","/TRHS/components/searchPatient/"+str,true);
xmlhttp.send();
}
</script>
<div class="col-sm-6 col-xs-12">
  <div class="col-sm-12 wrapper">
	<h1>Patient info</h1><hr/>
     
     <div class="form-group">
     <input type="search" class="form-control" name="search" id="search"/>
     <input type="button" class="btn btn-info" id="searchbtn" onClick="searchPatient(search.value)" value="Search patient by name or id"/>
     </div>
    
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" width='100%' cellspacing='0'>
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Phone</th> 
                <th>Address</th> 
                <th>Add to ward</th> 
            </tr>
        </thead>
         <tbody id="patient">
   
        
       
    
  </div>
</div>
