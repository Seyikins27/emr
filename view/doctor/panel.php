
<div class="col-sm-3 col-xs-12">
  <div class="col-sm-12 wrapper">
	<h1>Medical History</h1><hr/>
    <?php
	 if(isset($this->caseHistory))
	 {
		  $data=$this->caseHistory;
	      $size=count($data);
	       for($i=0; $i<$size; $i++):?>
		   
			   <div class="panel panel-body"><p><a href="<?php echo DIR.$this->url."/case/". $data[$i]['case_id']; ?>"><?php echo $data[$i]['date']; ?></a></p>
               <p><b>Diagnosis: <?php echo $data[$i]['diagnosis']; ?></b></p>
               <p><b>Consultant: <?php echo Complib::staff_name($data[$i]['doctor_id']); ?></b></p>
               </div>
		   
	 
	<?php endfor; } ?>
   <div class="col-sm-12 wrapper">
	<h4>Vital Signs</h4><hr/>
  </div>
  <div class="col-sm-12 wrapper">
	<h4>Physical Examination</h4><hr/>
  </div>
  <div class="col-sm-12 wrapper">
	<h4>Diagnosis</h4><hr/>
  </div>
  <div class="col-sm-12 wrapper">
	<h4>Prescription</h4><hr/>
  </div>			
  </div>
</div>
