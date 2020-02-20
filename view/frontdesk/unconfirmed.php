
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery-1.12.4.js"></script>
<script src="<?php echo DIR.PUB.DS?>datatable/my_datatable/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#example2').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<div class="col-sm-5 col-xs-12 pull-right">
  <div class="col-sm-12 wrapper">
	<h4>Unconfirmed Schedules</h4><hr/>
  <table id="example2" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
      <thead>
          <tr>
              <th>Patient ID</th>
              <th>Physician</th>
              <th>Time</th>
              <th>Date</th>

          </tr>
      </thead>
       <tbody>
      <?php
  if(isset($this->unc)):?>


        <?php

       $data=$this->unc;
       $count=sizeof($data);
       for($i=0; $i<$count; $i++):?>

      
          <tr>
              <td><?php echo $data[$i]['patient_id'];?></td>
              <td><?php echo Complib::patient_name($data[$i]['patient_id']); ?></td>
              <td><?php echo $data[$i]['time'];?></td>
              <td><?php echo $data[$i]['date'];?></td>

          </tr>

     
  <?php endfor; endif; ?>
   </tbody>
  
  
  </table>

  <div class="col-sm-12 wrapper">
  <h4>Today's clinic</h4><hr/>
  </div>

</div>
