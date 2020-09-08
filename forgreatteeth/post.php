<?php
//header('Content-type: application/json');
//error_reporting( E_ERROR );
/*ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); */

//ob_start();

include "config.php";
$uri = str_replace('post.php','',$_SERVER['REQUEST_URI']);
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $uri;


$site = $url.'admin/';
$site1 = $url.'image/';



//include "config_mysql.php";

/*$acceptParameter = fopen('php://input','r');
$jsonInput = fgets($acceptParameter);
$event_encoded = json_decode($jsonInput, true);*/

$event_encoded = json_decode(file_get_contents('php://input'),true);


$ip_address=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
date_default_timezone_set($addrDetailsArr['geoplugin_timezone']);

if($event_encoded == null || $event_encoded == '') {
    $event_encoded = $HTTP_RAW_POST_DATA;
}

if($event_encoded == null || $event_encoded == '') {
    $event_encoded = $_REQUEST;
}

//file_put_contents("testinput.php", print_r($event_encoded));

//print_r($event_encoded);

$current_date = date("Y-m-d H:i:s");


if($event_encoded["actiontype"] == "change_password")
{
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
     $sel_user_query1 = "SELECT * FROM dentalfor_user WHERE id = :id AND password=:password";

      $statement1 = $pdo->prepare($sel_user_query1);
     $statement1->execute(array(
          "id" => $event_encoded["user_id"],
          "password"=> md5($salt.$event_encoded["old_password"])
          ));
      
    $num_rows=$statement1->rowCount();

   
   
    
    if($num_rows>0){

      $sel_user_query1 = "Update dentalfor_user set password=:password WHERE id = :id";

      $statement1 = $pdo->prepare($sel_user_query1);
     $statement1->execute(array(
          "id" => $event_encoded["user_id"],
          "password"=> md5($salt.$event_encoded["new_password"])
          ));
      
              $parent["status"]="yes";
            }
            else
            {
              $parent["status"]="no";
            }
          }
          else
          {
            $parent['token']='no';
          }
        
}


else if($event_encoded["actiontype"] == "settings") {
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
    $parent['token']='yes';
    $ongoing_query = "Update `dentalfor_user` set `profile_pic`=:profile_pic,`total_coverage`=:total_coverage,`phone`=:phone,`fullname`=:fullname where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
      "profile_pic" => $event_encoded["profile_pic"],
      "total_coverage" => $event_encoded["total_coverage"],
      "phone" => base64_encode($salt.$event_encoded["phone"]),
       "fullname" => base64_encode($salt.$event_encoded["fullname"]),
            "id" => $event_encoded["user_id"]
            ));
         
         $meal['profile_pic'] = $event_encoded["profile_pic"];
         $meal['total_coverage'] = $event_encoded["total_coverage"];
         $meal['phone'] = $event_encoded["phone"];
          $meal['fullname'] = $event_encoded["fullname"];
          $meal['id'] = $event_encoded["user_id"];
            
            $parent["status"]="yes";
          }
          else
          {
            $parenr['token']='no';
          }
}

 else if($event_encoded["actiontype"] == "get_review") {
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
$parent['token']='yes';
  $ongoing_query = "SELECT * from dentalfor_review where provider_id=:provider_id and approve=1 order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
            "provider_id" =>$event_encoded['provider_id']
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';

      $ongoing_query1 = "SELECT avg(`rating`) as `rating` from dentalfor_review where  provider_id=:provider_id and approve=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $result2 = $statement1->fetch();
$parent['avg_rating'] = $result2->rating;
$parent['rating_count'] = $num_rows;

$ongoing_query1 = "SELECT * from dentalfor_review where  provider_id=:provider_id and rating>1 and rating<2 and approve=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count1'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dentalfor_review where  provider_id=:provider_id and rating>2 and rating<3 and approve=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count2'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dentalfor_review where  provider_id=:provider_id and rating>3 and rating<4 and approve=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count3'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dentalfor_review where  provider_id=:provider_id and rating>4 and rating<5 and approve=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count4'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dentalfor_review where  provider_id=:provider_id and rating=5 and approve=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count5'] = $rating_count1;
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          $ongoing_query1 = "SELECT * from dentalfor_user where  id=:id order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->user_id
         
           
           
            ));
        $result1 = $statement1->fetch();
          
          $meal[$i]['review']=$result->review;
          $meal[$i]['rating']=$result->rating;
          $meal[$i]['name']=str_replace($salt,'',base64_decode($result1->fullname));
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
else if($event_encoded["actiontype"] == "add_review") {
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
	$parent['token']='yes';
	$ongoing_query = "SELECT * from dentalfor_review where provider_id=:provider_id and user_id=:user_id";


       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array( "user_id" =>$event_encoded['user_id'],

         "provider_id" =>$event_encoded['provider_id']
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
    	$parent['status'] = "no";
    }
    else
    {
	  $ongoing_query = "Insert into `dentalfor_review` set `provider_id`=:provider_id,`rating`=:rating,review=:review,user_id=:user_id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "provider_id" => $event_encoded["provider_id"],
            "rating" =>  $event_encoded["rating"],
            "review" =>  $event_encoded["review"],
            "user_id" => $event_encoded["user_id"]
            ));  
            
    
   $parent['status'] = "yes";
}
}
else
{
  $parent['token']='no';
}
}
else if($event_encoded["actiontype"] == "add_referral") {
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
  
  $parent['token']='yes';
    $ongoing_query = "Insert into `dentalfor_referral` set `email`=:email,`message`=:message,name=:name,user_id=:user_id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "email" => $event_encoded["email"],
            "message" =>  $event_encoded["message"],
            "name" =>  $event_encoded["name"],
            "user_id" => $event_encoded["user_id"]
            ));  
            
      $to = "senjuti.micronixsystem@gmail.com";
$subject = "App Referral";

$body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>";
$body .="<p>Hello ".$event_encoded["name"].",</p>

<p>Hey friend, please accept my invitation to download the Dentistry @Cooksville app. Dentistry @Cooksville offers general and family dental services under one roof. By using their mobile app, you can book appointment on the go. Their mobile app has many other features, which I think you might be interested in.</p>";

$body .="</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Dentistry At Cooksville<chandradip.ghosh@gmail.com>' . "\r\n";


mail($to,$subject,$body,$headers);

