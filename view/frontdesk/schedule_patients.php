
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery-1.12.4.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<div class="col-sm-7 col-xs-12">
  <div class="col-sm-12 wrapper">
	<h1>Schedule Patients</h1><hr/>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Picture</th>
                <th>Schedule Patient</th>
                
            </tr>
        </thead>
          <tbody>
        <?php
		if(isset($this->bio)):?>
       
	
          <?php
	       $data=$this->bio;
	       $count=sizeof($data);
	       for($i=0; $i<$count; $i++):?> 
          
       
            <tr>
                <td><?php echo $data[$i]['patient_id'];?></td>
                <td><?php echo $data[$i]['patient_last_name']." ".$data[$i]['patient_first_name']." ".$data[$i]['patient_middle_name'];?></td>
                <td><?php echo $data[$i]['gender'];?></td>
                <td><?php echo $data[$i]['DOB'];?></td>
                <td> <div class="profile_pic">
                            <img src="<?php echo DIR.$data[$i]['picture'];?>" alt="..." class="img-circle profile_img" height="50" width="50">
                        </div></td>
                 <td><a href="<?php echo DIR.$this->url;?>/schedule/<?php echo $data[$i]['patient_id'];?>" data-toggle="modal" class="btn btn-success">Schedule</a></td>
                
               
            </tr>
           
      
		<?php endfor; endif; ?>
          </tbody>
    </table>
  </div>
</div>


