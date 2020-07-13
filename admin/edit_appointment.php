<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
  //echo '<pre>';print_r($_REQUEST);echo '</pre>';
		$ongoing_query ="Update `dental_appointment` set `scheduled_time`=:appointment_time,new_user=:new_user,status=:status where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "appointment_time"=>$_REQUEST["appointment_time"],
           "status"=>$_REQUEST["status"],
           "new_user"=>$_REQUEST["new_user"],
            "id"=>$_REQUEST["id"]
           
            ));
}
 $query_device = "select * from `dental_appointment` where id=:id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $result_devices = $statement_device->fetch();
?>

 <div class="height50"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
<div class="shedule-form">

  <p><label><span>*</span>Appointment Time :</label>
  	<select name="appointment_time">
  	<option value="9.00 am" <?php if($result_devices->scheduled_time=="9.00 am") echo 'selected="selected"';?>>9.00 am</option>
    <option value="10.00 am" <?php if($result_devices->scheduled_time=="10.00 am") echo 'selected="selected"';?>>10.00 am</option>
    <option value="11.00 am"  <?php if($result_devices->scheduled_time=="11.00 am") echo 'selected="selected"';?>>11.00 am</option>
    <option value="12.00 pm"  <?php if($result_devices->scheduled_time=="12.00 pm") echo 'selected="selected"';?>>12.00 pm</option>
    <option value="1.00 pm"  <?php if($result_devices->scheduled_time=="1.00 pm") echo 'selected="selected"';?>>1.00 pm</option>
    <option value="2.00 pm"  <?php if($result_devices->scheduled_time=="2.00 pm") echo 'selected="selected"';?>>2.00 pm</option>
    <option value="3.00 pm"  <?php if($result_devices->scheduled_time=="3.00 pm") echo 'selected="selected"';?>>3.00 pm</option>
    <option value="4.00 pm"  <?php if($result_devices->scheduled_time=="4.00 pm") echo 'selected="selected"';?>>4.00 pm</option>
    <option value="5.00 pm"  <?php if($result_devices->scheduled_time=="5.00 pm") echo 'selected="selected"';?>>5.00 pm</option>
    <option value="6.00 pm"  <?php if($result_devices->scheduled_time=="6.00 pm") echo 'selected="selected"';?>>6.00 pm</option>
    <option value="7.00 pm"  <?php if($result_devices->scheduled_time=="7.00 pm") echo 'selected="selected"';?>>7.00 pm</option>
    <option value="8.00 pm"  <?php if($result_devices->scheduled_time=="8.00 pm") echo 'selected="selected"';?>>8.00 pm</option>
    <option value="9.00 pm"  <?php if($result_devices->scheduled_time=="9.00 pm") echo 'selected="selected"';?>>9.00 pm</option>
<select>
	  </p>  
    <p><label><span>*</span>Status :</label>
    <select name="status">
    <option value="In Progress" <?php if($result_devices->status=="In Progress") echo 'selected="selected"';?>>In Progress</option>
    <option value="approved" <?php if($result_devices->status=="approved") echo 'selected="selected"';?>>Approved</option>
    <option value="completed" <?php if($result_devices->status=="completed") echo 'selected="selected"';?>>Completed</option>
    <option value="cancelled" <?php if($result_devices->status=="cancelled") echo 'selected="selected"';?>>Cancelled</option>
<select>
    </p>  

 <p><label><span></span>New User :</label>
  <input type="checkbox" name="new_user" value="1"/></p>

            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>