$meal['name'] = $event_encoded["name"];
         $meal['message'] = $event_encoded["message"];
         $meal['email'] = $event_encoded["email"];


   $parent['status'] = "yes";
 }
 else
 {
  $parent['token']='no';
 }

}
else if($event_encoded["actiontype"] == "questionnaire") {
	$question_id = implode(',',json_decode($event_encoded["question_id"]));
	$answer = implode(',',json_decode($event_encoded["answer_id"]));
	  $ongoing_query = "Insert into `dentalfor_questionnaire` set `cat_id`=:cat_id,`question_id`=:question_id,answer=:answer,user_id=:user_id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "cat_id" => $event_encoded["cat_id"],
            "question_id" => $question_id,
            "answer" => $answer,
            "user_id" => $event_encoded["user_id"]
            ));  
            
    
   $parent['status'] = "yes";
}
else if($event_encoded["actiontype"] == "patient_screening_form") {
$ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
    $ongoing_query = "Insert into `dentalfor_patient_screening_form` set `name`=:name,`age`=:age,email=:email,phone=:phone,other=:other,staff=:staff,appointment_id=:appointment_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,answered=:answered";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "name" => base64_encode($salt.$event_encoded["name"]),
            "age" => base64_encode($salt.$event_encoded["age"]),
            "email" => base64_encode($salt.$event_encoded["email"]),
            "appointment_id" => $event_encoded["appointment_id"],
            "phone" => base64_encode($salt.$event_encoded["phone"]),
            "other" => base64_encode($salt.$event_encoded["other"]),
            "staff" => base64_encode($salt.$event_encoded["staff"]),
            "question1" => base64_encode($salt.$event_encoded["question1"]),
            "question2" => base64_encode($salt.$event_encoded["question2"]),
            "question3" => base64_encode($salt.$event_encoded["question3"]),
            "question4" => base64_encode($salt.$event_encoded["question4"]),
            "question5" => base64_encode($salt.$event_encoded["question5"]),
            "question6" => base64_encode($salt.$event_encoded["question6"]),

            "question7" => base64_encode($salt.$event_encoded["question7"]),
            "question8" => base64_encode($salt.$event_encoded["question8"]),
            

            "answered" => base64_encode($salt.$event_encoded["answered"])
            ));  
            
                
        $meal['name'] = $event_encoded["name"];
         $meal['age'] = $event_encoded["age"];
         $meal['email'] = $event_encoded["email"];
          $meal['user_id'] = $event_encoded["user_id"];
         $meal['phone'] = $event_encoded["phone"];
         $meal['other'] = $event_encoded["other"];
         $meal['staff'] = $event_encoded["staff"];
         $meal['question1'] = $event_encoded["question1"];
           $meal['question2'] = $event_encoded["question2"];
         $meal['question3'] = $event_encoded["question3"];
         $meal['question4'] = $event_encoded["question4"];
           $meal['question5'] = $event_encoded["question5"];
         $meal['question6'] = $event_encoded["question6"];
         $meal['question7'] = $event_encoded["question7"];
           $meal['question8'] = $event_encoded["question8"];
         
         $meal['answered'] = $event_encoded["answered"];
        
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }
  else if($event_encoded["actiontype"] == "user_screening_form") {
$ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
    $ongoing_query = "Insert into `dentalfor_user_screening_form` set `name`=:name,`age`=:age,email=:email,phone=:phone,other=:other,staff=:staff,user_id=:user_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,answered=:answered";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "name" => base64_encode($salt.$event_encoded["name"]),
            "age" => base64_encode($salt.$event_encoded["age"]),
            "email" => base64_encode($salt.$event_encoded["email"]),
            "user_id" => $event_encoded["user_id"],
            "phone" => base64_encode($salt.$event_encoded["phone"]),
            "other" => base64_encode($salt.$event_encoded["other"]),
            "staff" => base64_encode($salt.$event_encoded["staff"]),
            "question1" => base64_encode($salt.$event_encoded["question1"]),
            "question2" => base64_encode($salt.$event_encoded["question2"]),
            "question3" => base64_encode($salt.$event_encoded["question3"]),
            "question4" => base64_encode($salt.$event_encoded["question4"]),
            "question5" => base64_encode($salt.$event_encoded["question5"]),
            "question6" => base64_encode($salt.$event_encoded["question6"]),

            "question7" => base64_encode($salt.$event_encoded["question7"]),
            "question8" => base64_encode($salt.$event_encoded["question8"]),
            

            "answered" => base64_encode($salt.$event_encoded["answered"])
            ));  
            
                
        $meal['name'] = $event_encoded["name"];
         $meal['age'] = $event_encoded["age"];
         $meal['email'] = $event_encoded["email"];
          $meal['user_id'] = $event_encoded["user_id"];
         $meal['phone'] = $event_encoded["phone"];
         $meal['other'] = $event_encoded["other"];
         $meal['staff'] = $event_encoded["staff"];
         $meal['question1'] = $event_encoded["question1"];
           $meal['question2'] = $event_encoded["question2"];
         $meal['question3'] = $event_encoded["question3"];
         $meal['question4'] = $event_encoded["question4"];
           $meal['question5'] = $event_encoded["question5"];
         $meal['question6'] = $event_encoded["question6"];
         $meal['question7'] = $event_encoded["question7"];
           $meal['question8'] = $event_encoded["question8"];
         
         $meal['answered'] = $event_encoded["answered"];
        
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }
  else if($event_encoded["actiontype"] == "patient_acknowledge_form") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
