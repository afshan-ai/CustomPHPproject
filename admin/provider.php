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
 
<ul id="msg">

<li><a href="add_edit_location.php">Add Locations</a></li>
</ul>
</div>

<div class="height10"></div> 
<div class="schedule-details">




<table width="100%" border="0" cellspacing="0" cellpadding="0"  id="tableshow">
  <tr class="raw">

    <td align="left" valign="top"><strong>Name</strong> </td>
      <td align="left" valign="top"><strong>Designation</strong> </td>
     <td align="left" valign="top"><strong>Bio</strong> </td>
      <td align="left" valign="top"><strong>Show on Home Page</strong> </td>
         <td align="left" valign="top"><strong>Action</strong> </td>
  </tr>
 <?php
 $query_device = "select * from `dental_provider` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $cat)
    {
      if($cat->page==1)
        $home="Yes";
      else
        $home="No";

      $ongoing_query1 = "SELECT * from dental_category where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->cat_id
           
            ));
        $result1 = $statement1->fetch();
?>
<tr>
   
	<td align="left" valign="top" ><?php echo $cat->title; ?></td>
    <td align="left" valign="top"><?php echo $result1->title; ?></td>
    <td  align="left" valign="top"><?php echo $cat->bio; ?></td>
    <td align="left" valign="top"><?php echo $home; ?></td>
    <td align="left" valign="top"><span class="reply"><a href="add_edit_location.php?edit=<?php echo $cat->id; ?>">Edit</a> </span>
   <span class="delete">   <a href="location.php?del=<?php echo $cat->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></span> </td>
</tr>
<?php 
}
?>
</table>


</div>
<?php
include("includes/footer.php");
?>

