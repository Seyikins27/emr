<script>
    function clear(){

    var conf=confirm("Confirm payment?");
    if (conf==true){
      alert("Payment Cleared")
    }else{
        alert("Not cleared")
    }
    return del;
    }
</script>
<div class="col-sm-9 col-xs-12">
  <div class="col-sm-12 wrapper">
	<h1>View Patients Bills</h1><hr/>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Clear Payment</th>
            </tr>
        </thead>
        <?php
		if(isset($this->all)):?>


          <?php

	       $data=$this->all;
	       $count=sizeof($data);
	       for($i=0; $i<$count; $i++):?>

         <tbody>
            <tr>
                <td><?php echo $data[$i]['patient_id'];?></td>
                <td><?php echo Complib::patient_name($data[$i]['patient_id']); ?></td>
                <td><?php echo $data[$i]['product_id'];?></td>
                <td><?php echo $data[$i]['price'];?></td>
                <td><?php if($data[$i]['payment_status']==0)
{
	echo "<div class='btn btn-error'>NOT CLEARED</div>";
}
else if($data[$i]['payment_status']==1)
{
	echo "<div class='btn btn-success'>CLEARED</div>";
}	?></td>

                 <td>
                   <a href="<?php echo DIR.$this->url;?>/payment/<?php echo $data[$i]['reference_no']; ?>" class="btn btn-success">CLEAR PAYMENT</a>
                   <a href="<?php echo DIR.$this->url;?>/clear/<?php echo $data[$i]['cart_id']."/". $data[$i]['reference_no'];?>" data-toggle="modal" class="btn btn-success" onclick="return clear()">Clear Payment</a></td>


            </tr>

        </tbody>
		<?php endfor; endif; ?>
    </table>
  </div>
</div>
