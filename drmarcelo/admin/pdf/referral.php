<?php
/*
* Author: Shahrukh Khan and Santanu Mondal
*/
include("config.php");
include("includes/header.php");

?>   
<?php echo $msg; ?>

  <!--<div class="height30"></div>-->
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

    <td align="left" valign="top"><strong>Friend name</strong> </td>
       <td align="left" valign="top"><strong>Friend Email</strong> </td>
       <td align="left" valign="top"><strong>Referred By</strong> </td>
  <td align="left" valign="top"><strong>Action</strong> </td>
  </tr>
 <?php
  $query_device = "select * from `dental1_referral` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
  
    foreach($result_devices as $cat)
    {
      

?>
<tr>
   
  <td align="left" valign="top" ><?php echo $cat->name; ?></td>
    <td align="left" valign="top" ><?php echo $cat->email; ?></td>
  
    <td align="left" valign="top" ><?php echo $cat->rb; ?></td>
  
  
    <td align="left" valign="top">
     <!-- <span class="reply"><a href="edit_location.php?id=<?php echo $cat->id; ?>">Edit</a> </span>-->
      <span class="reply"><a href="referral.php?id=<?php echo $cat->id; ?>" onclick="return confirm('Are you sure?');">Delete</a> </span>
     </td>
</tr>
<?php 
}
?>
</table>


</div>
<?php
if(isset($_REQUEST['id']))
{
  $ongoing_query1 = "Delete from dental1_referral where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$_REQUEST['id']
           
            ));
        ?>
        <script>window.location.href="referral.php"</script>
        <?php

}
include("includes/footer.php");
?>