$parent['token']='yes';
    $ongoing_query = "Insert into `dentalfor_patient_acknowledge_form` set user_id=:user_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,question9=:question9,question10=:question10,question11=:question11";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
          
            "user_id" => $event_encoded["appointment_id"],
            
            "question1" => base64_encode($salt.$event_encoded["question1"]),
            "question2" => base64_encode($salt.$event_encoded["question2"]),
            "question3" => base64_encode($salt.$event_encoded["question3"]),
            "question4" => base64_encode($salt.$event_encoded["question4"]),
            "question5" => base64_encode($salt.$event_encoded["question5"]),
            "question6" => base64_encode($salt.$event_encoded["question6"]),

            "question7" => base64_encode($salt.$event_encoded["question7"]),
            "question8" => base64_encode($salt.$event_encoded["question8"]),
            "question9" => base64_encode($salt.$event_encoded["question9"]),
            "question10" => base64_encode($salt.$event_encoded["question10"]),
            "question11" => base64_encode($salt.$event_encoded["question11"])
            ));  
            
                
          $meal['user_id'] = $event_encoded["user_id"];
         $meal['question1'] = $event_encoded["question1"];
           $meal['question2'] = $event_encoded["question2"];
         $meal['question3'] = $event_encoded["question3"];
         $meal['question4'] = $event_encoded["question4"];
           $meal['question5'] = $event_encoded["question5"];
         $meal['question6'] = $event_encoded["question6"];
         $meal['question7'] = $event_encoded["question7"];
           $meal['question8'] = $event_encoded["question8"];
         
         $meal['question9'] = $event_encoded["question9"];
          $meal['question10'] = $event_encoded["question10"];
          $meal['question11'] = $event_encoded["question11"];
        
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }
else if($event_encoded["actiontype"] == "dental_history_form") {
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';

    $ongoing_query = "Insert into `dentalfor_history_form` set appointment_id=:appointment_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,question9=:question9,question10=:question10,question11=:question11,question12=:question12,question13=:question13,question14=:question14,question15=:question15,question16=:question16,questiond1=:questiond1,questiond2=:questiond2,questiond3=:questiond3,questiond4=:questiond4,questiond5=:questiond5,questiond6=:questiond6,questiond7=:questiond7,questiond8=:questiond8,questiond9=:questiond9,questiond10=:questiond10,questiond11=:questiond11,questiond12=:questiond12,questiond13=:questiond13,questiond14=:questiond14,questiond15=:questiond15,questiond16=:questiond16,questiond17=:questiond17,questiond18=:questiond18,salutation=:salutation,fname=:fname,lname=:lname,home_phone=:home_phone,work_phone=:work_phone,email=:email,dob=:dob,gender=:gender,notify=:notify,notify_name=:notify_name,notify_email=:notify_email,notify_phone=:notify_phone,notify_relation=:notify_relation,primary_name=:primary_name,primary_dob=:primary_dob,primary_realtion=:primary_realtion,primary_other=:primary_other,primary_id=:primary_id,primary_company=:primary_company,primary_policy=:primary_policy,primary_sector=:primary_sector,primary_familiar=:primary_familiar,secondary_name=:secondary_name,secondary_dob=:secondary_dob,secondary_realtion=:secondary_realtion,secondary_other=:secondary_other,secondary_id=:secondary_id,secondary_company=:secondary_company,secondary_policy=:secondary_policy,secondary_sector=:secondary_sector,secondary_familiar=:secondary_familiar,initial=:initial,dt=:dt";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
          
            "appointment_id" => $event_encoded["appointment_id"],
            
            "question1" => base64_encode($salt.$event_encoded["question1"]),
            "question2" => base64_encode($salt.$event_encoded["question2"]),
            "question3" => base64_encode($salt.$event_encoded["question3"]),
            "question4" => base64_encode($salt.$event_encoded["question4"]),
            "question5" => base64_encode($salt.$event_encoded["question5"]),
            "question6" => base64_encode($salt.$event_encoded["question6"]),

            "question7" => base64_encode($salt.$event_encoded["question7"]),
            "question8" => base64_encode($salt.$event_encoded["question8"]),
            "question9" => base64_encode($salt.$event_encoded["question9"]),
            "question10" => base64_encode($salt.$event_encoded["question10"]),
             "question11" => base64_encode($salt.$event_encoded["question11"]),
            "question12" => base64_encode($salt.$event_encoded["question12"]),
            "question13" => base64_encode($salt.$event_encoded["question13"]),
            "question14" => base64_encode($salt.$event_encoded["question14"]),
            "question15" => base64_encode($salt.$event_encoded["question15"]),
            "question16" => base64_encode($salt.$event_encoded["question16"]),

            "questiond1" => base64_encode($salt.$event_encoded["questiond1"]),
            "questiond2" => base64_encode($salt.$event_encoded["questiond2"]),
            "questiond3" => base64_encode($salt.$event_encoded["questiond3"]),
            "questiond4" => base64_encode($salt.$event_encoded["questiond4"]),
            "questiond5" => base64_encode($salt.$event_encoded["questiond5"]),
            "questiond6" => base64_encode($salt.$event_encoded["questiond6"]),
            "questiond7" => base64_encode($salt.$event_encoded["questiond7"]),
            "questiond8" => base64_encode($salt.$event_encoded["questiond8"]),
            "questiond9" => base64_encode($salt.$event_encoded["questiond9"]),
            "questiond10" => base64_encode($salt.$event_encoded["questiond10"]),
            "questiond11" => base64_encode($salt.$event_encoded["questiond11"]),
            "questiond12" => base64_encode($salt.$event_encoded["questiond12"]),
            "questiond13" => base64_encode($salt.$event_encoded["questiond13"]),
            "questiond14" => base64_encode($salt.$event_encoded["questiond14"]),
            "questiond15" => base64_encode($salt.$event_encoded["questiond15"]),
            "questiond16" => base64_encode($salt.$event_encoded["questiond16"]),
            "questiond17" => base64_encode($salt.$event_encoded["questiond17"]),
            "questiond18" => base64_encode($salt.$event_encoded["questiond18"]),
            "salutation" => base64_encode($salt.$event_encoded["salutation"]),
            "fname" => base64_encode($salt.$event_encoded["fname"]),
            "lname" => base64_encode($salt.$event_encoded["lname"]),
            "home_phone" => base64_encode($salt.$event_encoded["home_phone"]),
            "work_phone" => base64_encode($salt.$event_encoded["work_phone"]),
            "email" => base64_encode($salt.$event_encoded["email"]),
            "dob" => base64_encode($salt.$event_encoded["dob"]),
            "gender" => base64_encode($salt.$event_encoded["gender"]),
            "notify" => base64_encode($salt.$event_encoded["notify"]),
            "notify_name" => base64_encode($salt.$event_encoded["notify_name"]),
            "notify_email" => base64_encode($salt.$event_encoded["notify_email"]),
            "notify_phone" => base64_encode($salt.$event_encoded["notify_phone"]),
            "notify_relation" => base64_encode($salt.$event_encoded["notify_relation"]),
            "primary_name" => base64_encode($salt.$event_encoded["primary_name"]),
            "primary_dob" => base64_encode($salt.$event_encoded["primary_dob"]),
            "primary_realtion" => base64_encode($salt.$event_encoded["primary_realtion"]),
            "primary_other" => base64_encode($salt.$event_encoded["primary_other"]),
            "primary_id" => base64_encode($salt.$event_encoded["primary_id"]),
            "primary_company" => base64_encode($salt.$event_encoded["primary_company"]),
            "primary_policy" => base64_encode($salt.$event_encoded["primary_policy"]),
            "primary_sector" => base64_encode($salt.$event_encoded["primary_sector"]),
            "primary_familiar" => base64_encode($salt.$event_encoded["primary_familiar"]),
            "secondary_name" => base64_encode($salt.$event_encoded["secondary_name"]),
            "secondary_dob" => base64_encode($salt.$event_encoded["secondary_dob"]),
            "secondary_realtion" => base64_encode($salt.$event_encoded["secondary_realtion"]),
            "secondary_other" => base64_encode($salt.$event_encoded["secondary_other"]),
            "secondary_id" => base64_encode($salt.$event_encoded["secondary_id"]),
            "secondary_policy" => base64_encode($salt.$event_encoded["secondary_policy"]),
            "secondary_sector" => base64_encode($salt.$event_encoded["secondary_sector"]),
            "secondary_familiar" => base64_encode($salt.$event_encoded["secondary_familiar"]),
            "secondary_company" => base64_encode($salt.$event_encoded["secondary_company"]),
            "initial" => base64_encode($salt.$event_encoded["initial"]),
            "dt" => base64_encode($salt.$event_encoded["dt"])

            ));  
            
                
          $meal['user_id'] = $event_encoded["user_id"];
         $meal['question1'] = $event_encoded["question1"];
           $meal['question2'] = $event_encoded["question2"];
         $meal['question3'] = $event_encoded["question3"];
         $meal['question4'] = $event_encoded["question4"];
           $meal['question5'] = $event_encoded["question5"];
         $meal['question6'] = $event_encoded["question6"];
         $meal['question7'] = $event_encoded["question7"];
           $meal['question8'] = $event_encoded["question8"];
         
         $meal['question9'] = $event_encoded["question9"];
          $meal['question10'] = $event_encoded["question10"];
        
                  $meal['question11'] = $event_encoded["question1"];
           $meal['question12'] = $event_encoded["question12"];
         $meal['question13'] = $event_encoded["question13"];
         $meal['question14'] = $event_encoded["question14"];
           $meal['question15'] = $event_encoded["question15"];
         $meal['question16'] = $event_encoded["question16"];
         $meal['questiond1'] = $event_encoded["questiond1"];
           $meal['questiond2'] = $event_encoded["questiond2"];
         
         $meal['questiond3'] = $event_encoded["questiond3"];
          $meal['questiond4'] = $event_encoded["questiond4"];
          $meal['questiond5'] = $event_encoded["questiond5"];
           $meal['questiond6'] = $event_encoded["questiond6"];
         
         $meal['questiond7'] = $event_encoded["questiond7"];
          $meal['questiond8'] = $event_encoded["questiond8"];
          $meal['questiond9'] = $event_encoded["questiond9"];
           $meal['questiond10'] = $event_encoded["questiond10"];
         
         $meal['questiond11'] = $event_encoded["questiond11"];
          $meal['questiond12'] = $event_encoded["questiond12"];
          $meal['questiond13'] = $event_encoded["questiond13"];
           $meal['questiond14'] = $event_encoded["questiond14"];
         
         $meal['questiond15'] = $event_encoded["questiond15"];
          $meal['questiond16'] = $event_encoded["questiond16"];
          $meal['questiond17'] = $event_encoded["questiond17"];
           $meal['questiond18'] = $event_encoded["questiond18"];
         
         $meal['salutation'] = $event_encoded["salutation"];
          $meal['fname'] = $event_encoded["fname"];
           $meal['lname'] = $event_encoded["lname"];
          $meal['home_phone'] = $event_encoded["home_phone"];
           $meal['work_phone'] = $event_encoded["work_phone"];
          $meal['email'] = $event_encoded["email"];
           $meal['dob'] = $event_encoded["dob"];
          $meal['gender'] = $event_encoded["gender"];
           $meal['notify'] = $event_encoded["notify"];
          $meal['notify_name'] = $event_encoded["notify_name"];
           $meal['notify_email'] = $event_encoded["notify_email"];
          $meal['notify_phone'] = $event_encoded["notify_phone"];
           $meal['notify_relation'] = $event_encoded["notify_relation"];
          $meal['primary_name'] = $event_encoded["primary_name"];
           $meal['primary_dob'] = $event_encoded["primary_dob"];
          $meal['primary_realtion'] = $event_encoded["primary_realtion"];
           $meal['primary_other'] = $event_encoded["primary_other"];
          $meal['primary_id'] = $event_encoded["primary_id"];
           $meal['primary_company'] = $event_encoded["primary_company"];
          $meal['primary_policy'] = $event_encoded["primary_policy"];
           $meal['primary_sector'] = $event_encoded["primary_sector"];
          $meal['primary_familiar'] = $event_encoded["primary_familiar"];
           $meal['secondary_name'] = $event_encoded["secondary_name"];
          $meal['secondary_dob'] = $event_encoded["secondary_dob"];
           $meal['secondary_realtion'] = $event_encoded["secondary_realtion"];
          $meal['secondary_other'] = $event_encoded["secondary_other"];
           $meal['secondary_id'] = $event_encoded["secondary_id"];
          $meal['secondary_company'] = $event_encoded["secondary_company"];
           $meal['secondary_policy'] = $event_encoded["secondary_policy"];
          $meal['secondary_sector'] = $event_encoded["secondary_sector"];
           $meal['secondary_familiar'] = $event_encoded["secondary_familiar"];
        
           $meal['initial'] = $event_encoded["initial"];
          $meal['dt'] = $event_encoded["dt"];
           $meal['appointment_id'] = $event_encoded["appointment_id"];



          /*   $to = "senjuti.micronixsystem@gmail.com";
$subject = "Dental History Form";

$body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>";
$body .="<p>Hi,</p>

<p>The following user has submitted the detal hitsory form. The details are as follows:</p>

<p><b>Personal Details</b></p>

<p>Salutation : ".$event_encoded["salutation"]."</p>
<p>First Name : ".$event_encoded["fname"]."</p>
<p>Last Name : ".$event_encoded["lname"]."</p>
<p>Home Phone : ".$event_encoded["home_phone"]."</p>
<p>Work Phone : ".$event_encoded["work_phone"]."</p>
<p>Email : ".$event_encoded["email"]."</p>
<p>Date of Birth : ".$event_encoded["dob"]."</p>
<p>Gender : ".$event_encoded["gender"]."</p>

<p><b>Emergency Contact </b></p>


<p>In case of emergency notify : ".$event_encoded["notify"]."</p>
<p>Contact Name : ".$event_encoded["notify_name"]."</p>
<p>Phone : ".$event_encoded["notify_phone"]."</p>
<p>Email : ".$event_encoded["notify_email"]."</p>
<p>Relation : ".$event_encoded["notify_relation"]."</p>


<p><b>Primary Insurance</b></p>

<p>Subscriber Name : ".$event_encoded["primary_name"]."</p>
<p>Date of Birth : ".$event_encoded["primary_dob"]."</p>
<p>Relation : ".$event_encoded["primary_realtion"]."</p>
<p>Write Relationship : ".$event_encoded["primary_other"]."</p>
<p>Subscriber ID : ".$event_encoded["primary_id"]."</p>
<p>Insurance Company : ".$event_encoded["primary_company"]."</p>
<p>Policy/Plan : ".$event_encoded["primary_policy"]."</p>
<p>Division/Sector : ".$event_encoded["primary_sector"]."</p>
<p>Are You Familiar with Your Plan Details? : ".$event_encoded["primary_familiar"]."<p>





<p><b>Secondary Insurance</b></p>

<p>Subscriber Name : ".$event_encoded["secondary_name"]."</p>
<p>Date of Birth : ".$event_encoded["secondary_dob"]."</p>
<p>Relation : ".$event_encoded["secondary_realtion"]."</p>
<p>Write Relationship : ".$event_encoded["secondary_other"]."</p>
<p>Subscriber ID : ".$event_encoded["secondary_id"]."</p>
<p>Insurance Company : ".$event_encoded["secondary_company"]."</p>
<p>Policy/Plan : ".$event_encoded["secondary_policy"]."</p>
<p>Division/Sector : ".$event_encoded["secondary_sector"]."</p>
<p>Are You Familiar with Your Plan Details? : ".$event_encoded["secondary_familiar"]."<p>


<p><b>Medical History</b></p>

<p>1. Have you ever had a serious illness requiring hospitalization or extensive medical care? : ".$event_encoded["question1"]."</p>
<p>2. Are you presently under the care of a physician? : ".$event_encoded["question2"]."</p>
<p>3. Have you had a medical examination in the last year? : ".$event_encoded["question3"]."</p>
<p>4. Do you use any prescription or non-prescription drugs regularly? : ".$event_encoded["question4"]."</p>
<p>5. Do you have any allergic conditions: e.g. hay fever, skin rash, food allergies, metal, latex? : ".$event_encoded["question5"]."</p>
<p>6. Do any allergic reactions result in headaches, shortness of breath, chest constriction, nausea?  : ".$event_encoded["question6"]."</p>
<p>7. Have you been hospitalized in the last 5 years?  : ".$event_encoded["question7"]."</p>
<p>8. Have you been warned against taking any drug or medication? : ".$event_encoded["question8"]."</p>
<p>9. Do you bruise easily or bleed abnormally? : ".$event_encoded["question9"]."<p>
<p>10. Do you require pre-medication for dental treatment? : ".$event_encoded["question10"]."</p>
<p>11. Have you ever had any organ implants or medical implants?   : ".$event_encoded["question11"]."</p>
<p>12. Have you ever fainted? : ".$event_encoded["question12"]."</p>
<p>13. Do your ankle swell? : ".$event_encoded["question13"]."</p>
<p>14. Do you experience shortness of breath or chest pain when taking a walk or climbing stairs?  : ".$event_encoded["question14"]."</p>
<p>15. Do you have frequent headaches? : ".$event_encoded["question15"]."</p>
<p>16. Do you have A.I.D.S. or have you ever tested positive for HIV.?  : ".$event_encoded["question16"]."</p>

<p><b>Dental History</b></p>

<p>1. Reason for today's visit : ".$event_encoded["questiond1"]."</p>
<p>2. How frequently do you see your dentist? : ".$event_encoded["questiond2"]."</p>
<p>3. How often do you brush your teeth? : ".$event_encoded["questiond3"]."</p>
<p>4. Do your gums bleed easily? : ".$event_encoded["questiond4"]."</p>
<p>5. Are your teeth sensitive to : ".$event_encoded["questiond5"]."</p>
<p>6. Do you feel you have bad breath at times?  : ".$event_encoded["questiond6"]."</p>
<p>7. Have you ever had jaw joint surgery?  : ".$event_encoded["questiond7"]."</p>
<p>8. Do you have pain in your jaw joints or suffer from migraine headaches? : ".$event_encoded["questiond8"]."</p>
<p>9. Does any part of your mouth hurt when clenched? : ".$event_encoded["questiond9"]."<p>
<p>10. Does your jaw crack or pop when opened widely? : ".$event_encoded["questiond10"]."</p>
<p>11. Have you had Braces or Oral surgery or Gum treatment or Root canal?   : ".$event_encoded["questiond11"]."</p>
<p>12. Do you grind or clench your teeth during the day or night?  : ".$event_encoded["questiond12"]."</p>
<p>13. Do you smoke? Number per day: : ".$event_encoded["questiond13"]."</p>
<p>14. Do you or does any family member have a problem with snoring?  : ".$event_encoded["questiond14"]."</p>
<p>15. Have you ever experienced any growths or sore spots in your mouth? If so, where?  : ".$event_encoded["questiond15"]."</p>
<p>16. Previous problems with dental treatment?  : ".$event_encoded["questiond16"]."</p>
<p>17. Are you satisfied with the appearance of your teeth? : ".$event_encoded["questiond17"]."</p>
<p> 18. Other Dental Concerns : ".$event_encoded["questiond18"]."</p>
";

$body .="</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Dentistry At Cooksville <senjuti.r@gmail.com>' . "\r\n";


mail($to,$subject,$body,$headers);*/

        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }

 
  else if($event_encoded["actiontype"] == "checkin_status") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
