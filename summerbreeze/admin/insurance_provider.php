<?php
/*
* Author: Shahrukh Khan and Santanu Mondal
*/
include("config.php");
include("includes/header.php");
?>   
<?php echo $msg; ?>

   <div class="message-menu">
 <!--    <select name="select" id="select-menu">
                 <option value="All">All</option>
                 <option value="Manage scheduleSend">Send</option>
                 <option value="Received">Received</option>
                 <option value="Send Messages">Send Messages</option>
               
                </select>-->
 
<ul id="msg">

<li><a href="add_insurance_provider.php">Add Insurance Provider</a></li>
</ul>
</div>

<div class="height10"></div> 
<div class="schedule-details">




<table width="100%" border="0" cellspacing="0" cellpadding="0"  id="tableshow">
  <tr class="raw">

    <td align="left" valign="top"><strong>Name</strong> </td>
      <td align="left" valign="top"><strong>Description</strong> </td>
     
      <td align="left" valign="top" width="100px;"><strong>Action</strong> </td>
  </tr>
 <?php
 $query_device = "select * from `dentalsb_insurance_provider` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $cat)
    {
    
?>
<tr>
   
	<td align="left" valign="top" ><?php echo $cat->title; ?></td>
    <td align="left" valign="top"><?php echo $cat->description; ?></td>
   
   <td align="left" valign="top"><span class="edit"><a href="edit_insurance_provider.php?id=<?php echo $cat->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </span>
   <span class="delete">   <a href="insurance_provider.php?id=<?php echo $cat->id; ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </td>
</tr>
<?php 
}
?>
</table>


</div>
<?php
if(isset($_REQUEST['id']))
{
   $ongoing_query = "delete from `dentalsb_insurance_provider`  where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
                      
            "id"=>$_REQUEST['id']
            ));
            ?>
            <script>window.location.href="insurance_provider.php";</script>
            <?php
}
include("includes/footer.php");
?>

