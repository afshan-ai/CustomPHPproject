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
     <td align="left" valign="top"><strong>Insurance Name</strong> </td>
      <td align="left" valign="top"><strong>Dental Amount</strong> </td>
       <td align="left" valign="top"><strong>Total Coverage</strong> </td>
     
  </tr>
 <?php

 
 

 $query_device = "select * from `dentalsb_insurance` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
  
    foreach($result_devices as $cat)
    {
      

      $ongoing_query1 = "SELECT * from dentalsb_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->user_id
           
            ));
        $result1 = $statement1->fetch();


     


          


if($cat->insurance_id!='')
{

?>
<tr>
   
	 <td align="left" valign="top" ><?php echo str_replace($salt,'',base64_decode($result1->fullname)); ?></td>
    <td  align="left" valign="top"><?php echo $cat->insurance_id; ?></td>
    <td align="left" valign="top"><?php echo $cat->dental_amount; ?></td>
   
    <td align="left" valign="top"><?php echo $cat->total_coverage; ?></td>

</tr>
<?php 

}
}
?>
</table>


</div>
<?php
if(isset($_REQUEST['del']))
{
  $ongoing_query1 = "Delete from dentalsb_appointment where id=:id";

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