$parent['token']='yes';
              $ongoing_query = "Insert into `dentalfor_checkin_status` set `appointment_id`=:appointment_id,`checkin_status`=:checkin_status,checkin_note=:checkin_note";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "appointment_id" => $event_encoded["appointment_id"],
            "checkin_status" => $event_encoded["checkin_status"],
            "checkin_note" => $event_encoded["checkin_note"]
            ));  
            
                
        $meal['appointment_id'] = $event_encoded["appointment_id"];
         $meal['checkin_status'] = $event_encoded["checkin_status"];
         $meal['checkin_note'] = $event_encoded["checkin_note"];
          
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }

else if($event_encoded["actiontype"] == "create_appointment") {
  $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';

              $ongoing_query = "Insert into `dentalfor_appointment` set `appointment_type`=:appointment_type,`provider_id`=:provider_id,note=:note,appointment_time=:appointment_time,appointment_date=:appointment_date,status='In Progress',user_id=:user_id,appointment=:appointment,scheduled_time=:scheduled_time,new_user=:new_user,office=:office";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "appointment_type" => $event_encoded["appointment_type"],
            "provider_id" => $event_encoded["provider_id"],
            "note" => $event_encoded["note"],
            "user_id" => $event_encoded["user_id"],
            "appointment_time" => $event_encoded["appointment_time"],
            "office" => $event_encoded["office"],
            "appointment" => $event_encoded["appointment"],
            "appointment_date" => $event_encoded["appointment_date"],
            "scheduled_time" =>'',
            "new_user"=>0
            ));  
            
                
        $meal['appointment_type'] = $event_encoded["appointment_type"];
         $meal['provider_id'] = $event_encoded["provider_id"];
         $meal['note'] = $event_encoded["note"];
          $meal['user_id'] = $event_encoded["user_id"];
         $meal['appointment_time'] = $event_encoded["appointment_time"];
         $meal['office'] = $event_encoded["office"];
         $meal['appointment'] = $event_encoded["appointment"];
         $meal['appointment_date'] = $event_encoded["appointment_date"];
          $meal['appointment_status'] = 'pending';
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }
  else if($event_encoded["actiontype"] == "add_chat") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
