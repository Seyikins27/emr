<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<div class="page-content">
  <div class="row-fluid">
    <div class="span12">
	<h1>Manage Staff</h1><hr/>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>

            </tr>
        </thead>
         <tbody>
        <?php
		if(isset($this->all)):?>


          <?php
	       $data=$this->all;
	       $count=sizeof($data);
	       for($i=0; $i<$count; $i++):?>


            <tr>
                <td><?php echo $data[$i]['staff_id'];?></td>
                <td><?php echo $data[$i]['firstname']." ".$data[$i]['lastname'];?></td>
                <td><?php echo Complib::resolve('department',$data[$i]['department'], 'id', 'dept_name');?></td>
                <td><?php echo $data[$i]['designation'];?></td>

                <td ><a href="" class="glyphicon glyphicon-edit"></a></td>
                <td ><a href="" class="glyphicon glyphicon-erase"></a></td>
                <td><a href="" class="glyphicon glyphicon-click">click to view</a></td>

            </tr>


		<?php endfor; endif; ?>
        </tbody>
    </table>
  </div>
</div>
</div>
