<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery-1.12.4.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>

<div class="col-sm-9 col-xs-12">
  <div class="col-sm-12 wrapper">
	<h1>View Patients</h1><hr/>
    
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Time</th>
                <th>Date</th>
                <th>Visit type</th> 
                <th>Complains</th> 
                <th>Consult</th> 
            </tr>
        </thead>
         <tbody>
        <?php
		if(isset($this->schedule)):?>
       
	
          <?php
	       $data=$this->schedule;
	       $count=sizeof($data);
	       for($i=0; $i<$count; $i++):?> 
          
        
            <tr>
                <td><?php echo $data[$i]['patient_id'];?></td>
                <td><?php echo Complib::patient_name($data[$i]['patient_id']);?></td>
               
                <td><?php echo $data[$i]['time'];?></td>
                
                <td ><?php echo $data[$i]['date'];?></td>
                <td ><?php if($data[$i]['visit_type']=='init')
				{echo "Initial Visit";}
				else if($data[$i]['visit_type']=='foll')
				{
					echo "Followup Visit";
			    }
				
				?></td>
                <td ><?php echo $data[$i]['complaints'];?></td>
               <td><a href="<?php echo DIR.$this->url;?>/consult/<?php echo $data[$i]['case_id']."/".$data[$i]['patient_id'];?>" data-toggle="modal" class="btn btn-success">Consult</a></td>
            </tr>
           
        
		<?php endfor; endif; ?>
        </tbody>
    </table>
  </div>
</div>
