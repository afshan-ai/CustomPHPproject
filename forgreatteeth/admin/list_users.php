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

    <td align="left" valign="top"><strong>Name</strong> </td>
      <td align="left" valign="top"><strong>Email</strong> </td>
     <td align="left" valign="top"><strong>Phone</strong> </td>
    <td align="left" valign="top"><strong>Registration Date</strong> </td>
      
         <td align="left" valign="top"><strong>Action</strong> </td>
  </tr>
 <?php
if(isset($_REQUEST['search']))
 {
    $query_device = "select * from `dentalfor_user` order by id desc";
     $statement_device = $pdo->prepare($query_device);
    $statement_device->execute();
       // $statement_device->execute(array("search"=>"%".$_REQUEST['search']."%"));
    $result_devices = $statement_device->fetchAll();
  foreach($result_devices as $cat1)
    {
      $fname = str_replace($salt,'',base64_decode($cat1->fullname));
      //echo $fname;
      //echo '<br>'.stripos( $fname,$_REQUEST['search']).'</br>';
       if (trim(stripos( $fname,$_REQUEST['search']))!='') {

     $u_id = $cat1->id;
    $query_device1 = "select * from `dentalfor_user` where id='$u_id'";

        $statement_device1= $pdo->prepare($query_device1);

        $statement_device1->execute(array());
    $cat = $statement_device1->fetch();
    if($cat->page==1)
        $home="Yes";
      else
        $home="No";

      $ongoing_query1 = "SELECT * from dentalfor_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->user_id
           
            ));
        $result1 = $statement1->fetch();


      $ongoing_query1 = "SELECT * from dentalfor_provider where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result2 = $statement1->fetch();


          $ongoing_query1 = "SELECT * from dentalfor_appointment_type where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result3 = $statement1->fetch();

 $ongoing_query1 = "SELECT * from dentalfor_appointment where user_id=:id order by id desc";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->id
           
            ));
        $result4 = $statement1->fetch();

?>
<tr>
   
  <td align="left" valign="top" ><?php echo str_replace($salt,'',base64_decode($cat->fullname)); ?></td>
    <td align="left" valign="top"><?php echo str_replace($salt,'',base64_decode($cat->email)); ?></td>
    <td  align="left" valign="top"><?php echo str_replace($salt,'',base64_decode($cat->phone)); ?></td>
   <td  align="left" valign="top"><?php echo $cat->registration_date; ?></td>
    <td align="left" valign="top"><span class="chat"><a href="chat-room.php?id=<?php echo $cat->id; ?>">Chat</a> </span>
      <span class="view"><a href="view_user.php?id=<?php echo $cat->id; ?>">View</a> </span>
      <span class="edit"><a href="edit_user.php?id=<?php echo $cat->id; ?>">Edit</a> </span>
      <span class="delete"><a href="list_users.php?id=<?php echo $cat->id; ?>" onclick="return confirm('Are you sure?');">Delete</a> </span>
      <span class="pdf1"><a href="pdf/appointment/dental_history.php?id=<?php echo $result4->id; ?>" target="_blank">Medical and Dental History form</a> </span>
   </td>
</tr>
<?php
    }
    }
  
 }
 else
 {
 $query_device = "select * from `dentalfor_user` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
  
    foreach($result_devices as $cat)
    {
      if($cat->page==1)
        $home="Yes";
      else
        $home="No";

      $ongoing_query1 = "SELECT * from dentalfor_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->user_id
           
            ));
        $result1 = $statement1->fetch();


      $ongoing_query1 = "SELECT * from dentalfor_provider where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result2 = $statement1->fetch();


          $ongoing_query1 = "SELECT * from dentalfor_appointment_type where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result3 = $statement1->fetch();

 $ongoing_query1 = "SELECT * from dentalfor_appointment where user_id=:id order by id desc";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->id
           
            ));
        $result4 = $statement1->fetch();

?>
<tr>
   
  <td align="left" valign="top" ><?php echo str_replace($salt,'',base64_decode($cat->fullname)); ?></td>
    <td align="left" valign="top"><?php echo str_replace($salt,'',base64_decode($cat->email)); ?></td>
    <td  align="left" valign="top"><?php echo str_replace($salt,'',base64_decode($cat->phone)); ?></td>
   <td  align="left" valign="top"><?php echo $cat->registration_date; ?></td>
    <td align="left" valign="top"><span class="chat"><a href="chat-room.php?id=<?php echo $cat->id; ?>">Chat</a> </span>
      <span class="view"><a href="view_user.php?id=<?php echo $cat->id; ?>">View</a> </span>
      <span class="edit"><a href="edit_user.php?id=<?php echo $cat->id; ?>">Edit</a> </span>
      <span class="delete"><a href="list_users.php?id=<?php echo $cat->id; ?>" onclick="return confirm('Are you sure?');">Delete</a> </span>
      <span class="pdf1"><a href="pdf/appointment/dental_history.php?id=<?php echo $result4->id; ?>" target="_blank">Medical and Dental History form</a> </span>
   </td>
</tr>
<?php 
}
}
?>
</table>


</div>
<?php
if(isset($_REQUEST['id']))
{
  $ongoing_query1 = "Delete from dentalfor_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$_REQUEST['id']
           
            ));
        ?>
        <script>window.location.href="list_users.php"</script>
        <?php

}
include("includes/footer.php");
?>
<script type="text/javascript">
  function delete(){
    var r = confirm("Do you want to delete this row?");
    if(r==false)
      return false;
    else
      return true;
  }
</script>
