<?php
/*$data = array("email"=>"senjuti.micronixsystem@gmail.com","username"=>"senjuti","fullname"=>"senjuti","phone"=>"9830000000","password"=>"12345678","actiontype"=>"signup");*/


//$data = array("email"=>"senjuti.micronixsystem@gmail.com","password"=>"12345678","actiontype"=>"login");
//$data = array("actiontype"=>"provider_home");
//$data = array("actiontype"=>"provider_list");
//$data = array("actiontype"=>"appointment_type");

/*$data = array("user_id"=>2,"appointment_type"=>"2","provider_id"=>"1","note"=>"Lorem Ipsum","appointment_time"=>"11:00 am","appointment"=>"In Person","office"=>"Toronto","appointment_date"=>"2020-06-10","actiontype"=>"create_appointment");*/

/*$data = array("user_id"=>2,"staff"=>"staff screener","name"=>"mangal","age"=>"25","answered"=>"patient","phone"=>"9038209876","other"=>"Nothing to say","email"=>"a@gmail.com","question1"=>"yes","question2"=>"yes","question3"=>"no","question4"=>"no","question5"=>"no","question6"=>"no","question7"=>"no","question8"=>"no","actiontype"=>"patient_screening_form");*/

$data = array("user_id"=>2,"question1"=>"yes","question2"=>"yes","question3"=>"no","question4"=>"no","question5"=>"no","question6"=>"no","question7"=>"no","question8"=>"no","question9"=>"no","question10"=>"no","question11"=>"no","question12"=>"no","question13"=>"no","question14"=>"no","question15"=>"no","question16"=>"no","question17"=>"no","question18"=>"no","question19"=>"no","question20"=>"no","actiontype"=>"dental_history_form");

/*$data = array("user_id"=>2,"question1"=>"yes","question2"=>"yes","question3"=>"no","question4"=>"no","question5"=>"no","question6"=>"no","question7"=>"no","question8"=>"no","question9"=>"no","question10"=>"no","actiontype"=>"patient_acknowledge_form");*/

//$data = array("actiontype"=>"gallery");
/*$data = array("user_id"=>2,"appointment_type"=>"2","provider_id"=>"1","note"=>"Lorem Ipsum","appointment_time"=>"11:00 am","appointment"=>"In Person","office"=>"Toronto","appointment_date"=>"2020-06-10","actiontype"=>"create_appointment");*/

//$data = array("actiontype"=>"new_user_question");
//$data = array("actiontype"=>"covid_question");

//$data = array("user_id"=>2,"type"=>"cancelled","actiontype"=>"my_appointmeent");
//$data = array("provider_id"=>1,"user_id"=>1,"rating"=>4,"review"=>"Happy with appointment","actiontype"=>"add_review");
//$data = array("provider_id"=>1,"actiontype"=>"get_review");

//$data = array("appointment_id"=>1,"checkin_status"=>"Running Late","checkin_note"=>"I am ruuning late.","actiontype"=>"checkin_status");
//$data = array("appointment_id"=>18,"actiontype"=>"get_checkin_status");

$data_string = json_encode($data);                                                                                   
                                                                                                                    
$ch = curl_init('http://developer.marketingplatform.ca/dentalapp/post.php');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);

echo $result;

?>