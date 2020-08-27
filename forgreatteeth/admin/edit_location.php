<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "update `dentalfor_location` set `location`=:location,address=:address,city=:city,state=:state,zip=:zip where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "location"=>$_REQUEST["location"],
           "address"=>$_REQUEST['address'],
            "city"=>$_REQUEST['city'],
 "state"=>$_REQUEST['state'],
 "zip"=>$_REQUEST['zip'],
           
            
            "id"=>$_REQUEST['id']
            ));
     
      
}

?>
<?php
 $query_device = "select * from `dentalfor_location` where id=:id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $provider = $statement_device->fetch();
    
      
?>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Location :</label>
  <input type="text" name="location" value="<?php echo $provider->location;?>" required />
  </p>
  
     <p><label><span>*</span>Address :</label>
  <input type="text" name="address" value="<?php echo $provider->address;?>" required />
  </p>
  <p><label><span>*</span>City :</label>
  <input type="text" name="city" value="<?php echo $provider->city;?>" required />
  </p>
  <p><label><span>*</span>State :</label>
  <input type="text" name="state" value="<?php echo $provider->state;?>" required />
  </p>
  <p><label><span>*</span>Postal Code :</label>
  <input type="text" name="zip" value="<?php echo $provider->zip;?>" required />
  </p>
 
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>