$parent['token']='yes';
                       $time= date('Y-m-d h:i:sa');

    $ongoing_query = "Insert into `dentalfor_chat` set `message`=:message,user_id=0,dt=:dt,from_user=:user_id";


    $statement = $pdo->prepare($ongoing_query);

    $statement->execute(array(
     
       "message"=>base64_encode($salt.$event_encoded["message"]),
       
        "user_id" =>$event_encoded["from_user"],
        "dt"=>$time
        ));
            
                
        $meal['message'] = $event_encoded["message"];
         $meal['from_user'] = $event_encoded["from_user"];
         $meal['dt'] = $time;
        
        
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
  }
  else if($event_encoded["actiontype"] == "add_insurance") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
$ongoing_query = "SELECT * from dentalfor_insurance where  user_id=:user_id";


       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array( "user_id" =>$event_encoded['user_id']
           
           
            ));
        
         $num_rows=$statement->rowCount();
         if($num_rows>0)
         {

              $ongoing_query = "Update `dentalfor_insurance` set `insurance_id`=:insurance_id,`dental_amount`=:dental_amount,vision_amount=:vision_amount,total_coverage=:total_coverage where user_id=:user_id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "insurance_id" => $event_encoded["insurance_id"],
            "dental_amount" => $event_encoded["dental_amount"],
            "vision_amount" => $event_encoded["vision_amount"],
            "total_coverage" => $event_encoded["total_coverage"],
            "user_id" => $event_encoded["user_id"]
            
            ));  
            }
            else
            {
               $ongoing_query = "Insert into `dentalfor_insurance` set `insurance_id`=:insurance_id,`dental_amount`=:dental_amount,vision_amount=:vision_amount,user_id=:user_id,total_coverage=:total_coverage";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "insurance_id" => $event_encoded["insurance_id"],
            "dental_amount" => $event_encoded["dental_amount"],
            "vision_amount" => $event_encoded["vision_amount"],
            "total_coverage" => $event_encoded["total_coverage"],
            "user_id" => $event_encoded["user_id"]
            
            ));  
             }   
        $meal['insurance_id'] = $event_encoded["insurance_id"];
         $meal['dental_amount'] = $event_encoded["dental_amount"];
         $meal['vision_amount'] = $event_encoded["vision_amount"];
          $meal['user_id'] = $event_encoded["user_id"];
          $meal['total_coverage'] = $event_encoded["total_coverage"];
        
         
        $parent['status'] = "yes";
      }
      else
      {
        $parent['token']='no';
      }
            
  }
   else if($event_encoded["actiontype"] == "reminder") {

   



  $ongoing_query = "SELECT * from dentalfor_notification where notification_type=:notification_type";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "notification_type"=>$event_encoded["notification_type"]
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='no';
      
        
    }
    else
    {
       $parent['status']='yes';
        $ongoing_query ="Insert into `dentalfor_notification` set `user_id`=:user_id,notification_date=:notification_date,notification_type=:notification_type,message=:message,notification_attr=:status";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "message"=>'You have an appointment tomorrow',
            "notification_date"=>date('Y-m-d h:i:sa'),
           "status"=>'upcoming',
           "user_id"=>$event_encoded["user_id"],
"notification_type"=>$event_encoded["notification_type"]
           
           
            ));
    }
  }
  else if($event_encoded["actiontype"] == "notification") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
  $ongoing_query = "SELECT * from dentalfor_notification where user_id=:user_id order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"]
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['message']=$result->message;
           $meal[$i]['notification_type']='Appointment';
            $meal[$i]['notification_date']=$result->notification_date;
             $meal[$i]['notification_attr']=$result->notification_attr;
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
  else if($event_encoded["actiontype"] == "gallery") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
