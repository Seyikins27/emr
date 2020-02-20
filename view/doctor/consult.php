 
<link rel="stylesheet" href="<?php echo DIR.PUB.DS?>chosen/docsupport/style2.css">
  <link rel="stylesheet" href="<?php echo DIR.PUB.DS?>chosen/docsupport/prism.css">
  <link rel="stylesheet" href="<?php echo DIR.PUB.DS?>chosen/chosen.css">

 <script src="<?php echo DIR.VW.DS?>doctor/js/consult.js" type="text/javascript"></script>
<script>
 $(document).ready(function(e) {
    $('#bmitext').hide();
	$('input[type="radio"]').eq(1).change(function(){
		$('#bmitext').show()
	});
});
</script>
<?php
		if(isset($this->patient_case) && isset($this->patient_vitals)):?>
        <?php 
		 $data=$this->patient_case;
		 $vitals=$this->patient_vitals;
		?>

<form method="post" action="<?php echo DIR.$this->url;?>/save_case/<?php echo $data[0]['case_id']; ?>">
<div class="col-sm-6 col-xs-12">
  <div class="widget">
	<h1>New Case: <?php  echo ucwords(strtolower(Complib::patient_name($this->pid)));?></h1><hr/>
  </div>
  <span></span>
     
	
        
   <div class="widget-header">
	<h3>Vital Signs </h3><hr/>
     <div class="form-group">
    <label><h4>Height</h4></label>
    <input class="form-control" name="height" value="<?php echo $vitals[0]['height']; ?>"/>
    </div>
    <div class="form-group">
    <input type="hidden" name="ref" value="<?php echo $vitals[0]['unique_ref'];?>"/>
    
    
    <label><h4>Weight</h4></label>
    <input class="form-control" name="weight" value="<?php echo $vitals[0]['weight']; ?>" />
    </div>
    
    <div class="controls"><label><h4>BMI</h4></label>
	  <input class="form-control" name="bmi" value="<?php echo $vitals[0]['BMI']; ?>" />		
		</div>
     <div class="controls"><label><h4>Temperature</h4></label>
		 <input class="form-control" name="temp" value="<?php echo $vitals[0]['temperature']; ?>"/>
											</div>
                                            
     <div class="controls"><label><h4>Pulse</h4></label>
	   <input class="form-control" name="pulse" value="<?php echo $vitals[0]['pulse']; ?>"/>								
	</div>
    
     <div class="controls"><label><h4>Blood Pressure</h4></label>
	   <input class="form-control" name="bp" value="<?php echo $vitals[0]['BP']; ?>"/>
	<div>
                                             
    <input type="submit" name="vitalsbtn" value="Save" class="btn btn-success"/>
       </div>
      </div>
	</div>
 
<div class="row-fluid">
  <div class="span12">
  </div>
</div>

   <div class="widget-header">
	<h3>Physical Examination</h3><hr/>
    
    
    <div class="form-group">
		<label for="addr">Complaints</label>
														<textarea class="form-control" row="3" name="complaints" ><?php echo $data[0]['complaints']; ?></textarea>
												</div>
 
    <div class="form-group">
														<label for="addr">Symptoms</label>
														<textarea class="form-control" row="3" name="symptoms" ><?php echo $data[0]['symptom']; ?></textarea>
												</div>
    <div class="form-group">
														<label for="addr">Diagnosis</label>
														<textarea class="form-control" row="3" name="diagnosis" ><?php echo $data[0]['diagnosis']; ?></textarea>
                    </div>  
                    
         <div class="form-group">
			<label for="addr">comments</label>
														<textarea class="form-control" row="3" name="comments" ><?php echo $data[0]['comments']; ?></textarea>
           
     
	   <div>
                                             
    <input type="submit" name="physicalExambtn" value="Save" class="btn btn-success"/>
       </div>                                               
                                                        
    </div>                                   
  </div>
  
  
  <div class="row-fluid">
  <div class="span12">
  </div>
</div>
  
  <div class="widget-header">
	<h3>Prescription</h3><hr/>
     <div class="form-group">
														
  
      <label for="addr">Prescription</label>
          
          <select data-placeholder="Select drugs to be prescribed by typing... the name of the drug" style="width:400px;" multiple class="chosen-select " tabindex="8" name="prescription[]">
           <?php
	if(isset($this->drugs))
	{
	$drug=$this->drugs;
	$size=sizeof($drug);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$drug[$i]['drug_id'].">".$drug[$i]['drug_name']." ".$drug[$i]['dosage']."</option>";
    }															
	}
	
	  if(!empty($data[0]['prescription']))
		{
			$drugs='';
			$p=$data[0]['prescription'];
			$pr=explode(',',$p);
			$count=sizeof($pr);
			foreach($pr as $drug)
			{
				 $d=Complib::resolve('drugs_tbl',$drug,'drug_id', 'drug_name');
				
				echo "<option value=".$drug." selected='selected'>".$d."</option>";
			}
			
			
			
		}
		else
		{
			echo "empty";
		}
																
       ?>
          </select>
      <?php 
	   
	  ?>
      <div>
                                             
    <input type="submit" name="prescbtn" value="Save" class="btn btn-success"/>
       </div>
       </div>                            

  </div>
  
 <div class="row-fluid">
  <div class="span12">
  </div>
</div>
  
  
  <div class="row-fluid">
  <div class="span12">
  </div>
</div>
  
  <div class="widget-header">
	<h3>Refer For Test</h3><hr/>
    
     <label for="addr">Tests</label>
          
          <select data-placeholder="Select test to be administered by typing... the name(s) of the test" style="width:400px;" multiple class="chosen-select " tabindex="8" name="tests">
           <?php
	if(isset($this->drugs))
																{
	$drug=$this->drugs;
	$size=sizeof($drug);
	for($i=0; $i<$size; $i++)
	{
		echo "<option value=".$drug[$i]['drug_id'].">".$drug[$i]['drug_name']." ".$drug[$i]['dosage']."</option>";
    }															
																}
																?>
          </select>
  
   <input type="submit" name="testResults" value="Send for Test" class="btn btn-info"/>
  
     <input type="submit" name="testResults" value="View Test Form" class="btn btn-info"/>
    
    <input type="submit" name="testbtn" value="View Test Results" class="btn btn-info"/>
        </div>
        
        <div class="row-fluid">
  <div class="span12">
  </div>
</div>
        
        
    <div class="widget-header widget-header-blue">
	<h3>Save Case Note</h3><hr/>
       <input type="submit" name="allbtn" value="Save as Completed Case Note" class="btn btn-success"/>
    </div>
   </div>
   </div>
  

 </form>

<?php endif; ?>

<script src="<?php echo DIR.PUB.DS?>chosen/prototype.js" type="text/javascript"></script>
  <script src="<?php echo DIR.PUB.DS?>chosen/chosen.proto.js" type="text/javascript"></script>
  <script src="<?php echo DIR.PUB.DS?>chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
  document.observe('dom:loaded', function(evt) {
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text: "Oops, nothing found!"},
      '.chosen-select-width'     : {width: "95%"}
    }
    var results = [];
    for (var selector in config) {
      var elements = $$(selector);
      for (var i = 0; i < elements.length; i++) {
        results.push(new Chosen(elements[i],config[selector]));
      }
    }
    return results;
  });
  </script>