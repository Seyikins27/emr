 
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
    document.getElementById('userid').value=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","/HIS/components/gen",true);
xmlhttp.send();
}
</script>

<form method="post" action="">
                                 
 <div class="form-group">

														<label for="userid">USER ID</label>
														<input type="text" class="form-control"  name="userid"  required disabled="disabled" id="userid"/> 
  </div>               
 <div class="form-group">                                                        <input type="button" class="btn btn-success" value="Generate ID" name="gen" onclick="getId()"/>
</div>
<div class="form-group">
<form>
														<label for="pass">PASSWORD</label>
														<input type="password" class="form-control"  name="pass"  required/>
	</div>
  <div class="form-group">
														<label for="confpass">CONFIRM PASSWORD</label>
														<input type="password" class="form-control" maxlenght="11" name="confpass"  required/>
												</div>
	<input type="submit" class="btn btn-success" value="Create" name="submit"/>
</form>			