<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "update `dental3_user` set `fullname`=:fullname,email=:email,phone=:phone,total_coverage=:total_coverage where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "fullname"=>$_REQUEST["fullname"],
           "email"=>$_REQUEST["email"],
            "phone"=>$_REQUEST["phone"],
            "total_coverage"=>$_REQUEST["total_coverage"],
            
            "id"=>$_REQUEST['id']
            ));
     
      
}

?>
<?php
 $query_device = "select * from `dental3_user` where id=:id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $provider = $statement_device->fetch();
    
      
?>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Name :</label>
  <input type="text" name="fullname" value="<?php echo $provider->fullname;?>" required />
  </p>
  
  <p><label><span>*</span>Email :</label>
  <input type="text" name="email" value="<?php echo $provider->email;?>" required />
  </p>
  <p><label><span>*</span>Phone :</label>
  <input type="text" name="phone" value="<?php echo $provider->phone;?>" required />
  </p>
  <p><label>Total Coverage :</label>
  <input type="text" name="total_coverage" value="<?php echo $provider->total_coverage;?>" />
  </p>
       
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>