<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
	
	$ongoing_query = "Insert into `dental_question` set `question`=:question,cat_id=:cat_id,answer1=:answer1,answer2=:answer2,answer3=:answer3,answer4=:answer4";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "question"=>$_REQUEST["question"],
            "answer1"=>$_REQUEST["answer1"],
             "answer2"=>$_REQUEST["answer2"],
              "answer3"=>$_REQUEST["answer3"],
               "answer4"=>$_REQUEST["answer4"],
          
            "cat_id"=>$_REQUEST["cat_id"]
            
            ));
}
?>

 <div class="height50"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">

<div class="shedule-form">
  <p><label><span>*</span>Question :</label>
  <input type="text" name="question"  />
  </p>
    
  <p><label><span>*</span>Category :</label>
  	<select name="cat_id">
  	<option value="1">New User</option>
    <option value="2">Covid-19</option>
<select>
	
  </p>  

<p><label><span>*</span>Answer 1 :</label>
<textarea name="answer1"></textarea> 
  </p>  
  <p><label><span>*</span>Answer 2 :</label>
<textarea name="answer2"></textarea> 
  </p>  
  <p><label><span>*</span>Answer 3 :</label>
<textarea name="answer3"></textarea> 
  </p>  
  <p><label><span>*</span>Answer 4 :</label>
<textarea name="answer4"></textarea> 
  </p>  
            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>