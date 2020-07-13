<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
  if($_FILES['image']['name']!='')
  {
	$folder='provider/';
	$time= time();
	$con=	$folder.$time.$_FILES['image']['name'];
	$file = $time.$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $con);
	$ongoing_query = "update `dental3_provider` set `title`=:title,bio=:bio,cat_id=:cat_id,page=:page,image=:image where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "title"=>$_REQUEST["title"],
           "bio"=>$_REQUEST["bio"],
            "cat_id"=>$_REQUEST["cat_id"],
            "page"=>$_REQUEST["page"],
            "image" =>$file,
            "id"=>$_REQUEST['id']
            ));
      }
      else
      {
        $ongoing_query = "update `dental3_provider` set `title`=:title,bio=:bio,cat_id=:cat_id,page=:page where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "title"=>$_REQUEST["title"],
           "bio"=>$_REQUEST["bio"],
            "cat_id"=>$_REQUEST["cat_id"],
            "page"=>$_REQUEST["page"],
            
            "id"=>$_REQUEST['id']
            ));
     
      }
}

?>
<?php
 $query_device = "select * from `dental3_provider` where id=:id order by id desc";

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
  <input type="text" name="title" value="<?php echo $provider->title;?>" required />
  </p>
    <p><label><span></span>Bio :</label>
<textarea name="bio"><?php echo $provider->bio;?></textarea> 
  </p>  
  <p><label><span>*</span>Designation :</label>
  	<select name="cat_id">
  	<?php
  	 $query_device = "select * from `dental3_category`";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $cat)
    {
    	?>
    	<option value="<?php echo $cat->id;?>" <?php if($provider->cat_id==$cat->id) echo 'selected="selected"';?>><?php echo $cat->title;?></option>
    	<?php
    }
    ?>
<select>
	  </p>  
<p class="radioSet"><label>Show on Home Page :</label>
  <input type="radio" name="page" value=1 <?php if($provider->page==1) echo 'checked="checked"';?>/> Yes 
  <input type="radio" name="page" value=0 <?php if($provider->page==0) echo 'checked="checked"';?>/> No 
  </p>
  <p><label><span>*</span>Image :</label>
 <input type="file" name="image" />
 
   </p>
<img src="provider/<?php echo $provider->image;?>"/>
            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>