$parent['token']='yes';
  $ongoing_query = "SELECT * from dentalfor_gallery order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['title']=$result->title;
          $meal[$i]['image']=$site.'provider/'.$result->image;
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
    else if($event_encoded["actiontype"] == "my_appointmeent") {
      $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';

if($event_encoded["type"]=='upcoming')
{
  $ongoing_query = "SELECT * from dentalfor_appointment where (status='approved' or status='In Progress') and user_id=:user_id order by id";
}
if($event_encoded["type"]=='cancelled')
{
  $ongoing_query = "SELECT * from dentalfor_appointment where status='cancelled' and user_id=:user_id order by id";
}
if($event_encoded["type"]=='completed')
{
  $ongoing_query = "SELECT * from dentalfor_appointment where status='completed' and user_id=:user_id order by id";
}

       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array( "user_id" =>$event_encoded['user_id']
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          $ongoing_query1 = "SELECT * from dentalfor_provider where  id=:id order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->provider_id
         
           
           
            ));
        $result1 = $statement1->fetch();

        $ongoing_query1 = "SELECT * from dentalfor_patient_acknowledge_form where  user_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->id
         
           
           
            ));
         $num_rows11 = $statement1->rowCount();
        $ongoing_query1 = "SELECT * from dentalfor_patient_screening_form where  appointment_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->id
         
           
           
            ));
         $num_rows22=$statement1->rowCount();
        $ongoing_query1 = "SELECT * from dentalfor_history_form where  appointment_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->id
         
           
           
            ));
         $num_rows33=$statement1->rowCount();
          
          $meal[$i]['appointment_date']=$result->appointment_date;
          $meal[$i]['appointment_time']=$result->appointment_time;
          $meal[$i]['note']=$result->note;
          $meal[$i]['provider_name']=$result1->title;
          $meal[$i]['provider_bio']=$result1->bio;
          $meal[$i]['provider_image']=$site.'provider/'.$result1->image;
          $meal[$i]['provider_id']=$result1->id;
          $meal[$i]['mode']=$result->appointment;
           $meal[$i]['new_user']=$result->new_user;
            $meal[$i]['scheduled_time']=$result->scheduled_time;
          $meal[$i]['appointment_status']=$result->status;
          $meal[$i]['id']=$result->id;
          if($num_rows11>0)
          {
            $meal[$i]['isAckSubmitted']='yes';
          }
          else
          {
            $meal[$i]['isAckSubmitted']='no';
          }
          if($num_rows22>0)
          {
            $meal[$i]['isScreeningSubmitted']='yes';
          }
          else
          {
            $meal[$i]['isScreeningSubmitted']='no';
          }
          if($num_rows33>0)
          {
            $meal[$i]['isMedicalSubmitted']='yes';
          }
          else
          {
            $meal[$i]['isMedicalSubmitted']='no';
          }
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
  else if($event_encoded["actiontype"] == "get_insurance") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';

  $ongoing_query = "SELECT * from dentalfor_insurance where user_id=:user_id order by id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"]
           
            ));
        
         $num_rows=$statement->rowCount();
         $total_amount=0;

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
           /*$ongoing_query1 = "SELECT * from dentalfor_insurance_provider where  id=:id order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->insurance_id
         
           
           
            ));
        $result1 = $statement1->fetch();*/
          
          $meal[$i]['user_id']=$result->user_id;
          $meal[$i]['dental_amount']=$result->dental_amount;
          $meal[$i]['vision_amount']=$result->vision_amount;
          $meal[$i]['total_coverage']=$result->total_coverage;
          $meal[$i]['insurance_provider']=$result->insurance_id;
          $meal[$i]['id']=$result->id;
          
         
        
          $i++;
        }
        
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
  else if($event_encoded["actiontype"] == "get_chat") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
