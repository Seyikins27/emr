<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="<?php echo DIR.PUB.DS?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo DIR.PUB.DS?>css/creative.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo DIR.PUB.DS?>datatable/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DIR.PUB.DS?>datatable/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DIR.PUB.DS?>datatable/bootstrap/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DIR.PUB.DS?>datatable/bootstrap/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo DIR.PUB.DS?>datatable/my_datatable/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DIR.PUB.DS?>datatable/my_datatable/css/responsive.bootstrap.min.css" />
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery-1.12.4.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/dataTables.responsive.min.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/responsive.bootstrap.min.js"></script>
	
	<script src="<?php echo DIR.PUB.DS?>js/lumino.glyphs.js"></script>
    	
   <!-- <script src="<?php echo DIR.PUB.DS?>js/jquery.js"></script>
 <script src="<?php echo DIR.PUB.DS?>js/bootstrap.min.js"></script>-->
   
    <script type="text/javascript" src="<?php echo DIR.PUB.DS?>js/bootstrap-datepicker.js"></script>
    <title><?php 
	if(isset($this->pagetitle))
	{
		echo $this->pagetitle;
    }
	?></title>
</head>

<body>
		<nav class="navbar navbar-default header_size no-radius">
			<div class="container-fuild">
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="<?php echo DIR.$this->url; ?>" class="navbar-brand" style="color: #fff"><?php echo $this->headertitle; ?></a>
                  
                  
                  
                  
                    
				</div>
			</div>
		</nav>
		
		
		 
		
	
	
   