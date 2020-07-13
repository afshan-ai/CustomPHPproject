<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");

  

 $query_device = "select * from `dental2_user` where id=:id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $provider = $statement_device->fetch();
    
      
?>
 <div class="height50"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Name :</label>
  <?php echo $provider->fullname;?>
  </p>
  <p><label><span>*</span>Username :</label>
  <?php echo $provider->username;?>
  </p>
  
  <p><label><span>*</span>Email :</label>
  <?php echo $provider->email;?>
  </p>
  <p><label><span>*</span>Phone :</label>
  <?php echo $provider->phone;?>
  </p>
  <p><label>Total Coverage :</label>
  <?php echo $provider->total_coverage;?>
  </p>
  <p><label>Registration Date :</label>
  <?php echo $provider->registration_date;?>
  </p>
  
  <?php if($provider->profile_pic!='')
  {
    ?>
  
       <p><label>Profile Picture :</label>
  <img src="../image/<?php echo $provider->profile_pic;?>" height="150"/>
  </p>
  <?php
}
?>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>