$parent['token']='yes';
  $ongoing_query1 = "SELECT * from `dentalfor_chat` where (`user_id`=:user_id and `from_user`=0) or (`from_user`=:from_user and `user_id`=0) order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         "user_id"=>$event_encoded["from_user"],
         "from_user"=>$event_encoded["from_user"]
           
            ));
        
        
         $num_rows=$statement1->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement1->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          $ongoing_query1 = "SELECT * from dentalfor_user where id=:user_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
         
            "user_id"=>$event_encoded["from_user"]
            ));
        $result1 = $statement1->fetch();
        
          
          $meal[$i]['message']= str_replace($salt,'',base64_decode($result->message));
          $meal[$i]['dt']=$result->dt;
          $meal[$i]['user_id']=$result->user_id;
          $meal[$i]['from_user']=$result->from_user;
          if($result->user_id==0)
             $meal[$i]['to_user'] ='admin';
           if($result->user_id!=0)
             $meal[$i]['to_user'] =str_replace($salt,'',base64_decode($result1->fullname));
           if($result->from_user==0)
             $meal[$i]['from_user'] ='admin';
           if($result->from_user!=0)
             $meal[$i]['from_user'] =str_replace($salt,'',base64_decode($result1->fullname));
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
   else if($event_encoded["actiontype"] == "get_checkin_status") {
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';

  $ongoing_query = "SELECT * from dentalfor_checkin_status where appointment_id=:appointment_id order by id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "appointment_id"=>$event_encoded["appointment_id"]
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['checkin_status']=$result->checkin_status;
          $meal[$i]['checkin_note']=$result->checkin_note;
          
          
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }

  }
  else if($event_encoded["actiontype"] == "covid_question") {

  $ongoing_query = "SELECT * from dentalfor_question where cat_id=2 order by id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['title']=$result->question;
          $meal[$i]['answer1']=$result->answer1;
          $meal[$i]['answer2']=$result->answer2;
           $meal[$i]['answer3']=$result->answer3;
          $meal[$i]['answer4']=$result->answer4;
          $meal[$i]['title']=$result->question;
          
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else if($event_encoded["actiontype"] == "new_user_question") {

  $ongoing_query = "SELECT * from dentalfor_question where cat_id=1 order by id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['title']=$result->question;
          $meal[$i]['answer1']=$result->answer1;
          $meal[$i]['answer2']=$result->answer2;
           $meal[$i]['answer3']=$result->answer3;
          $meal[$i]['answer4']=$result->answer4;
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
else if($event_encoded["actiontype"] == "appointment_type") {
$ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
  $ongoing_query = "SELECT * from dentalfor_appointment_type";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['title']=$result->title;
          $meal[$i]['duration']=$result->duration;
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
  }
  else if($event_encoded["actiontype"] == "insurance_provider_list") {
    
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
    $parent['token']='yes';
     $ongoing_query = "SELECT * from dentalfor_insurance_provider order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          $ongoing_query1 = "SELECT * from dentalfor_category where id=:id";

       
          $meal[$i]['title']=$result->title;
          $meal[$i]['bio']=$result->description;
         
          $meal[$i]['id']=$result->id;
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
       
       }
       else{
        $parent['token']='no';
       } 
}
  else if($event_encoded["actiontype"] == "get_offer") {
    
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
    $parent['token']='yes';
     $ongoing_query = "SELECT * from dentalfor_offer order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
         

       
          $meal[$i]['title']=$result->title;
          $meal[$i]['description']=$result->description;
         $meal[$i]['code']=$result->code;
          $meal[$i]['id']=$result->id;
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
        
}
else if($event_encoded["actiontype"] == "provider_list") {
    
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
$parent['token']='yes';

    
     $ongoing_query = "SELECT * from dentalfor_provider where page='1' order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          $ongoing_query1 = "SELECT * from dentalfor_category where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$result->cat_id
           
            ));
        $result1 = $statement1->fetch();
          
          $meal[$i]['title']=$result->title;
          $meal[$i]['bio']=$result->bio;
          $meal[$i]['category']=$result1->title;
          $meal[$i]['image']=$site.'provider/'.$result->image;
          $meal[$i]['id']=$result->id;
        
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
        
}
else if($event_encoded["actiontype"] == "provider_home") {
    
    $ongoing_query = "SELECT * from dentalfor_user where id=:user_id and token=:token";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "token"=>$event_encoded["token"]
           
            ));
        
         $num_token=$statement->rowCount();
 if($num_token > 0)
    {
      $parent['token']='yes';
$parent['token']='yes';
    
     $ongoing_query = "SELECT * from dentalfor_provider  order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['title']=$result->title;
          $meal[$i]['bio']=$result->bio;
          $meal[$i]['image']=$site.'provider/'.$result->image;
          $meal[$i]['id']=$result->id;
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
  else
  {
    $parent['token']='no';
  }
        
}
 else if($event_encoded['actiontype'] == "login")
{



   $sel_user_query1 = "SELECT * FROM dentalfor_user WHERE username = :username AND password=:password";

      $statement1 = $pdo->prepare($sel_user_query1);
     $statement1->execute(array(
          "username" => base64_encode($salt.$event_encoded["email"]),
          "password"=> md5($salt.$event_encoded["password"])
          ));
      
    $num_rows=$statement1->rowCount();

   
   
    
    if($num_rows>0){
     
    	$user_details = $statement1->fetch();
    	 $token = time().$user_details->id;
      $sel_user_query12 = "Update  dentalfor_user set token=:token WHERE id = :user_id";

          $statement12 = $pdo->prepare($sel_user_query12);
        $statement12->execute(array(
            
            "token" => $token,
            "user_id" => $user_details->id
            
          
          ));
    	
	    			$parent["status"]="yes";
			      	$meal["username"]=str_replace($salt,'',base64_decode($user_details->username));
			      	$meal["email"]=str_replace($salt,'',base64_decode($user_details->email));
			      	$meal["id"]=$user_details->id;
			      	$meal["fullname"]=str_replace($salt,'',base64_decode($user_details->fullname));
              $meal["profile_pic"]=$site1.$user_details->profile_pic;
              $meal["total_coverage"]=$user_details->total_coverage;
			      $meal["phone"]=str_replace($salt,'',base64_decode($user_details->phone));
            $meal["token"]=$token;
			      	
			      	$meal["registration_date"]=$user_details->registration_date;


			 
       $sel_user_query2 = "SELECT * FROM dentalfor_user_device WHERE device_id = :device_id";

      $statement2 = $pdo->prepare($sel_user_query2);
     $statement2->execute(array(
          "device_id" => $event_encoded["device_id"]
          
          ));
      
    $num_rows2=$statement2->rowCount();     
          if($num_rows2>0)
          {

        $sel_user_query12 = "Update  dentalfor_user_device set user_id=:user_id,device_type=:device_type WHERE device_id = :device_id";

          $statement12 = $pdo->prepare($sel_user_query12);
        $statement12->execute(array(
            
            "device_id" => $event_encoded["device_id"],
            "user_id" => $user_details->id,
            "device_type" => $event_encoded["device_type"]
            
          
          ));
          }
          else
          {
                 $sel_user_query12 = "Insert into  dentalfor_user_device set user_id=:user_id,device_id=:device_id,device_type=:device_type";

          $statement12 = $pdo->prepare($sel_user_query12);
        $statement12->execute(array(
            
            "device_id" => $event_encoded["device_id"],
            "user_id" => $user_details->id,
            "device_type" => $event_encoded["device_type"]
           
          
          ));
              
          }

      
   
	    		
    	
       	
    }
    
    else{

      $parent["status"]="no";
    }


 }
