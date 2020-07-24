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
     <td align="left" valign="top"><strong>Rating</strong> </td>
      <td align="left" valign="top"><strong>Review</strong> </td>
      
      
         <td align="left" valign="top"><strong>Action</strong> </td>
  </tr>
 <?php

 
 $query_device = "select * from `dentalsb_review` order by id desc";

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


      




?>
<tr>
   
  <td align="left" valign="top" ><?php echo ucfirst(str_replace($salt,'',base64_decode($result1->fullname))); ?></td>
    <td  align="left" valign="top"><?php echo $cat->rating; ?></td>
    <td align="left" valign="top"><?php echo $cat->review; ?></td>
   
    <td align="left" valign="top">
      <span class="edit"><a href="edit_review.php?id=<?php echo $cat->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </span>
      <span class="chat"><a href="chat-room.php?id=<?php echo $cat->user_id; ?>"><i class="fa fa-weixin" aria-hidden="true"></i></a> </span>
            <span class="mail"><a href="mailto:<?php echo $result1->email;?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </span>

     </td>
</tr>
<?php 
}
?>
</table>


</div>
<?php
include("includes/footer.php");
?>
");
?>
