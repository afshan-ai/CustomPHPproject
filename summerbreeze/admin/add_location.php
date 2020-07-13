<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "Insert into `dental2_location` set `location`=:location,address=:address,city=:city,state=:state,zip=:zip";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
          "location"=>$_REQUEST['location'],
           "address"=>$_REQUEST['address'],
            "city"=>$_REQUEST['city'],
 "state"=>$_REQUEST['state'],
 "zip"=>$_REQUEST['zip']
            ));
     
      ?>
      <script>window.location.href="location.php"</script>
      <?php
}

?>

 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">

<div class="shedule-form">
  <p><label><span>*</span>Location :</label>
  <input type="text" name="location"  required />
  </p>
   <p><label><span>*</span>Address :</label>
  <input type="text" name="address"  required />
  </p>
  <p><label><span>*</span>City :</label>
  <input type="text" name="city"  required />
  </p>
  <p><label><span>*</span>State :</label>
  <input type="text" name="state"  required />
  </p>
  <p><label><span>*</span>Postal Code :</label>
  <input type="text" name="zip"  required />
  </p>
 
     
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>