else if($event_encoded["actiontype"] == "signup")
{
  $email = $event_encoded["email"];
  $username = $event_encoded["username"];
    
       if($email!='')
       {
        $ongoing_query = "SELECT * FROM `dentalfor_user` where email=:email";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
        "email" => base64_encode($salt.$email)));

        $num_rows = $statement->rowCount();
      }
      else
      {
        $num_rows=0;
      }

         $ongoing_query1 = "SELECT * FROM `dentalfor_user` where username=:username";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
        "username" => base64_encode($salt.$username)));

        $num_rows1 = $statement1->rowCount();
        if($num_rows==0 && $num_rows1==0){

          $ongoing_query = "Insert into `dentalfor_user` set `fullname`=:fullname,`email`=:email,username=:username,password=:password,phone=:phone,total_coverage='',profile_pic='',registration_date=:dt";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "fullname" => base64_encode($salt.$event_encoded["fullname"]),
            "email" => base64_encode($salt.$event_encoded["email"]),
            "username" => base64_encode($salt.$event_encoded["username"]),
            "password" => md5($salt.$event_encoded["password"]),
            "phone" => base64_encode($salt.$event_encoded["phone"]),
            
            "dt"=>date('Y-m-d')
            ));  
            
                
        
         $id = $pdo->lastInsertId();


       $sel_user_query2 = "SELECT * FROM dentalfor_user_device WHERE device_id = :device_id";

      $statement2 = $pdo->prepare($sel_user_query2);
     $statement2->execute(array(
          "device_id" => $event_encoded["device_id"]
          
          ));
      
    $num_rows2=$statement2->rowCount();     
          if($num_rows2>0)
          {

        $sel_user_query12 = "Update  dentalfor_user_device set user_id=:user_id,device_type=:device_type WHERE device_id = :device_id";

          $statement12 = $pdo->prepare($sel_user_query12);
        $statement12->execute(array(
            
            "device_id" => $event_encoded["device_id"],
            "user_id" => $id,
            "device_type" => $event_encoded["device_type"]
            
          
          ));
          }
          else
          {
                 $sel_user_query12 = "Insert into  dentalfor_user_device set user_id=:user_id,device_id=:device_id,device_type=:device_type";

          $statement12 = $pdo->prepare($sel_user_query12);
        $statement12->execute(array(
            
            "device_id" => $event_encoded["device_id"],
            "user_id" => $id,
            "device_type" => $event_encoded["device_type"]
           
          
          ));
              
          }

      
       $token = time().$id;
      $sel_user_query12 = "Update  dentalfor_user set token=:token WHERE id = :user_id";

          $statement12 = $pdo->prepare($sel_user_query12);
        $statement12->execute(array(
            
            "token" => $token,
            "user_id" => $id
            
          
          ));
          
              $meal["username"]=$event_encoded["username"];
             $meal["email"]=$event_encoded["email"];
              $meal["id"]=$id;
              $meal["fullname"]=$event_encoded["fullname"];
              $meal["profile_pic"]='';
              $meal["total_coverage"]='';
            $meal["phone"]=$event_encoded["phone"];
             $meal["token"]=$token;

$meal["registration_date"]=date('Y-m-d');


        $meal['status'] = "yes";
        }
        if($num_rows1>0)
        {
          $meal['status'] = "Username already exits";
        }
        if($num_rows>0)
        {
          $meal['status'] = "Email id already exits";
        }
        

 }

$parent['data'] = $meal;
echo json_encode($parent);