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
 
<ul id="msg">

<li><a href="add_location.php">Add Location</a></li>
</ul>

</div>

<div class="height10"></div> 
<div class="schedule-details">




<table width="100%" border="0" cellspacing="0" cellpadding="0"  id="tableshow">
  <tr class="raw">

    <td align="left" valign="top"><strong>Location</strong> </td>
       <td align="left" valign="top"><strong>Address</strong> </td>
       <td align="left" valign="top"><strong>City</strong> </td>
       <td align="left" valign="top"><strong>State</strong> </td>
       <td align="left" valign="top"><strong>Postal Code</strong> </td> 
         <td align="left" valign="top"><strong>Action</strong> </td>
  </tr>
 <?php
  $query_device = "select * from `dental3_location` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
  
    foreach($result_devices as $cat)
    {
      

?>
<tr>
   
  <td align="left" valign="top" ><?php echo $cat->location; ?></td>
    <td align="left" valign="top" ><?php echo $cat->address; ?></td>
  
    <td align="left" valign="top" ><?php echo $cat->city; ?></td>
  
    <td align="left" valign="top" ><?php echo $cat->state; ?></td>
  
    <td align="left" valign="top" ><?php echo $cat->zip; ?></td>
  
    <td align="left" valign="top">
      <span class="edit"><a href="edit_location.php?id=<?php echo $cat->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </span>
      <span class="delete"><a href="location.php?id=<?php echo $cat->id; ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span>
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
  $ongoing_query1 = "Delete from dental3_location where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$_REQUEST['id']
           
            ));
        ?>
        <script>window.location.href="location.php"</script>
        <?php

}
include("includes/footer.php");
?>
