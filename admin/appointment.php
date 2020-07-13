<?php
/*
* Author: Shahrukh Khan and Santanu Mondal
*/
include("config.php");
include("includes/header.php");

?>   
<?php echo $msg; ?>

  <div class="height30"></div>
   <div class="message-menu">
 <!--    <select name="select" id="select-menu">
                 <option value="All">All</option>
                 <option value="Manage scheduleSend">Send</option>
                 <option value="Received">Received</option>
                 <option value="Send Messages">Send Messages</option>
               
                </select>-->
 

</div>

<div class="height10"></div> 
<div class="schedule-details">




<table width="100%" border="0" cellspacing="0" cellpadding="0"  id="tableshow">
  <tr class="raw">

    <td align="left" valign="top"><strong>Patient Name</strong> </td>
      <td align="left" valign="top"><strong>Provider Name</strong> </td>
     <td align="left" valign="top"><strong>Appointment Date</strong> </td>
      <td align="left" valign="top"><strong>Appointment Time</strong> </td>
       <td align="left" valign="top"><strong>Scheduled Time</strong> </td>
      <td align="left" valign="top"><strong>Office Location</strong> </td>
      <td align="left" valign="top"><strong>Appointment Type</strong> </td>
      <td align="left" valign="top"><strong>Note</strong> </td>
      <td align="left" valign="top"><strong>Appointment Mode</strong> </td>
      <td align="left" valign="top"><strong></strong>Status</td>
      
         <td align="left" valign="top"><strong>Action</strong> </td>
  </tr>
 <?php
 $query_device = "select * from `dental_appointment` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $cat)
    {
      if($cat->page==1)
        $home="Yes";
      else
        $home="No";

      $ongoing_query1 = "SELECT * from dental_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->user_id
           
            ));
        $result1 = $statement1->fetch();


      $ongoing_query1 = "SELECT * from dental_provider where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result2 = $statement1->fetch();


          $ongoing_query1 = "SELECT * from dental_appointment_type where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result3 = $statement1->fetch();



?>
<tr>
   
	<td align="left" valign="top" ><?php echo $result1->fullname; ?></td>
    <td align="left" valign="top"><?php echo $result2->title; ?></td>
    <td  align="left" valign="top"><?php echo $cat->appointment_date; ?></td>
    <td align="left" valign="top"><?php echo $cat->appointment_time; ?></td>
     <td align="left" valign="top"><?php echo $cat->scheduled_time; ?></td>
    <td align="left" valign="top" ><?php echo $cat->office; ?></td>
    <td align="left" valign="top"><?php echo $result3->title; ?> (<?php echo $result3->duration; ?>)</td>
    <td  align="left" valign="top"><?php echo $cat->note; ?></td>
     <td  align="left" valign="top"><?php echo $cat->appointment; ?></td>
   
    <td align="left" valign="top"><?php echo $cat->status; ?></td>
    <td align="left" valign="top"><span class="reply"><a href="edit_appointment.php?id=<?php echo $cat->id; ?>">Edit</a> </span>
   <span class="delete">   <a href="appointment.php?del=<?php echo $cat->id; ?>" onClick="return delete();" >Delete</a></span> </td>
</tr>
<?php 
}
?>
</table>


</div>
<?php
if(isset($_REQUEST['del']))
{
  $ongoing_query1 = "Delete from dental_appointment where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$_REQUEST['del']
           
            ));
        ?>
        <script>window.location.href="appointment.php"</script>
        <?php

}
include("includes/footer.php");
?>
<script type="text/javascript">
  function delete(){
    var r = confirm("DO you want to delete this row?");
    if(r==false)
      return false;
    else
      return true;
  }
</script>
