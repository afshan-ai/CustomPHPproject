<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");


?>
<?php
  $query_device = "select * from `dentalsb_appointment` where id=:id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $cat = $statement_device->fetch();

   // echo '<pre>';print_r($cat);echo '</pre>';
    
      $ongoing_query1 = "SELECT * from dentalsb_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->user_id
           
            ));
        $result1 = $statement1->fetch();


      $ongoing_query1 = "SELECT * from dentalsb_provider where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result2 = $statement1->fetch();


          $ongoing_query1 = "SELECT * from dentalsb_appointment_type where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->provider_id
           
            ));
        $result3 = $statement1->fetch();

         $ongoing_query1 = "SELECT * from dentalsb_checkin_status where appointment_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$cat->id
           
            ));
        $result4= $statement1->fetch();
?>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"  />
<div class="shedule-form">
  <p><label>Patient Name :</label>
  <?php echo $result1->fullname; ?>
  </p>
<p><label>Provider Name :</label>
  <?php echo $result2->title; ?>
  </p>
<p><label>Appointment Date :</label>
  <?php echo $cat->appointment_date; ?>
  </p>
<p><label>Appointment Time :</label>
  <?php echo $cat->appointment_time; ?>
  </p>
<p><label>Scheduled Time :</label>
  <?php echo $cat->scheduled_time; ?>
  </p>
<p><label>Office Location :</label>
  <?php echo $cat->location; ?>
  </p>
<p><label>Appointment Type :</label>
  <?php echo $result3->title; ?> (<?php echo $result3->duration; ?>)
  </p>
<p><label>Note :</label>
  <?php echo $cat->note; ?>
  </p>
<p><label>Appointment Mode :</label>
  <?php echo $cat->appointment; ?>
  </p>
<p><label>Check In Status :</label>
<?php echo $result4->checkin_status; ?>
  </p>
<p><label>Check In Note :</label>
  <?php echo $result4->checkin_note; ?>
  </p>
<p><label>Status :</label>
  <?php echo $cat->status; ?>
  </p>




<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>