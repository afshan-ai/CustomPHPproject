<?php
//header('Content-type: application/json');
error_reporting( E_ERROR );
ob_start();

include "config.php";
$site = 'http://developer.marketingplatform.ca/dentalapp/admin/';
//include "config_mysql.php";

/*$acceptParameter = fopen('php://input','r');
$jsonInput = fgets($acceptParameter);
$event_encoded = json_decode($jsonInput, true);*/

$event_encoded = json_decode(file_get_contents('php://input'),true);

$key ='AIzaSyCiqx2ipC9RPdq6NsuW5D5uaNuE8C07eRs';
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


if($event_encoded["actiontype"] == "map")
{
    $id = $event_encoded["id"];
    $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.start,orders.end,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.id=:id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "id" => $event_encoded["id"]
            ));
        $result = $statement->fetch();
       
        $zip = $string = str_replace(' ', '', $result->enduserzipcode);;
$url="https://maps.google.com/maps/api/geocode/json?address=".$zip."&sensor=false&key=AIzaSyCAbxvGjMV2f6QMqcIANSPjtqNOgpF9Z1U";
  $response = file_get_contents($url);
   $response = json_decode($response, true);
  //echo '<pre>';print_r($response);echo '</pre>';
  
  $lat = $response['results'][0]['geometry']['location']['lat'];
  $long = $response['results'][0]['geometry']['location']['lng'];
        $meal['title'] = $result->title;
        $meal['created'] = $result->created;
        $meal['start'] = $result->start;
        $meal['end'] = $result->end;
        $meal['contractor_id'] = $result->contractor_id;
        $meal['user_latitude'] = $lat;
        $meal['user_longitude'] = $long;
        $meal['latitude'] = $result->contractor_latitude;
        $meal['longitude'] = $result->contractor_longitude;
        $meal['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
        
}
else if($event_encoded["actiontype"] == "checkin_required") {
    
  
            
    $ongoing_query1 = "select * from orders where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"]
            
            
            )); 
            
            $re = $statement1->fetch();
            
            $order_number =$re->order_number;
            
         $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$event_encoded["user_id"]));
    $result_devices = $statement_device->fetchAll();
    
            
            
            $fcmMsg = array(
            'body' => "Check In required for ".$order_number." WO",
            'title' => "Check In Required",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
        
        foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
        
        
            
        $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check In',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "order_number"=>$order_number,
            "message" => "Check In required for ".$order_number." WO",
            "notification_date" => date('Y-m-d h:i:s')
            ));
            
    $parent["status"]="yes";
       
       
       
       
            
            
            
          
}
else if($event_encoded["actiontype"] == "invc") {
    
    $ongoing_query = "Update `orders` set `invc_guide`=:invc_guide,`supportive_file`=:supportive_file,`timeline`=:timeline,`required_deliverable`=:required_deliverable,`project`=:project where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
      "invc_guide" => $event_encoded["invc_guide"],
      "supportive_file" => $event_encoded["supportive_file"],
      "timeline" => $event_encoded["timeline"],
      "project" => $event_encoded["project"],
      "required_deliverable" => $event_encoded["required_deliverable"],
            "id" => $event_encoded["wo_id"]
            ));
         $deliverables= explode(',',$event_encoded["deliverable"]);
         foreach($deliverables as $deliverable)
         {
             $ongoing_query1 = "Insert into `order_delivarable` set `deliverable`=:deliverable,`colour`='black',`wo_id`=:wo_id";
              $statement1 = $pdo->prepare($ongoing_query1);
              $statement1->execute(array(
         
                "deliverable" => $deliverable,
      
                "wo_id" => $event_encoded["wo_id"]
                ));
         }
            
            $parent["status"]="yes";
}
else if($event_encoded["actiontype"] == "approve_wo") {
    
    $ongoing_query = "Update `orders` set `status`='Ready to assign' where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
    
            "id" => $event_encoded["wo_id"]
            ));
            $parent["status"]="yes";
            $meal['id']=$event_encoded["wo_id"];
}
else if($event_encoded["actiontype"] == "get_order_number") {
    
    $query_order = "select * from orders order by id desc limit 0,1";

        $statement_order = $pdo->prepare($query_order);

        $statement_order->execute(array());
    $result_order = $statement_order->fetch();
    $id = $result_order->order_number;
    
    $last_id1 = explode('-',$id);
    $last_id = $last_id1[1];
    $new_id = $last_id+1;
    
    $parent['id']=$new_id;
}
else if($event_encoded["actiontype"] == "eta") {
     $ongoing_query = "Update `orders` set `status`=:status where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => $event_encoded["action_performed"],
            "id" => $event_encoded["wo_id"]
            ));
            
            $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    $ongoing_query = "select * from `orders` where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            "id" => $event_encoded["wo_id"]
            ));
    $result2 = $statement->fetch();
    
    $body ='Technician has successfully submitted ETA ('.$event_encoded["action_performed"].') for WO No. '.$result2->order_number;
    
    $fcmMsg = array(
            'body' => $body,
            'title' => "ETA (".$event_encoded["action_performed"].")",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
            $ongoing_query1 = "select * from `users` where  `id`=:id";
   

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
           
            "id" => $result2->contractor_id
            ));
    $result1 = $statement1->fetch();
            $message =$result1->first_name.' '.$result1->middle_name.' '.$result1->last_name.' has successfully submited ETA ('.$event_encoded["action_performed"].') for WO No. '.$result2->order_number;
       $ongoing_query = "Insert into `notification` set `user_id`=1,`notification_type`='ETA',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "message" => $message,
            "order_number" => $result2->order_number,
            "notification_date" => date('Y-m-d h:i:s')
            ));     
         
   
            $parent['status']='yes';
        
}
else if($event_encoded["actiontype"] == "search") {
    
    
    $ongoing_query = "SELECT * from `orders` where  `enduserprov` like :order_number or `order_number` like :province order by `id` desc";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "order_number" => "%".$event_encoded["keyword"]."%",
             "province" => "%".$event_encoded["keyword"]."%"
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
            
            $ongoing_query1 = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.start,orders.end,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $result->id
            ));
        $result1 = $statement1->fetch();
       
          
          $meal[$i]['technician_name'] = $result1->first_name." ".$result1->middle_name." ".$result1->last_name;
          $meal[$i]['wo_status']=$result->status;
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['province']=$result->enduserprov;
          $meal[$i]['id']=$result->id;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}

 else if($event_encoded["actiontype"] == "approve_list") {
    
    
    $ongoing_query = "SELECT * from `contractor_availability` where  `contractor_id`=:contractor_id  and `status`='Approved' and `wo_id`=:wo_id order by `ca_id` desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "contractor_id" => $event_encoded["contractor_id"],
            "wo_id" => $event_encoded["wo_id"]
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
           $ongoing_query1 = "SELECT * from `users` where  `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $result->contractor_id
            ));
        
        $result1 = $statement1->fetch();
          $meal[$i]['technician_name']=$result1->first_name." ".$result1->middle_name." ".$result1->last_name;  
          $meal[$i]['wo_id']=$result->wo_id;
           $meal[$i]['contractor_id']=$result->contractor_id;
          
          $meal[$i]['id']=$result->ca_id;
          $meal[$i]['wo_status']=$result->status;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "available_list") {
    
    
    $ongoing_query = "SELECT * from `contractor_availability` where  `wo_id`=:wo_id  order by `ca_id` desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "wo_id" => $event_encoded["wo_id"]
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
           $ongoing_query1 = "SELECT * from `users` where  `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $result->contractor_id
            ));
        
        $result1 = $statement1->fetch();
          $meal[$i]['technician_name']=$result1->first_name." ".$result1->middle_name." ".$result1->last_name;  
          $meal[$i]['wo_id']=$result->wo_id;
           $meal[$i]['contractor_id']=$result->contractor_id;
          
          $meal[$i]['id']=$result->ca_id;
          $meal[$i]['wo_status']=$result->status;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "contractor_list") {
    
    
    $ongoing_query = "SELECT * from `users` where  `user_role`=5 order by `id` desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array());
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
            
            
          $meal[$i]['name']=$result->first_name.' '.$result->middle_name.' '.$result->last_name;
         
          $meal[$i]['id']=$result->id;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "nearby_contractor_list") {
    
    $ongoing_query = "SELECT * from `orders` where  id=:wo_id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array("wo_id"=>$event_encoded["wo_id"]));
       $result = $statement->fetch();
        
        $zip =  str_replace(' ', '', $result->enduserzipcode);
$url="https://maps.google.com/maps/api/geocode/json?address=".$zip."&sensor=false&key=AIzaSyCAbxvGjMV2f6QMqcIANSPjtqNOgpF9Z1U";
  $response = file_get_contents($url);
   $response = json_decode($response, true);
  //echo '<pre>';print_r($response);echo '</pre>';
  
  $lat = $response['results'][0]['geometry']['location']['lat'];
  $long = $response['results'][0]['geometry']['location']['lng'];
  
  $earthRadius = 6371000;
  
  $latFrom = deg2rad($lat);
  $lonFrom = deg2rad($long);
  
  
  $ongoing_query1 = "SELECT * from `states` where  name=:name and country_id=38";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array("name"=>$result->enduserprov));
       $result1 = $statement1->fetch();
       
       
    $ongoing_query_user = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,users.id,users.first_name,users.last_name,users.middle_name from `users` INNER JOIN contractors_details ON users.id=contractors_details.contractor_id_fk where users.user_role=5 and contractors_details.contractor_state=:id and contractors_details.contractor_latitude<>' ' and contractors_details.contractor_longitude<>' ' order by `id` desc";

        $statement_user = $pdo->prepare($ongoing_query_user);

        $statement_user->execute(array("id"=>$result1->id));
        
       $users = $statement_user->fetchAll();
        $i=0;
        foreach($users as $user)
        {
        
        
         
   
  $latTo = deg2rad($user->contractor_latitude);
  $lonTo = deg2rad($user->contractor_longitude);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
     $distance = ($angle * $earthRadius)/1000;
   
    if($distance<=50)
    {
        
      
       
            
            
          $meal[$i]['name']=$user->first_name.' '.$user->middle_name.' '.$user->last_name;
         
          $meal[$i]['id']=$user->id;
          $meal[$i]['distance']=$distance;
          $i++;
      
        }
    }
    if($i>0)
    {
        $parent['status']='yes';
    }
    else
    {
        $parent['status']='no';
    }
   
    
}
else if($event_encoded["actiontype"] == "new_wo") {
    
    
    $ongoing_query = "SELECT * from `orders` where  `status`=:status order by `id` desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "new"
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
            
            $ongoing_query1 = "SELECT * from `post_in_market` where  `wo_id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" => $result->id
            ));
        
         $num_rows1=$statement1->rowCount();
          
          $meal[$i]['technician_name']=""; 
          if($num_rows1==0)
          {
            $meal[$i]['wo_status']="New";
          }
          else
          {
            $meal[$i]['wo_status']="Posted";
          }
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "deliverable_list") {
    
    
    $ongoing_query = "SELECT * from upload_deliverable where deliverable_id=:deliverable_id order by d_id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            "deliverable_id" => $event_encoded["deliverable_id"]
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['project_name']=$result->project_name;
          $meal[$i]['notes']=$result->notes;
          $meal[$i]['upload_file']=$result->upload_file;
          $meal[$i]['deliverable_status']=$result->deliverable_status;
          $meal[$i]['d_id']=$result->d_id;
          $meal[$i]['contractor_id']=$result->contractor_id;
          $meal[$i]['wo_id']=$result->wo_id;
          $meal[$i]['deliverable_id']=$result->deliverable_id;
          
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "view_deliverable") {
    $ongoing_query = "SELECT * from upload_deliverable where d_id=:d_id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "d_id"=>$event_encoded["d_id"]
           
            ));
        
         $num_rows=$statement->rowCount();
         if($num_rows > 0)
    {
        $parent['status']='yes';
         $result = $statement->fetch();
         
         $ongoing_query1 = "SELECT * from orders where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$result->wo_id
           
            ));
           $result1 = $statement1->fetch(); 
            $ongoing_query12 = "SELECT * from users where id=:id";

        $statement12 = $pdo->prepare($ongoing_query12);

        $statement12->execute(array(
         
           "id"=>$result->contractor_id
           
            ));
           $result12 = $statement12->fetch(); 
        $meal['contractor_id']=$result->contractor_id;
        $meal['wo_id']=$result->wo_id;
        $meal['order_number']=$result1->order_number;
        $meal['project_name']=$result->project_name;
        
        $meal['upload_file']=explode(',',$result->upload_file);
        $meal['notes']=$result->notes;
        $meal['id']=$result1->id;
        $meal['d_id']=$result->d_id;
        $meal['deliverable_id']=$result->deliverable_id;
        $meal['technician_name']=$result12->first_name.' '.$result12->middle_name.' '.$result12->last_name;
        
    }
    else
    {
        $parent['status']='yes';
    }
}
else if($event_encoded["actiontype"] == "deliverable_admin_list") {
    
    
    $ongoing_query = "SELECT upload_deliverable.deliverable_status,upload_deliverable.d_id,upload_deliverable.deliverable_id,upload_deliverable.contractor_id,upload_deliverable.project_name,orders.title,orders.created,orders.order_number,orders.status from `upload_deliverable` inner join `orders` ON  upload_deliverable.wo_id=orders.id where upload_deliverable.wo_id=:wo_id order by upload_deliverable.d_id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "wo_id" => $event_encoded["wo_id"]
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          $ongoing_query1 = "SELECT * from users where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
          "id" => $result->contractor_id
           
           
            ));
        
         $result1 = $statement1->fetch();
         $meal[$i]['id']=$result->id;
         $meal[$i]['d_id']=$result->d_id;
         $meal[$i]['deliverable_id']=$result->deliverable_id;
          $meal[$i]['contractor_id']=$result->contractor_id;
          $meal[$i]['wo_status']=$result->status;
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->project_name;
          $meal[$i]['deliverable_status']=$result->deliverable_status;
          $meal[$i]['technician_name'] = $result1->first_name." ".$result1->middle_name." ".$result1->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "wo_deliverable") {
    $ongoing_query1 = "select * from order_delivarable where `wo_id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"]
            
            
            )); 
            
            $deliverables = $statement1->fetchAll();
            $count=$statement1->rowCount();
     if($count>0)
     {
         $parent['status']='yes';
         $i=0;
            foreach($deliverables as $deliverable)
            {
                
             $meal[$i]['wo_id']=$deliverable->wo_id;
             $meal[$i]['deliverable_id']=$deliverable->deliverable_id;
             $meal[$i]['deliverable']=$deliverable->deliverable;
             $meal[$i]['colour']=$deliverable->colour;
             $i++;
            }
     }
     else
     {
         $parent['status']='no';
     }
}
else if($event_encoded["actiontype"] == "upload_deliverable") {
    
    $ongoing_query1 = "Delete from `upload_deliverable` where  `deliverable_id`=:deliverable_id and `wo_id`=:wo_id and `contractor_id`=:contractor_id and `deliverable_status`='declined'";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "deliverable_id" =>  $event_encoded["deliverable_id"],
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["tech_id"]
             
             
            ));
    
    
    $upload_files= $event_encoded["upload_files"];
    $ongoing_query1 = "Insert into `upload_deliverable` set  `deliverable_id`=:deliverable_id,`wo_id`=:wo_id, `contractor_id`=:contractor_id, `project_name`=:project_name, `notes`=:notes, `upload_file`=:upload_file,`deliverable_status`=''";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "deliverable_id" =>  $event_encoded["deliverable_id"],
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["tech_id"],
             "project_name" =>  $event_encoded["project_name"],
            
             "notes" =>  $event_encoded["notes"],
             "upload_file" =>  $upload_files
             
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
             $meal['contractor_id']=$event_encoded["tech_id"];
             $meal['project_name']=$event_encoded["project_name"];
             
             $meal['notes']=$event_encoded["notes"];
             
            $ongoing_query1 = "Update `order_delivarable` set  `colour`='green' WHERE `deliverable_id`=:deliverable_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "deliverable_id" =>  $event_encoded["deliverable_id"]
             
            ));
             
             
              $ongoing_query7 = "select * from order_delivarable where `wo_id`=:wo_id";

        $statement7 = $pdo->prepare($ongoing_query7);

        $statement7->execute(array(
         
            "wo_id" => $event_encoded["wo_id"]
            
            
            )); 
            $de7 = $statement7->fetchAll();
            $count7=$statement7->rowCount();
            $j=1;
            foreach($de7 as $de)
            {
                 $ongoing_query8 = "select * from upload_deliverable where `deliverable_id`=:deliverable_id";

        $statement8 = $pdo->prepare($ongoing_query8);

        $statement8->execute(array(
         
            "deliverable_id" =>$de->deliverable_id
            
            
            )); 
            $count8=$statement8->rowCount();
            if($count8==0)
            {
                $j=0;
            }
            }
           
            if($j==1)
            {
                $ongoing_query1 = "Update `orders` set  `status`='Ready for approval' WHERE `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"]
             
            ));
            }
            
            
            
            
            
             $ongoing_query1 = "select order_number from  `orders`  where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"]
            
             
            ));   
            $result = $statement1->fetch();
            
            
            $order_number = $result->order_number;
            
            
            
                $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    
    $body = "Technician has submitted the deliverables for ".$order_number." WO";
   $fcmMsg = array(
            'body' => $body,
            'title' => "Submitted Deliverable",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
    
    foreach($result_devices as $result_device)
    {
        
             
            
       $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
     $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>1,
           "order_number"=>$order_number,
            "message" => "Technician has submitted the deliverables for ".$order_number." WO",
            "notification_date" => date('Y-m-d h:i:s')
            ));   
}
else if($event_encoded["actiontype"] == "deliverable") {
    
    $upload_files= $event_encoded["upload_files"];
    $ongoing_query1 = "Insert into `deliverable` set  `wo_id`=:wo_id, `contractor_id`=:contractor_id, `project_name`=:project_name, `store_no`=:store_no, `store_name`=:store_name, `store_address`=:store_address, `notes`=:notes, `upload_file`=:upload_file,`deliverable_status`='' ";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["tech_id"],
             "project_name" =>  $event_encoded["project_name"],
             "store_no" =>  $event_encoded["store_no"],
             "store_name" =>  $event_encoded["store_name"],
             "store_address" =>  $event_encoded["store_address"],
             "notes" =>  $event_encoded["notes"],
             "upload_file" =>  $upload_files
             
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
             $meal['contractor_id']=$event_encoded["tech_id"];
             $meal['project_name']=$event_encoded["project_name"];
             $meal['store_no']=$event_encoded["store_no"];
             $meal['store_address']=$event_encoded["store_address"];
             $meal['store_name']=$event_encoded["store_name"];
             $meal['notes']=$event_encoded["notes"];
             
             $ongoing_query1 = "Update `orders` set  `status`='Ready for approval' WHERE `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"]
             
            ));
}
else if($event_encoded["actiontype"] == "deliverable_edit") {
    
    $upload_files= $event_encoded["upload_files"];
    $ongoing_query1 = "update `deliverable` set  `wo_id`=:wo_id, `contractor_id`=:contractor_id, `project_name`=:project_name, `store_no`=:store_no, `store_name`=:store_name, `store_address`=:store_address, `notes`=:notes, `upload_file`=:upload_file where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["tech_id"],
             "project_name" =>  $event_encoded["project_name"],
             "store_no" =>  $event_encoded["store_no"],
             "store_name" =>  $event_encoded["store_name"],
             "store_address" =>  $event_encoded["store_address"],
             "notes" =>  $event_encoded["notes"],
             "id" =>  $event_encoded["id"],
             "upload_file" =>  $upload_files
             
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
             $meal['contractor_id']=$event_encoded["tech_id"];
             $meal['project_name']=$event_encoded["project_name"];
             $meal['store_no']=$event_encoded["store_no"];
             $meal['store_address']=$event_encoded["store_address"];
             $meal['store_name']=$event_encoded["store_name"];
             $meal['notes']=$event_encoded["notes"];
}
else if($event_encoded["actiontype"] == "add_timeline") {
    
    $upload_files= $event_encoded["upload_files"];
    $ongoing_query1 = "Insert into `timeline` set  `wo_id`=:wo_id, `contractor_id`=:contractor_id, `start_time`=:start_time, `end_time`=:end_time, `task`=:task";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["contractor_id"],
             "start_time" =>  $event_encoded["start_time"],
            
             "end_time" =>  $event_encoded["end_time"],
             "task" =>  $event_encoded["task"]
             
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
             $meal['contractor_id']=$event_encoded["contractor_id"];
             $meal['start_time']=$event_encoded["start_time"];
             
             $meal['end_time']=$event_encoded["end_time"];
             $meal['task']=$event_encoded["task"];
}
 else if($event_encoded["actiontype"] == "timeline_list") {
    
    
    $ongoing_query = "SELECT * from `timeline` where  `wo_id`=:wo_id order by `timeline_id` asc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
          
            "wo_id" => $event_encoded["wo_id"]
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
           $ongoing_query1 = "SELECT * from `users` where  `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $result->contractor_id
            ));
        
        $result1 = $statement1->fetch();
          $meal[$i]['technician_name']=$result1->first_name." ".$result1->middle_name." ".$result1->last_name;  
          $meal[$i]['wo_id']=$result->wo_id;
           $meal[$i]['contractor_id']=$result->contractor_id;
          
          $meal[$i]['id']=$result->timeline_id;
          $meal[$i]['start_time']=$result->start_time;
          $meal[$i]['end_time']=$result->end_time;
          $meal[$i]['task']=$result->task;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "update_status") {
    $status = $event_encoded['status'];
    if($status=='Assigned')
    {
        
            
             $ongoing_query1 = "Update orders set `status`='Assigned', contractor_id=:contractor_id where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
            "wo_id" => $event_encoded["wo_id"],
            "contractor_id" => $event_encoded["contractor_id"]
            
            ));
       
       
        $ongoing_query1 = "select * from orders where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"]
            
            
            )); 
            
            $re = $statement1->fetch();
            
            $order_number =$re->order_number;
       
       
        $fcmMsg = array(
            'body' => "Connectra has assigned ".$order_number." WO to you",
            'title' => "Assigned Work Order",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
         $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$event_encoded["contractor_id"]));
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
            $fcmMsg = array(
            'body' => "Check In required for ".$order_number." WO",
            'title' => "Check In Required",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
        
        foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
        
        
            
        $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check In',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["contractor_id"],
           "order_number"=>$order_number,
            "message" => "Check In required for ".$order_number." WO",
            "notification_date" => date('Y-m-d h:i:s')
            ));
            
    $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["contractor_id"],
            "order_number"=>$order_number,
            "message" => "Connectra has assigned ".$order_number." WO to you",
            "notification_date" => date('Y-m-d h:i:s')
            ));
       
       
       
       
       
       
            
           
            
            
            
            $meal['status']="Assigned";
    }
     if($status=='Ready to assign')
    {
          
             $ongoing_query1 = "Update orders set `status`='Ready to assign', contractor_id=0 where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
            "wo_id" => $event_encoded["wo_id"]
           
            
            ));
            $meal['status']="Ready to assign";
        
    }
    $parent['status']='yes';
    
}
else if($event_encoded["actiontype"] == "accept_deliverable") {
    
   $ongoing_query1 = "update `order_delivarable` set  `colour`='green' where deliverable_id=:deliverable_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "deliverable_id" =>  $event_encoded["deliverable_id"]
            
             
            ));
            
    $ongoing_query1 = "update `upload_deliverable` set  `deliverable_status`='accepted' where d_id=:d_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "d_id" =>  $event_encoded["id"]
            
             
            ));
            $parent['status']='yes';
            $meal['id']=$event_encoded["id"];
            $meal['deliverable_status']='Approved';
              
     $ongoing_query1 = "select orders.order_number,orders.id,upload_deliverable.contractor_id from `upload_deliverable` INNER JOIN `orders` ON orders.id=upload_deliverable.wo_id where upload_deliverable.d_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));   
            $result = $statement1->fetch();
            
            $contractor_id = $result->contractor_id;
            $order_number = $result->order_number;
            $wo_id = $result->id;
            
            
            
            
            
            $ongoing_query7 = "select * from order_delivarable where `wo_id`=:wo_id";

        $statement7 = $pdo->prepare($ongoing_query7);

        $statement7->execute(array(
         
            "wo_id" => $wo_id
            
            
            )); 
            $de7 = $statement7->fetchAll();
            $count7=$statement7->rowCount();
            $j=1;
            foreach($de7 as $de)
            {
                
                 $ongoing_query8 = "select * from upload_deliverable where `deliverable_id`=:deliverable_id and deliverable_status='accepted'";

        $statement8 = $pdo->prepare($ongoing_query8);

        $statement8->execute(array(
         
            "deliverable_id" =>$de->deliverable_id
            
            
            )); 
            $count8=$statement8->rowCount();
            if($count8==0)
            {
                $j=0;
            }
            }
           
            if($j==1)
            {
                $ongoing_query1 = "Update `orders` set  `status`='Approved' WHERE `order_number`=:order_number";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "order_number" =>  $order_number
             
            ));
            }
            
            
            /*$ongoing_query3 = "update `orders` set  `status`='Approved' where order_number=:order_number";

        $statement3 = $pdo->prepare($ongoing_query3);

        $statement3->execute(array(
         
           
             "order_number" =>  $order_number
            
             
            ));*/
            
                $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$contractor_id));
    $result_devices = $statement_device->fetchAll();
    
    
    $body = "Connectra has successfully approved the deliverables for ".$order_number." WO. Please submit your invoice into the tech portal.";
   $fcmMsg = array(
            'body' => $body,
            'title' => "Accepted Deliverable",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$wo_id,
            
            'sound' => "default",
                'color' => "#203E78" 
        );
    
    foreach($result_devices as $result_device)
    {
        
             
            
       $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$wo_id)
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
     $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$contractor_id,
           "order_number"=>$order_number,
            "message" => "Connectra has successfully approved the deliverables for ".$order_number." WO. Please submit your invoice into the tech portal.",
            "notification_date" => date('Y-m-d h:i:s')
            ));   
             
}
else if($event_encoded["actiontype"] == "decline_deliverable") {
    
    $ongoing_query1 = "update `upload_deliverable` set  `deliverable_status`='declined' where d_id=:d_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "d_id" =>  $event_encoded["id"]
            
             
            ));
            $ongoing_query1 = "update `order_delivarable` set  `colour`='red' where deliverable_id=:deliverable_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "deliverable_id" =>  $event_encoded["deliverable_id"]
            
             
            ));
    
             $parent['status']='yes';
             $meal['id']=$event_encoded["id"];
              $meal['deliverable_status']='Declined';
              
              
              $ongoing_query1 = "select orders.id,orders.order_number,upload_deliverable.contractor_id from `upload_deliverable` INNER JOIN `orders` ON orders.id=upload_deliverable.wo_id where upload_deliverable.d_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));   
            $result = $statement1->fetch();
            
            $contractor_id = $result->contractor_id;
            $order_number = $result->order_number;
            $wo_id = $result->id;
                $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$contractor_id));
    $result_devices = $statement_device->fetchAll();
    
    
    $body = "Connectra has declined the deliverables for ".$order_number." WO. Please resubmit the deliverables.";
   $fcmMsg = array(
            'body' => $body,
            'title' => "Declined Deliverable",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$wo_id,
            'sound' => "default",
                'color' => "#203E78" 
        );
    
    foreach($result_devices as $result_device)
    {
        
             
            
       $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$wo_id)
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
    
     $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$contractor_id,
           "order_number"=>$order_number,
            "message" => "Connectra has declined the deliverables for ".$order_number." WO. Please resubmit the deliverables.",
            "notification_date" => date('Y-m-d h:i:s')
            ));          
    
    $ongoing_query1 = "Delete from `deliverable` where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));
}
/*else if($event_encoded["actiontype"] == "accept_deliverable") {
    
   
    $ongoing_query1 = "update `deliverable` set  `deliverable_status`='accepted' where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));
             $parent['status']='yes';
             $meal['id']=$event_encoded["id"];
              $meal['deliverable_status']='accepted';
              
     $ongoing_query1 = "select orders.order_number,deliverable.contractor_id from `deliverable` INNER JOIN `orders` ON orders.id=deliverable.wo_id where deliverable.id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));   
            $result = $statement1->fetch();
            
            $contractor_id = $result->contractor_id;
            $order_number = $result->order_number;
            
            $ongoing_query3 = "update `orders` set  `status`='Approved' where order_number=:order_number";

        $statement3 = $pdo->prepare($ongoing_query3);

        $statement3->execute(array(
         
           
             "order_number" =>  $order_number
            
             
            ));
            
                $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$contractor_id));
    $result_devices = $statement_device->fetchAll();
    
    
    $body = "Connectra has successfully approved the deliverables for ".$order_number." WO. Please submit your invoice into the tech portal.";
   $fcmMsg = array(
            'body' => $body,
            'title' => "Accepted Deliverable",
            'sound' => "default",
                'color' => "#203E78" 
        );
    
    foreach($result_devices as $result_device)
    {
        
             
            
       $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
     $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$contractor_id,
           "order_number"=>$order_number,
            "message" => "Connectra has successfully approved the deliverables for ".$order_number." WO. Please submit your invoice into the tech portal.",
            "notification_date" => date('Y-m-d h:i:s')
            ));   
             
}*/
else if($event_encoded["actiontype"] == "request") {
    
    $ongoing_query = "SELECT orders.`order_number`, orders.contractor_id,user_device.device_type,user_device.token FROM `orders` inner join `user_device` ON  orders.contractor_id=user_device.user_id WHERE orders.id=:wo_id";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         "wo_id"=>$event_encoded["wo_id"]
          
            ));
$results = $statement->fetchAll();
     $count=$statement->rowCount();
     if($count>0)
     {
        $parent['status']='yes'; 
        
        
        
             
           
        foreach($results as $result)
        {
            $order_number = $result->order_number;
            $user_id = $result->contractor_id;
        $token = $result->token;
        if($event_encoded["action"]=='checkin')
        {
            $body = 'Connectra has requested for check In for '.$order_number.' WO ';
            $title = 'Check In';
            
             /*$ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check In',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$result->contractor_id,
           "order_number"=>$order_number,
            "message" => "Connectra has requested for check In for ".$order_number." WO ",
            "notification_date" => date('Y-m-d h:i:s')
            ));*/
        }
        if($event_encoded["action"]=='checkout')
        {
            $body = 'Check out is required for '.$order_number.' WO ';
            $title = 'Check Out';
            
           /* $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check Out',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$result->contractor_id,
           "order_number"=>$order_number,
            "message" => 'Check out is required for '.$order_number.' WO ',
            "notification_date" => date('Y-m-d h:i:s')
            ));*/
            
        }
         $fcmMsg = array(
            'body' => $body,
            'title' => $title,
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
        }
        
        if($event_encoded["action"]=='checkin')
        {
            
            
             $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check In',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$user_id,
           "order_number"=>$order_number,
            "message" => "Connectra has requested for check In for ".$order_number." WO ",
            "notification_date" => date('Y-m-d h:i:s')
            ));
        }
        if($event_encoded["action"]=='checkout')
        {
            
            
            $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check Out',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$user_id,
           "order_number"=>$order_number,
            "message" => 'Check out is required for '.$order_number.' WO ',
            "notification_date" => date('Y-m-d h:i:s')
            ));
            
        }
     }
     else
     {
         $parent['status']='no';
     }
}
else if($event_encoded["actiontype"] == "post_in_market") {
    
    $ongoing_query12 = "Insert into `post_in_market` set wo_id=:wo_id";

        $statement12 = $pdo->prepare($ongoing_query12);

        $statement12->execute(array(
         
           
             "wo_id" =>  $event_encoded["wo_id"]
            
             
            ));
    
     $ongoing_query12 = "select * from `orders` where  `id`=:id";

        $statement12 = $pdo->prepare($ongoing_query12);

        $statement12->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"]
            
             
            ));
    $results12 = $statement12->fetch();
    
      $zip =  str_replace(' ', '', $results12->enduserzipcode);
$url="https://maps.google.com/maps/api/geocode/json?address=".$zip."&sensor=false&key=AIzaSyCAbxvGjMV2f6QMqcIANSPjtqNOgpF9Z1U";
  $response = file_get_contents($url);
   $response = json_decode($response, true);
  //echo '<pre>';print_r($response);echo '</pre>';
  
  $wo_lat = $response['results'][0]['geometry']['location']['lat'];
  $wo_long = $response['results'][0]['geometry']['location']['lng'];
  
   /*$wo_lat = $results12->latitude;
     $wo_long = $results12->longitude;*/
     
      $user_query = "select * from `contractors_details`";

        $statement_user = $pdo->prepare($user_query);

        $statement_user->execute(array());
    $users = $statement_user->fetchAll();
    $count =0;
    foreach($users as $user)
    {
        
        $tc_lat =$user->contractor_latitude;
        $tc_long =$user->contractor_longitude;
        
        $earthRadius = 6371000;
        $latFrom = deg2rad($tc_lat);
        $lonFrom = deg2rad($tc_long);
        $latTo = deg2rad($wo_lat);
        $lonTo = deg2rad($wo_long);

          $latDelta = $latTo - $latFrom;
          $lonDelta = $lonTo - $lonFrom;

            $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
            $distance = ($angle * $earthRadius)/1000;
            $order_number = $results12->order_number;
            if($distance<=50)
            {
                $count=$count+1;
                $fcmMsg = array(
            'body' => "Connectra has created new ".$order_number." WO near your area. Please click on available to mark your availability.",
            'title' => "New Work Order",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
         $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$user->contractor_id_fk));
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$user->contractor_id_fk,
           "order_number"=>$order_number,
            "message" => "Connectra has created new ".$order_number." WO near your area. Please click on available to mark your availability.",
            "notification_date" => date('Y-m-d h:i:s')
            ));
            
             $ongoing_query = "Insert into `post_user` set `contractor_id`=:contractor_id,`wo_id`=:wo_id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "contractor_id"=>$user->contractor_id_fk,
           "wo_id"=>$event_encoded["wo_id"]
            ));
            }
        
    }
    
    if($count>0)
    {
        $parent['status']='yes';
    }
    else
    {
        $parent['status']='no';
    }
    
}
else if($event_encoded["actiontype"] == "checkin") {
    
    $tc_lat =$event_encoded["lat"];
    $tc_long =$event_encoded["long"];
    
     $ongoing_query12 = "select * from `orders` where  `id`=:id";

        $statement12 = $pdo->prepare($ongoing_query12);

        $statement12->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"]
            
             
            ));
    $results12 = $statement12->fetch();
    
     $zip =  str_replace(' ', '', $results12->enduserzipcode);;
$url="https://maps.google.com/maps/api/geocode/json?address=".$zip."&sensor=false&key=AIzaSyCAbxvGjMV2f6QMqcIANSPjtqNOgpF9Z1U";
  $response = file_get_contents($url);
   $response = json_decode($response, true);
  //echo '<pre>';print_r($response);echo '</pre>';
  
  $wo_lat = $response['results'][0]['geometry']['location']['lat'];
  $wo_long = $response['results'][0]['geometry']['location']['lng'];
  
   /* $wo_lat = $results12->latitude;
     $wo_long = $results12->longitude;*/
     
     $earthRadius = 6371000;
   $latFrom = deg2rad($tc_lat);
  $lonFrom = deg2rad($tc_long);
  $latTo = deg2rad($wo_lat);
  $lonTo = deg2rad($wo_long);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
     $distance = ($angle * $earthRadius)/1000;
    
    if($distance<=1)
    {
     
     
     $ongoing_query1 = "Delete from `checkin` where  `wo_id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"]
            
             
            ));
     
    $ongoing_query1 = "insert into `checkin` set  `wo_id`=:id,`wo_status`='Check In',`checkin_time`=:checkin_time";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"],
             "checkin_time" =>  date('Y-m-d h:i:s')
            
             
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
             
             
              $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    
      $query_user = "select * from `users` where  `id`=:id";

        $statement_user = $pdo->prepare($query_user);

        $statement_user->execute(array(
         
           
             "id" =>  $results12->contractor_id
            
             
            ));
    $result_user = $statement_user->fetch();
    $tecnician_name = $result_user->first_name.' '.$result_user->middle_name.' '.$result_user->last_name;
    
    foreach($result_devices as $result_device)
    {
        $order_number = $results12->order_number;
    $body = "Technician has successfully checked In for WO No. ".$order_number;
    
   // $body = $tecnician_name.' is checked in to '.$order_number;
             
            $fcmMsg = array(
            'body' => $body,
            'title' => "Check In",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
        $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
    
    $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check In',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>1,
            "order_number"=>$order_number,
            "message" => "Technician has successfully checked In for WO No. ".$order_number,
            "notification_date" => date('Y-m-d h:i:s')
            ));
        
    }
    else
    {
        $parent['status']='no';
    }
             
             
}
else if($event_encoded["actiontype"] == "checkout") {
    
    
     $ongoing_query12 = "update checkin set  `wo_status`='Check Out' where  `wo_id`=:id";

        $statement12 = $pdo->prepare($ongoing_query12);

        $statement12->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"]
            
             
            ));
   
     
     
     
     
    $ongoing_query1 = "insert into `checkout_details` set  `wo_id`=:id,`final_time`=:final_time,`checkout_note`=:checkout_note,`checkout_date`=:checkout_date";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["wo_id"],
             
             "final_time" =>  $event_encoded["final_time"],
             "checkout_date" =>  date('Y-m-d'),
             "checkout_note" =>  $event_encoded["checkout_note"]
            
             
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
             
             
             
             $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    
     $query_order = "select * from `orders` where  `id`=:wo_id";

        $statement_order = $pdo->prepare($query_order);

        $statement_order->execute(array("wo_id"=>$event_encoded["wo_id"]));
    $result_order = $statement_order->fetch();
    
    
      $query_user = "select * from `users` where  `id`=:id";

        $statement_user = $pdo->prepare($query_user);

        $statement_user->execute(array(
         
           
             "id" =>  $result_order->contractor_id
            
             
            ));
    $result_user = $statement_user->fetch();
    $tecnician_name = $result_user->first_name.' '.$result_user->middle_name.' '.$result_user->last_name;
    foreach($result_devices as $result_device)
    {
       
    $order_number = $result_order->order_number;
    $body ="Technician has successfully checked out for ".$order_number." WO";
    //$body = $tecnician_name.' is checked out';
             
            $fcmMsg = array(
            'body' => $body,
            'title' => "Check Out",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
        $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
    
    $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$result_order->contractor_id));
    $result_devices = $statement_device->fetchAll();
  /* foreach($result_devices as $result_device)
    {
       
    $order_number = $result_order->order_number;
    $body ="Deliverables are required for ".$order_number." WO";
    //$body = $tecnician_name.' is checked out';
             
            $fcmMsg = array(
            'body' => $body,
            'title' => "Check Out",
            'sound' => "default",
                'color' => "#203E78" 
        );
        $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }*/
    
    
   
   
   
   $to = "h.pawar@connectratechnologies.com";
$subject = "Checkout Details";

$body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>";
$body .="<p>Hello Super Admin,</p>

<p>Technician has successfully checked out for ".$order_number." WO:</p>";

$body .="<p> Check Out Time: ".$event_encoded["final_time"]."
<p> Closure Note: ".$event_encoded["checkout_note"]."
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Connectratechnologies<chandradip.ghosh@gmail.com>' . "\r\n";


mail($to,$subject,$body,$headers);
    
    
    
    $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check Out',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>1,
           "order_number"=>$order_number,
            "message" => "Technician has successfully checked out for ".$order_number." WO",
            "notification_date" => date('Y-m-d h:i:s')
            ));  
            
            
    /* $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$result_order->contractor_id,
            "order_number"=>$order_number,
            "message" => 'Deliverables are required for '.$order_number.' WO',
            "notification_date" => date('Y-m-d h:i:s')
            ));   */       
             
}
/* else if($event_encoded["actiontype"] == "decline_deliverable") {
    
   
    
             $parent['status']='yes';
             $meal['id']=$event_encoded["id"];
              $meal['deliverable_status']='declined';
              
              
              $ongoing_query1 = "select orders.order_number,deliverable.contractor_id from `deliverable` INNER JOIN `orders` ON orders.id=deliverable.wo_id where deliverable.id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));   
            $result = $statement1->fetch();
            
            $contractor_id = $result->contractor_id;
            $order_number = $result->order_number;
                $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$contractor_id));
    $result_devices = $statement_device->fetchAll();
    
    
    $body = "Connectra has declined the deliverables for ".$order_number." WO. Please resubmit the deliverables.";
   $fcmMsg = array(
            'body' => $body,
            'title' => "Declined Deliverable",
            'sound' => "default",
                'color' => "#203E78" 
        );
    
    foreach($result_devices as $result_device)
    {
        
             
            
       $token = $result_device->token;
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
    }
    
     $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$contractor_id,
           "order_number"=>$order_number,
            "message" => "Connectra has declined the deliverables for ".$order_number." WO. Please resubmit the deliverables.",
            "notification_date" => date('Y-m-d h:i:s')
            ));          
    
    $ongoing_query1 = "Delete from `deliverable` where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
             "id" =>  $event_encoded["id"]
            
             
            ));
}*/
else if($event_encoded["actiontype"] == "approve_schedule") {
    $status = $event_encoded['status'];
    if($status=='approve')
    {
        $ongoing_query1 = "Delete from contractor_availability where `ca_id`=:ca_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "ca_id" => $event_encoded["id"]
            
            ));
            
            /* $ongoing_query1 = "Update orders set `status`='Assigned', contractor_id=:contractor_id where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
            "wo_id" => $event_encoded["wo_id"],
            "contractor_id" => $event_encoded["contractor_id"]
            
            ));*/
       
       
       
       
       
        $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    $ongoing_query = "select * from `orders` where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            "id" => $event_encoded["wo_id"]
            ));
    $result2 = $statement->fetch();
    
    $body ='Technician has accepted WO No. '.$result2->order_number;
    
    $fcmMsg = array(
            'body' => $body,
            'title' => "Approve WO",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
            $ongoing_query1 = "select * from `users` where  `id`=:contractor_id";
   

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
           
             "contractor_id" => $event_encoded["contractor_id"]
            ));
    $result1 = $statement1->fetch();
            $message =$result1->first_name.' '.$result1->middle_name.' '.$result1->last_name.' has accepted WO No. '.$result2->order_number;
       $ongoing_query = "Insert into `notification` set `user_id`=1,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "message" => $message,
            "order_number" => $result2->order_number,
            "notification_date" => date('Y-m-d h:i:s')
            ));     
         
            
 
           
         $emailinkapproved = "http://tp.connectratechnologies.com/bb3b0e2e08e40fa7185a8049a6ce81c7";	
			$emailinkapproved .= "?al2489llt=".$event_encoded["contractor_id"].';'.md5($result2->order_number);  
		
         
           
            
            
            
            $meal['status']="Accepted";
            
            $ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://tp.connectratechnologies.com/Validations/email_notifications_app/?id=".$event_encoded["wo_id"]."&tech=".$event_encoded["contractor_id"]);
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
           
    }
     if($status=='decline')
    {
        $ongoing_query1 = "Update contractor_availability set status='Rejected' where `ca_id`=:ca_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "ca_id" => $event_encoded["id"]
            ));
            
            $ongoing_query1 = "Update orders set `status`='Ready to assign', contractor_id=0 where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
            "wo_id" => $event_encoded["wo_id"]
           
            
            ));
            
            
            
             $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    $ongoing_query = "select * from `orders` where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            "id" => $event_encoded["wo_id"]
            ));
    $result2 = $statement->fetch();
    
    $body ='Technician has declined WO No. '.$result2->order_number;
    
    $fcmMsg = array(
            'body' => $body,
            'title' => "Decline WO",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
            $ongoing_query1 = "select * from `users` where  `id`=:contractor_id";
   

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
           
             "contractor_id" => $event_encoded["contractor_id"]
            ));
    $result1 = $statement1->fetch();
            $message =$result1->first_name.' '.$result1->middle_name.' '.$result1->last_name.' has declined WO No. '.$result2->order_number;
       $ongoing_query = "Insert into `notification` set `user_id`=1,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "message" => $message,
            "order_number" => $result2->order_number,
            "notification_date" => date('Y-m-d h:i:s')
            ));     
            
            
            
            
            
            
            
            
            $meal['status']="Declined";
        
    }
    $parent['status']='yes';
    
}
else if($event_encoded["actiontype"] == "profile_click") {
    $status = $event_encoded['status'];
    if($status=='approve')
    {
       /* $ongoing_query1 = "Delete from contractor_availability where `wo_id`=:wo_id and `contractor_id`=:contractor_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"],
            "contractor_id" => $event_encoded["user_id"]
            ));*/
             $ongoing_query1 = "Delete from `post_user` where  `wo_id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"]
             
            ));
            
            
             $ongoing_query1 = "Update contractor_availability set `status`='Approved' where `ca_id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
            "id" => $event_encoded["id"]
            ));
        
        $ongoing_query1 = "Update orders set `status`='Assigned',`contractor_id`=:contractor_id where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"],
            "contractor_id" => $event_encoded["user_id"]
            
            ));  
            
            $ongoing_query1 = "select * from orders where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"]
            
            
            )); 
            
            $re = $statement1->fetch();
            
            $order_number =$re->order_number;
            $fcmMsg = array(
            'body' => "Connectra has assigned ".$order_number." WO to you",
            'title' => "Assigned Work Order",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
         $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$event_encoded["user_id"]));
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
          /*  $fcmMsg = array(
            'body' => "Check In required for ".$order_number." WO",
            'title' => "Check In Required",
            'sound' => "default",
                'color' => "#203E78" 
        );
        
        foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
        
        
            
        $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Check In',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "order_number"=>$order_number,
            "message" => "Check In required for ".$order_number." WO",
            "notification_date" => date('Y-m-d h:i:s')
            ));*/
            
    $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
            "order_number"=>$order_number,
            "message" => "Connectra has assigned ".$order_number." WO to you",
            "notification_date" => date('Y-m-d h:i:s')
            ));
       
       
       
       
       
            
            
            
            $meal['status']="Accepted";
    }
     if($status=='decline')
    {
        $ongoing_query1 = "Delete from contractor_availability where  ca_id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "id" => $event_encoded["id"]
            ));
            
            
            
         $ongoing_query1 = "select * from orders where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
            "wo_id" => $event_encoded["wo_id"]
            
            
            )); 
            
            $re = $statement1->fetch();
            
            $order_number =$re->order_number;
            $fcmMsg = array(
            'body' => "Connectra has declined ".$order_number." WO",
            'title' => "Declined Work Order",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
         $query_device = "select * from `user_device` where  `user_id`=:user_id and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$event_encoded["user_id"]));
    $result_devices = $statement_device->fetchAll();
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
       
            
        
        
            
        $ongoing_query = "Insert into `notification` set `user_id`=:user_id,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "user_id"=>$event_encoded["user_id"],
           "order_number"=>$order_number,
            "message" => "Connectra has declined ".$order_number." WO",
            "notification_date" => date('Y-m-d h:i:s')
            ));
                
            
            
            
            
            
            
            $meal['status']="Declined";
        
    }
    $parent['status']='yes';
    
}
else if($event_encoded["actiontype"] == "count") {
     $ongoing_query = "SELECT * from notification_count where `notification_id`=:notification_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( 
                "notification_id"=>$event_encoded["notification_id"]
                ));
            $new=$statement->rowCount();
            if($new==0)
            {
                $ongoing_query1 = "Insert into notification_count set `count`=1 , `notification_id`=:notification_id ";
            $statement1 = $pdo->prepare($ongoing_query1);
            $statement1->execute(array( 
                "notification_id"=>$event_encoded["notification_id"]
                ));
            }
            $parent["status"]="yes";
}
else if($event_encoded["actiontype"] == "count_tech") {
     $ongoing_query = "SELECT * from notification_count_tech where `notification_id`=:notification_id and user_id=:user_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( 
                "notification_id"=>$event_encoded["notification_id"],
                "user_id"=>$event_encoded["user_id"]
                ));
            $new=$statement->rowCount();
            if($new==0)
            {
                $ongoing_query1 = "Insert into notification_count_tech set `count`=1 , `notification_id`=:notification_id,user_id=:user_id ";
            $statement1 = $pdo->prepare($ongoing_query1);
            $statement1->execute(array( 
                "notification_id"=>$event_encoded["notification_id"],
                "user_id"=>$event_encoded["user_id"]
                ));
            }
            $parent["status"]="yes";
}
else if($event_encoded["actiontype"] == "bell_notification") {
    if($event_encoded["user_id"]==1)
    {
        $i=0;
        $notofication_query = "SELECT * from notification where user_id!=0 order by notification_id DESC";
    
        $statement_notification = $pdo->prepare($notofication_query);
    
        $statement_notification->execute(array());
    
        $notifications = $statement_notification->fetchAll();
        $j=0;
        foreach($notifications as $notification)
        {
            $i++;
            $wo_query = "SELECT * from orders where `order_number`=:order_number";
        
                    $statement_wo = $pdo->prepare($wo_query);
            
                    $statement_wo->execute(array(
                 
                   
                    "order_number" => $notification->order_number
                    ));
            
                    $result_wo = $statement_wo->fetch();
                    $wo_id = $result_wo->id;
                    
                    $ongoing_query = "SELECT * from notification_count where `notification_id`=:notification_id";
                $statement = $pdo->prepare($ongoing_query);
                $statement->execute(array( 
                    "notification_id"=>$notification->notification_id
                    ));
                $new=$statement->rowCount();
            $meal[$j]["notofication_date"]=$notification->notification_date;
            $meal[$j]["message"]=$notification->message;
            $meal[$j]["notification_type"]=$notification->notification_type;
            $meal[$j]["notification_id"]=$notification->notification_id;
            $meal[$j]["order_number"]=$notification->order_number;
            $meal[$j]["wo_id"]=$wo_id;
            if($new==1)
            {
                $meal[$j]["seen"]=1;
            }
            else
            {
                 $meal[$j]["seen"]=0;
            }
        
            if($notification->user_id==1)
            {
                $meal[$j]["type"]='Received';
            }
            else
            {
                $meal[$j]["type"]='Sent';
            }
            $j++;
        }
    }
    else
    {
        $i=0;
        $notofication_query = "SELECT * from notification where user_id =:user_id order by notification_id DESC";
    
        $statement_notification = $pdo->prepare($notofication_query);
    
        $statement_notification->execute(array("user_id"=>$event_encoded["user_id"]));
    
        $notifications = $statement_notification->fetchAll();
        $j=0;
        foreach($notifications as $notification)
        {
            $i++;
            $wo_query = "SELECT * from orders where `order_number`=:order_number";
        
                    $statement_wo = $pdo->prepare($wo_query);
            
                    $statement_wo->execute(array(
                 
                   
                    "order_number" => $notification->order_number
                    ));
            
                    $result_wo = $statement_wo->fetch();
                    $wo_id = $result_wo->id;
                    
                    $ongoing_query = "SELECT * from notification_count_tech where `notification_id`=:notification_id and user_id=:user_id";
                $statement = $pdo->prepare($ongoing_query);
                $statement->execute(array( 
                    "notification_id"=>$notification->notification_id,
                    "user_id"=>$event_encoded["user_id"]
                    ));
                $new=$statement->rowCount();
            $meal[$j]["notofication_date"]=$notification->notification_date;
            $meal[$j]["message"]=$notification->message;
            $meal[$j]["notification_type"]=$notification->notification_type;
            $meal[$j]["notification_id"]=$notification->notification_id;
            $meal[$j]["order_number"]=$notification->order_number;
            $meal[$j]["wo_id"]=$wo_id;
            if($new==1)
            {
                $meal[$j]["seen"]=1;
            }
            else
            {
                 $meal[$j]["seen"]=0;
            }
        
            if($notification->user_id==1)
            {
                $meal[$j]["type"]='Received';
            }
            else
            {
                $meal[$j]["type"]='Sent';
            }
            $j++;
        }
    }
    if($i>0)
    {
        $parent["status"]="yes";
    }
    else
    {
        $parent["status"]="no";
    }
}
else if($event_encoded["actiontype"] == "notification") {
    $wo_query = "SELECT * from orders where `id`=:id";
    
                $statement_wo = $pdo->prepare($wo_query);
        
                $statement_wo->execute(array(
             
               
                "id" => $event_encoded["wo_id"]
                ));
        
                $result_wo = $statement_wo->fetch();
                $order_number = $result_wo->order_number;
    
            if($event_encoded["notification_type"]=="all")
            {
                $i=0;
                $notofication_query = "SELECT * from notification where `user_id`=:id and `order_number`=:order_number order by notification_id DESC";
    
                $statement_notification = $pdo->prepare($notofication_query);
        
                $statement_notification->execute(array(
             
               
                "id" => $event_encoded["user_id"],
                "order_number"=>$order_number
                ));
        
                $notifications = $statement_notification->fetchAll();
                $j=0;
                foreach($notifications as $notification)
                {
                    $i++;
                    $meal[$j]["notofication_date"]=$notification->notification_date;
                    $meal[$j]["message"]=$notification->message;
                    $j++;
                }
                if($i>0)
                {
                    $parent["status"]="yes";
                }
                else
                {
                    $parent["status"]="no";
                }
            }
            if($event_encoded["notification_type"]=="checkout")
            {
                $i=0;
                $notofication_query = "SELECT * from notification where `user_id`=:id and notification_type='Check Out' and   `order_number`=:order_number order by notification_id DESC";
    
                $statement_notification = $pdo->prepare($notofication_query);
        
                $statement_notification->execute(array(
             
               
                "id" => $event_encoded["user_id"],
                "order_number"=>$order_number
                ));
        
                $notifications = $statement_notification->fetchAll();
                $j=0;
                foreach($notifications as $notification)
                {
                    $i++;
                    $meal[$j]["notofication_date"]=$notification->notification_date;
                    $meal[$j]["message"]=$notification->message;
                    $j++;
                }
                if($i>0)
                {
                    $parent["status"]="yes";
                }
                else
                {
                    $parent["status"]="no";
                }
            }
            if($event_encoded["notification_type"]=="checkin")
            {
                $i=0;
                $notofication_query = "SELECT * from notification where `user_id`=:id and notification_type='Check In' and  `order_number`=:order_number order by notification_id DESC";
    
                $statement_notification = $pdo->prepare($notofication_query);
        
                $statement_notification->execute(array(
             
               
                "id" => $event_encoded["user_id"],
                "order_number"=>$order_number
                ));
        
                $notifications = $statement_notification->fetchAll();
                $j=0;
                foreach($notifications as $notification)
                {
                    $i++;
                    $meal[$j]["notofication_date"]=$notification->notification_date;
                    $meal[$j]["message"]=$notification->message;
                    $j++;
                }
                if($i>0)
                {
                    $parent["status"]="yes";
                }
                else
                {
                    $parent["status"]="no";
                }
            }
            if($event_encoded["notification_type"]=="other")
            {
                $i=0;
                $notofication_query = "SELECT * from notification where `user_id`=:id and notification_type='Other' and  `order_number`=:order_number order by notification_id DESC";
    
                $statement_notification = $pdo->prepare($notofication_query);
        
                $statement_notification->execute(array(
             
               
                "id" => $event_encoded["user_id"],
                "order_number"=>$order_number
                ));
        
                $notifications = $statement_notification->fetchAll();
                $j=0;
                foreach($notifications as $notification)
                {
                    $i++;
                    $meal[$j]["notofication_date"]=$notification->notification_date;
                    $meal[$j]["message"]=$notification->message;
                    $j++;
                }
                if($i>0)
                {
                    $parent["status"]="yes";
                }
                else
                {
                    $parent["status"]="no";
                }
            }
       if($event_encoded["notification_type"]=="ETA")
            {
                $i=0;
                $notofication_query = "SELECT * from notification where `user_id`=:id and notification_type='ETA' and `order_number`=:order_number order by notification_id DESC";
    
                $statement_notification = $pdo->prepare($notofication_query);
        
                $statement_notification->execute(array(
             
               
                "id" => $event_encoded["user_id"],
                "order_number"=>$order_number
                ));
        
                $notifications = $statement_notification->fetchAll();
                $j=0;
                foreach($notifications as $notification)
                {
                    $i++;
                    $meal[$j]["notofication_date"]=$notification->notification_date;
                    $meal[$j]["message"]=$notification->message;
                    $j++;
                }
                if($i>0)
                {
                    $parent["status"]="yes";
                }
                else
                {
                    $parent["status"]="no";
                }
            }
       
}        
else if($event_encoded["actiontype"] == "dashboard") {
    $ongoing_query1 = "SELECT * from users where `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $event_encoded["user_id"]
            ));
        
        $result1 = $statement1->fetch();
        $user_role = $result1->user_role;
        if($user_role==1)
        {
            $ongoing_query = "SELECT * from orders where `status`='New'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Orders_new']=$new;
            
            $ongoing_query = "SELECT * from orders where `status`='Ready for approval'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Orders_forapprove']=$new;
            
            $ongoing_query = "SELECT * from orders where `status`='Ready to Assign'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Orders_readytoassign']=$new;
            
            $ongoing_query = "SELECT * from orders where `status` in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it')";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
             $new=$statement->rowCount();
              $assigned_orders=$statement->fetchAll();
            $k=0;
            foreach($assigned_orders as $assigned_order)
            {
               
                 $ongoing_query1 = "SELECT * from `checkin` where wo_id=:wo_id";
            $statement1 = $pdo->prepare($ongoing_query1);
            $statement1->execute(array("wo_id"=>$assigned_order->id));
             $new1=$statement1->rowCount();
             if($new1>0)
             $k++;
            }
            
            
            
            $meal['Orders_assigned']=$new-$k;
            
            
            
            $ongoing_query = "SELECT * from orders where `status`='Approved'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Order_approved']=$new;
            
            $ongoing_query = "SELECT * from orders where `status`='Paid'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Order_paid']=$new;
            
            $ongoing_query = "SELECT orders.title,orders.status,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `checkin` ON orders.id=checkin.wo_id where  checkin.wo_status='Check In' and orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') order by id desc";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Order_checkedin']=$new;
            
            $ongoing_query = "SELECT orders.title,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `checkin` ON orders.id=checkin.wo_id where  checkin.wo_status='Check Out' and orders.status!='Paid' and orders.status!='Approved' and orders.status!='Ready for approval' order by id desc";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            
            $assigned_orders=$statement->fetchAll();
            $k=0;
            foreach($assigned_orders as $assigned_order)
            {
              // echo $assigned_order->id.'</br>';
                 $ongoing_query1 = "SELECT * from `orders` where id=:wo_id and status in ('Ready for approval','Paid','Approved')";
            $statement1 = $pdo->prepare($ongoing_query1);
            $statement1->execute(array("wo_id"=>$assigned_order->wo_id));
              $new1=$statement1->rowCount();
             if($new1>0)
             $k++;
            }
            
           
            
            $meal['Order_checkedout']=$new-$k;
            
            $meal['Order_scheduling']=0;
            
            $ongoing_query = "SELECT * from notification_count";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $seen_count=$statement->rowCount();
            
            $ongoing_query = "SELECT * from notification where user_id!=0";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $notification_count=$statement->rowCount();
            $meal['notification_count']=$notification_count-$seen_count;
        }
         if($user_role==5)
        {
            $ongoing_query = "SELECT * from orders where `status`='New'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Orders_new']=$new;
            
            $ongoing_query = "SELECT * from orders where `status`='Ready for approval' and contractor_id=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id'] ));
            $new=$statement->rowCount();
            $meal['Orders_forapprove']=$new;
            
            $ongoing_query = "SELECT * from orders where `status`='Ready to Assign'";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array( ));
            $new=$statement->rowCount();
            $meal['Orders_readytoassign']=$new;
            
            $ongoing_query = "SELECT * from orders where `status` in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') and contractor_id=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id'] ));
            $new = $statement->rowCount();
            $assigned_orders=$statement->fetchAll();
            $k=0;
            foreach($assigned_orders as $assigned_order)
            {
               
                 $ongoing_query1 = "SELECT * from `checkin` where wo_id=:wo_id";
            $statement1 = $pdo->prepare($ongoing_query1);
            $statement1->execute(array("wo_id"=>$assigned_order->id));
             $new1=$statement1->rowCount();
             if($new1>0)
             $k++;
            }
            
            
            
            $meal['Orders_assigned']=$new-$k;
            
            $ongoing_query = "SELECT * from orders where `status`='Approved' and contractor_id=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id']));
            $new=$statement->rowCount();
            $meal['Order_approved']=$new;
            
            $ongoing_query = "SELECT * from orders where `status`='Paid' and contractor_id=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id'] ));
            $new=$statement->rowCount();
            $meal['Order_paid']=$new;
            
            $ongoing_query = "SELECT checkin.wo_status,checkin.wo_id from checkin INNER JOIN orders ON checkin.wo_id=orders.id  where checkin.wo_status='Check In' and orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') and orders.contractor_id=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id']));
            $new=$statement->rowCount();
            $meal['Order_checkedin']=$new;
            
            $ongoing_query = "SELECT checkin.wo_status,checkin.wo_id from checkin INNER JOIN orders ON checkin.wo_id=orders.id  where checkin.wo_status='Check Out' and orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') and orders.contractor_id=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id']));
            $new=$statement->rowCount();
            
            $assigned_orders=$statement->fetchAll();
            $k=0;
            foreach($assigned_orders as $assigned_order)
            {
              // echo $assigned_order->id.'</br>';
                 $ongoing_query1 = "SELECT * from `orders` where id=:wo_id and status in ('Ready for approval','Paid','Approved')";
            $statement1 = $pdo->prepare($ongoing_query1);
            $statement1->execute(array("wo_id"=>$assigned_order->wo_id));
              $new1=$statement1->rowCount();
             if($new1>0)
             $k++;
            }
            
            $meal['Order_checkedout']=$new-$k;
            
            $ongoing_query = "SELECT * from post_user where `contractor_id`=:contractor_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("contractor_id"=>$event_encoded['user_id'] ));
            $new=$statement->rowCount();
            $meal['Order_scheduling']=$new;
            
            $ongoing_query = "SELECT * from notification_count_tech where user_id=:user_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("user_id"=>$event_encoded['user_id'] ));
            $seen_count=$statement->rowCount();
            
            $ongoing_query = "SELECT * from notification where user_id=:user_id";
            $statement = $pdo->prepare($ongoing_query);
            $statement->execute(array("user_id"=>$event_encoded['user_id'] ));
            $notification_count=$statement->rowCount();
            $meal['notification_count']=$notification_count-$seen_count;
        }
        
    
        $parent['status']='yes';
             
}
else if($event_encoded["actiontype"] == "availability_sent") {
    $ongoing_query1 = "Insert into `contractor_availability` set  `wo_id`=:wo_id, `contractor_id`=:contractor_id  ";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["user_id"]
            ));
            $ongoing_query1 = "Delete from `post_user` where  `wo_id`=:wo_id and  `contractor_id`=:contractor_id  ";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"],
             "contractor_id" =>  $event_encoded["user_id"]
            ));
            
            $ongoing_query1 = "Update `orders` set `status`='Ready to assign'  Where `id`=:wo_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "wo_id" =>  $event_encoded["wo_id"],
            
            ));
             $parent['status']='yes';
             $meal['wo_id']=$event_encoded["wo_id"];
              $meal['contractor_id']=$event_encoded["user_id"];
              
              
              
             $query_device = "select * from `user_device` where  `user_id`=1 and `device_type`='Android'";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    
    $ongoing_query = "select * from `orders` where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            "id" => $event_encoded["wo_id"]
            ));
    $result2 = $statement->fetch();
    
    $body ='Technician has sent availability for WO No. '.$result2->order_number;
    
    $fcmMsg = array(
            'body' => $body,
            'title' => "Availability Sent",
            'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$event_encoded["wo_id"],
            'sound' => "default",
                'color' => "#203E78" 
        );
    foreach($result_devices as $result_device)
    {
        $token = $result_device->token;
        //echo $token.'</br>';
        $fcmFields = array(
            'to' => $token,
                'priority' => 'high',
            'notification' => $fcmMsg,
            'data'=>array('tag'=>$event_encoded["wo_id"])
        );

        $headers = array(
             'Authorization: key=' .$key,
            'Content-Type: application/json'
        );
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        
        curl_close( $ch );
            }
            
            
            $ongoing_query1 = "select * from `users` where  `id`=:contractor_id";
   

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
           
             "contractor_id" => $event_encoded["user_id"]
            ));
    $result1 = $statement1->fetch();
            $message =$result1->first_name.' '.$result1->middle_name.' '.$result1->last_name.' has sent availability for WO No. '.$result2->order_number;
       $ongoing_query = "Insert into `notification` set `user_id`=1,`notification_type`='Other',message=:message,notification_date=:notification_date,order_number=:order_number";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "message" => $message,
            "order_number" => $result2->order_number,
            "notification_date" => date('Y-m-d h:i:s')
            ));       
              
              
}
else if($event_encoded["actiontype"] == "available") {
    $ongoing_query1 = "SELECT * from `contractors_details` where  `contractor_id_fk`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" =>  $event_encoded["user_id"]
            ));
    $result1 = $statement1->fetch();
    $contractor_lat = $result1->contractor_latitude;
    $contractor_long = $result1->contractor_longitude;
    
    
    $ongoing_query_order = "SELECT orders.created,orders.final_normal,orders.order_number,orders.title,orders.id,orders.enduserzipcode,orders.status from `orders` INNER JOIN `post_user` ON orders.id=post_user.wo_id where  post_user.contractor_id=:id order by orders.id desc";

        $statement_order = $pdo->prepare($ongoing_query_order);

        $statement_order->execute(array(
         
           
            "id" =>  $event_encoded["user_id"]
            ));
    $num_rows=$statement_order->rowCount();
    $results = $statement_order->fetchAll();
    if($num_rows > 0)
    {
        $parent['status']='yes';
         $i=0;
         foreach($results as $result)
        {
            $zip =  str_replace(' ', '', $result->enduserzipcode);;
            $url="https://maps.google.com/maps/api/geocode/json?address=".$zip."&sensor=false&key=AIzaSyCAbxvGjMV2f6QMqcIANSPjtqNOgpF9Z1U";
            $response = file_get_contents($url);
            $response = json_decode($response, true);
            //echo '<pre>';print_r($response);echo '</pre>';
  
          $lat = $response['results'][0]['geometry']['location']['lat'];
          $long = $response['results'][0]['geometry']['location']['lng'];
  
            $earthRadius = 6371000;
               $latFrom = deg2rad($lat);
              $lonFrom = deg2rad($long);
              $latTo = deg2rad($contractor_lat);
              $lonTo = deg2rad($contractor_long);

              $latDelta = $latTo - $latFrom;
              $lonDelta = $lonTo - $lonFrom;
            
              $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                $distance = ($angle * $earthRadius)/1000;
    
             $meal[$i]['wo_status']=$result->status;
              $meal[$i]['created']=$result->final_normal;
              $meal[$i]['order_number']=$result->order_number;
              $meal[$i]['title']=$result->title;
              $meal[$i]['id']=$result->id;
               $meal[$i]['distance']=$distance;
               $meal[$i]['available_status']='available';
              $i++;
        }
    }
    else
    {
       $parent['status']='no'; 
    }
    
    
    
    /* $ongoing_query = "SELECT * from `orders` where  `status` in ('Ready to Assign','New') order by `id` desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array());
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
         
         
          $zip =  str_replace(' ', '', $result->enduserzipcode);;
$url="https://maps.google.com/maps/api/geocode/json?address=".$zip."&sensor=false&key=AIzaSyCAbxvGjMV2f6QMqcIANSPjtqNOgpF9Z1U";
  $response = file_get_contents($url);
   $response = json_decode($response, true);
  
  
  $lat = $response['results'][0]['geometry']['location']['lat'];
  $long = $response['results'][0]['geometry']['location']['lng'];
  
  $earthRadius = 6371000;
   $latFrom = deg2rad($lat);
  $lonFrom = deg2rad($long);
  $latTo = deg2rad($contractor_lat);
  $lonTo = deg2rad($contractor_long);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    $distance = ($angle * $earthRadius)/1000;
  
    
    $ongoing_query5 = "SELECT * from `post_in_market` where  `wo_id`=:wo_id";

        $statement5 = $pdo->prepare($ongoing_query5);

        $statement5->execute(array(
         
           
            "wo_id" => $result->id
            ));
        
         $num_rows5=$statement5->rowCount();
         
    if($distance<=50 && $num_rows5>0)
    {
        $ongoing_query12 = "SELECT * from `contractor_availability` where  `contractor_id`=:contractor_id and `wo_id`=:wo_id and status='pending'";

        $statement12 = $pdo->prepare($ongoing_query12);

        $statement12->execute(array(
         
           
            "wo_id" =>  $result->id,
            "contractor_id" =>  $event_encoded["user_id"]
            ));
            $num_rows12=$statement12->rowCount();
            
            $ongoing_query123 = "SELECT * from `contractor_availability` where  `contractor_id`=:contractor_id and `wo_id`=:wo_id and status='Approved'";

        $statement123 = $pdo->prepare($ongoing_query123);

        $statement123->execute(array(
         
           
            "wo_id" =>  $result->id,
            "contractor_id" =>  $event_encoded["user_id"]
            ));
            $num_rows123=$statement123->rowCount();
    if($num_rows12>0)
    {
        $meal[$i]['available_status']='availability sent';
    }
    else if($num_rows123>0)
    {
        $meal[$i]['available_status']='approved';
    }
    else
    {
        $meal[$i]['available_status']='available';
    }
   
    
  
          $meal[$i]['wo_status']=$result->status;
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
           $meal[$i]['distance']=$distance;
          $i++;
    }
    }
    }
    if($i>0)
    {
       $parent['status']='yes';
          
    }
    else
    {
       $parent['status']='no';
    }*/
}
else if($event_encoded["actiontype"] == "ready_to_assign") {
    
    
    $ongoing_query = "SELECT * from `orders` where  `status`=:status order by `id` desc";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Ready to Assign"
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          $meal[$i]['technician_name']="";  
          $meal[$i]['wo_status']="Ready to assign";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
}
else if($event_encoded["actiontype"] == "event") {
    
    
    $ongoing_query = "SELECT * from `orders` where  `id`=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "id" => $event_encoded['wo_id']
            ));
        
        
        $parent['status']='yes';
      
        $result= $statement->fetch();
       
          
          $meal['travel_deration']=$result->trip;
          $meal['start_time']=$result->time_start;
          $meal['order_number']=$result->order_number;
          $meal['title']=$result->title;
          $meal['id']=$result->id;
          
   
}
else if($event_encoded["actiontype"] == "ready_for_approval") {
    
    
    $ongoing_query1 = "SELECT * from users where `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $event_encoded["user_id"]
            ));
        
        $result1 = $statement1->fetch();
        $user_role = $result1->user_role;
        if($user_role==1)
        {
        
     $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.status=:status order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Ready for approval"
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['wo_status']="Ready for approval";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
        if($user_role==5)
        {
        
     $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.status=:status and orders.contractor_id=:user_id order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Ready for approval",
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
          
          
          $meal[$i]['wo_status']="Ready for approval";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
}
else if($event_encoded["actiontype"] == "checkout_check") {
    
    $checkin_query = "SELECT * from `checkin` where   `wo_status`='Check In' and `wo_id`=:wo_id";

        $statement_checkin = $pdo->prepare($checkin_query);

        $statement_checkin->execute(array(
         
           
            
            "wo_id" => $event_encoded["wo_id"]
            ));
        
         $num_rows_checkin=$statement_checkin->rowCount();
         
         
         
         $d_query = "SELECT * from `orders` where `id`=:wo_id";

        $statement_d = $pdo->prepare($d_query);

        $statement_d->execute(array(
         
           
            
            "wo_id" => $event_encoded["wo_id"]
            ));
        $result1 = $statement_d->fetch();
        $timeline= $result1->timeline;
        $required_deliverable= $result1->required_deliverable;
        if($timeline==1)
        {
            $timeline_query = "SELECT * from `timeline` where  `wo_id`=:wo_id";

            $statement_timeline = $pdo->prepare($timeline_query);
    
            $statement_timeline->execute(array(
             
               
                
                "wo_id" => $event_encoded["wo_id"]
                ));
            
             $num_rows_timeline=$statement_timeline->rowCount();
             if($num_rows_timeline==0)
             {
                 $meal['timeline_status']='timeline is required';
             }
             else
             {
                 $meal['timeline_status']='';
             }
            
        }
        else
        {
            $meal['timeline_status']='';
        }
        if($required_deliverable==1)
        {
            $timeline_query = "SELECT * from `order_delivarable` where  `wo_id`=:wo_id";

            $statement_timeline = $pdo->prepare($timeline_query);
    
            $statement_timeline->execute(array(
             
               
                
                "wo_id" => $event_encoded["wo_id"]
                ));
            
             $num_rows_deliverable=$statement_timeline->rowCount();
             $timeline_query = "SELECT * from `upload_deliverable` where  `wo_id`=:wo_id and deliverable_status!='declined'";

            $statement_timeline = $pdo->prepare($timeline_query);
    
            $statement_timeline->execute(array(
             
               
                
                "wo_id" => $event_encoded["wo_id"]
                ));
                 $num_rows_deliverable1=$statement_timeline->rowCount();
                if($num_rows_deliverable1<$num_rows_deliverable)
                {
                 $meal['deliverable_status']='deliverable is required';
                }
                else
                {
                    $meal['deliverable_status']='';
                }
            
        }
        else
        {
            $meal['deliverable_status']='';
        }
        if($num_rows_checkin==0)
        {
            $meal['checkin_status']='checkin is required';
        }
        else
        {
            $meal['checkin_status']='';
        }
         if($num_rows_checkin!=0 && $meal['deliverable_status']=='' && $meal['timeline_status']=='')
         {
             $parent["status"]="yes";
         }
         else
         {
             $parent["status"]="no"; 
         }
}
else if($event_encoded["actiontype"] == "assigned") {
    
    
    $ongoing_query1 = "SELECT * from users where `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $event_encoded["user_id"]
            ));
        
        $result1 = $statement1->fetch();
        $user_role = $result1->user_role;
        if($user_role==1)
        {
        
     $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.final_normal,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array());
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          $checkin_query = "SELECT * from `checkin` where   `wo_status` in('Check Out','Check In') and `wo_id`=:wo_id";

        $statement_checkin = $pdo->prepare($checkin_query);

        $statement_checkin->execute(array(
         
           
            
            "wo_id" => $result->id
            ));
        
         $num_rows_checkin=$statement_checkin->rowCount();
         if($num_rows_checkin==0)
         {
          $meal[$i]['availability_status']='';
          $meal[$i]['ca_id']='';
          $meal[$i]['contractor_id']='';
          $meal[$i]['wo_status']="Assigned";
          $meal[$i]['created']=$result->final_normal;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
         }
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
        if($user_role==5)
        {
        
     $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.final_normal,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') and orders.contractor_id=:user_id order by id desc";

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
             $checkin_query = "SELECT * from `checkin` where   `wo_status` in('Check Out','Check In') and `wo_id`=:wo_id";

        $statement_checkin = $pdo->prepare($checkin_query);

        $statement_checkin->execute(array(
         
           
            
            "wo_id" => $result->id
            ));
        
         $num_rows_checkin=$statement_checkin->rowCount();
         if($num_rows_checkin==0)
         {
            $availability_query = "SELECT * from `contractor_availability` where  `contractor_id`=:contractor_id  and `status`='Approved' and `wo_id`=:wo_id order by `ca_id` desc";

        $statement_availability = $pdo->prepare($availability_query);

        $statement_availability->execute(array(
         
           
            "contractor_id" => $event_encoded["user_id"],
            "wo_id" => $result->id
            ));
        
         $num_rows_availability=$statement_availability->rowCount();
         $result_availability = $statement_availability->fetch();
            if($num_rows_availability>0)
            {
                $meal[$i]['availability_status']=1;
            }
            else
            {
                $meal[$i]['availability_status']=0;
            }
          $meal[$i]['ca_id']=$result_availability->ca_id;
          $meal[$i]['contractor_id']=$event_encoded["user_id"];
          $meal[$i]['wo_status']="Assigned";
          $meal[$i]['created']=$result->final_normal;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
}
else if($event_encoded["actiontype"] == "paid") {
    
    
   $ongoing_query1 = "SELECT * from users where `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $event_encoded["user_id"]
            ));
        
        $result1 = $statement1->fetch();
        $user_role = $result1->user_role;
        if($user_role==1)
        {
     $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` INNER join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where  orders.status=:status order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Paid"
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['wo_status']="Paid";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
        if($user_role==5)
        {
     $ongoing_query = "SELECT contractors_details.contractor_latitude,contractors_details.contractor_longitude,orders.title,orders.enduserzipcode,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `contractors_details` ON orders.contractor_id=contractors_details.contractor_id_fk where orders.status=:status and orders.contractor_id=:user_id order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Paid",
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
          
          
          $meal[$i]['wo_status']="Paid";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
}
else if($event_encoded["actiontype"] == "checked_in") {
    
    
   $ongoing_query1 = "SELECT * from users where `id`=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           
            "id" => $event_encoded["user_id"]
            ));
        
        $result1 = $statement1->fetch();
        $user_role = $result1->user_role;
        if($user_role==1)
        {
            $ongoing_query= "SELECT orders.title,orders.status,orders.created,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `checkin` ON orders.id=checkin.wo_id where  checkin.wo_status=:status and orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') and orders.status!='Paid' and orders.status!='Approved' and orders.status!='Ready for approval' order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Check In"
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';
      
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          
          $meal[$i]['wo_status']="Checked In";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
        if($user_role==5)
        {
     $ongoing_query = "SELECT orders.title,orders.created,orders.status,orders.order_number,orders.id,orders.contractor_id,users.first_name,users.last_name,users.middle_name FROM `orders` inner join `users` ON orders.contractor_id=users.id INNER JOIN `checkin` ON orders.id=checkin.wo_id where  checkin.wo_status=:status  and orders.status in ('Assigned','I am in route-use my location to determine my ETA','I will arrive on time','I will be late','I will not make it') and orders.status!='Paid' and orders.status!='Approved' and orders.status!='Ready for approval' and orders.contractor_id=:user_id order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "status" => "Check In",
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
          
          
          $meal[$i]['wo_status']="Checked In";
          $meal[$i]['created']=$result->created;
          $meal[$i]['order_number']=$result->order_number;
          $meal[$i]['title']=$result->title;
          $meal[$i]['id']=$result->id;
          $meal[$i]['technician_name'] = $result->first_name." ".$result->middle_name." ".$result->last_name;
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
        }
}

 else if($event_encoded["actiontype"] == "get_review") {

  $ongoing_query = "SELECT * from dental_review where provider_id=:provider_id order by id desc";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
            "provider_id" =>$event_encoded['provider_id']
           
            ));
        
         $num_rows=$statement->rowCount();

    if($num_rows > 0)
    {
        $parent['status']='yes';

      $ongoing_query1 = "SELECT avg(`rating`) as `rating` from dental_review where  provider_id=:provider_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $result2 = $statement1->fetch();
$parent['avg_rating'] = $result2->rating;
$parent['rating_count'] = $num_rows;

$ongoing_query1 = "SELECT * from dental_review where  provider_id=:provider_id and rating=1";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count1'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dental_review where  provider_id=:provider_id and rating=2";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count2'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dental_review where  provider_id=:provider_id and rating=3";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count3'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dental_review where  provider_id=:provider_id and rating=4";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count4'] = $rating_count1;
        $ongoing_query1 = "SELECT * from dental_review where  provider_id=:provider_id and rating=5";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "provider_id" =>$event_encoded['provider_id']
         
           
           
            ));
        $rating_count1=$statement1->rowCount();
        $parent['rating_count5'] = $rating_count1;
        $results = $statement->fetchAll();
        $i=0;
         foreach($results as $result)
        {
          
          $ongoing_query1 = "SELECT * from dental_user where  id=:id order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->user_id
         
           
           
            ));
        $result1 = $statement1->fetch();
          
          $meal[$i]['review']=$result->review;
          $meal[$i]['rating']=$result->rating;
          $meal[$i]['name']=$result1->fullname;
          $meal[$i]['id']=$result->id;
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
else if($event_encoded["actiontype"] == "add_review") {
	
	$ongoing_query = "SELECT * from dental_review where provider_id=:provider_id and user_id=:user_id";


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
	  $ongoing_query = "Insert into `dental_review` set `provider_id`=:provider_id,`rating`=:rating,review=:review,user_id=:user_id";
   

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
else if($event_encoded["actiontype"] == "questionnaire") {
	$question_id = implode(',',json_decode($event_encoded["question_id"]));
	$answer = implode(',',json_decode($event_encoded["answer_id"]));
	  $ongoing_query = "Insert into `dental_questionnaire` set `cat_id`=:cat_id,`question_id`=:question_id,answer=:answer,user_id=:user_id";
   

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

    $ongoing_query = "Insert into `dental_patient_screening_form` set `name`=:name,`age`=:age,email=:email,phone=:phone,other=:other,staff=:staff,appointment_id=:appointment_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,answered=:answered";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "name" => $event_encoded["name"],
            "age" => $event_encoded["age"],
            "email" => $event_encoded["email"],
            "appointment_id" => $event_encoded["appointment_id"],
            "phone" => $event_encoded["phone"],
            "other" => $event_encoded["other"],
            "staff" => $event_encoded["staff"],
            "question1" => $event_encoded["question1"],
            "question2" => $event_encoded["question2"],
            "question3" => $event_encoded["question3"],
            "question4" => $event_encoded["question4"],
            "question5" => $event_encoded["question5"],
            "question6" => $event_encoded["question6"],

            "question7" => $event_encoded["question7"],
            "question8" => $event_encoded["question8"],
            

            "answered" => $event_encoded["answered"]
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
  else if($event_encoded["actiontype"] == "patient_acknowledge_form") {

    $ongoing_query = "Insert into `dental_patient_acknowledge_form` set user_id=:user_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,question9=:question9,question10=:question10";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
          
            "user_id" => $event_encoded["user_id"],
            
            "question1" => $event_encoded["question1"],
            "question2" => $event_encoded["question2"],
            "question3" => $event_encoded["question3"],
            "question4" => $event_encoded["question4"],
            "question5" => $event_encoded["question5"],
            "question6" => $event_encoded["question6"],

            "question7" => $event_encoded["question7"],
            "question8" => $event_encoded["question8"],
            "question9" => $event_encoded["question9"],
            "question10" => $event_encoded["question10"]
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
        
         
        $parent['status'] = "yes";
  }
else if($event_encoded["actiontype"] == "dental_history_form") {

    $ongoing_query = "Insert into `dental_history_form` set appointment_id=:appointment_id,question1=:question1,question2=:question2,question3=:question3,question4=:question4,question5=:question5,question6=:question6,question7=:question7,question8=:question8,question9=:question9,question10=:question10,question11=:question11,question12=:question12,question13=:question13,question14=:question14,question15=:question15,question16=:question16,question17=:question17,question18=:question18,question19=:question19,question20=:question20";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
          
            "appointment_id" => $event_encoded["appointment_id"],
            
            "question1" => $event_encoded["question1"],
            "question2" => $event_encoded["question2"],
            "question3" => $event_encoded["question3"],
            "question4" => $event_encoded["question4"],
            "question5" => $event_encoded["question5"],
            "question6" => $event_encoded["question6"],

            "question7" => $event_encoded["question7"],
            "question8" => $event_encoded["question8"],
            "question9" => $event_encoded["question9"],
            "question10" => $event_encoded["question10"],
             "question11" => $event_encoded["question11"],
            "question12" => $event_encoded["question12"],
            "question13" => $event_encoded["question13"],
            "question14" => $event_encoded["question14"],
            "question15" => $event_encoded["question15"],
            "question16" => $event_encoded["question16"],

            "question17" => $event_encoded["question17"],
            "question18" => $event_encoded["question18"],
            "question19" => $event_encoded["question19"],
            "question20" => $event_encoded["question20"]
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
         $meal['question17'] = $event_encoded["question17"];
           $meal['question18'] = $event_encoded["question18"];
         
         $meal['question19'] = $event_encoded["question19"];
          $meal['question20'] = $event_encoded["question20"];

        $parent['status'] = "yes";
  }

 
  else if($event_encoded["actiontype"] == "checkin_status") {

              $ongoing_query = "Insert into `dental_checkin_status` set `appointment_id`=:appointment_id,`checkin_status`=:checkin_status,checkin_note=:checkin_note";
   

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

else if($event_encoded["actiontype"] == "create_appointment") {

              $ongoing_query = "Insert into `dental_appointment` set `appointment_type`=:appointment_type,`provider_id`=:provider_id,note=:note,appointment_time=:appointment_time,appointment_date=:appointment_date,status='In Progress',user_id=:user_id,appointment=:appointment,scheduled_time=:scheduled_time,new_user=:new_user,office=:office";
   

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
  else if($event_encoded["actiontype"] == "gallery") {

  $ongoing_query = "SELECT * from dental_gallery order by id desc";

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
    else if($event_encoded["actiontype"] == "my_appointmeent") {

if($event_encoded["type"]=='upcoming')
{
  $ongoing_query = "SELECT * from dental_appointment where status='approved' or status='In Progress' and user_id=:user_id order by id";
}
if($event_encoded["type"]=='cancelled')
{
  $ongoing_query = "SELECT * from dental_appointment where status='cancelled' and user_id=:user_id order by id";
}
if($event_encoded["type"]=='completed')
{
  $ongoing_query = "SELECT * from dental_appointment where status='completed' and user_id=:user_id order by id";
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
          $ongoing_query1 = "SELECT * from dental_provider where  id=:id order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array( "id" =>$result->provider_id
         
           
           
            ));
        $result1 = $statement1->fetch();
          
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
         
        
          $i++;
        }
    }
    else
    {
       $parent['status']='no';
    }
  }
   else if($event_encoded["actiontype"] == "get_checkin_status") {

  $ongoing_query = "SELECT * from dental_checkin_status where appointment_id=:appointment_id order by id";

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
  else if($event_encoded["actiontype"] == "covid_question") {

  $ongoing_query = "SELECT * from dental_question where cat_id=2 order by id";

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

  $ongoing_query = "SELECT * from dental_question where cat_id=1 order by id";

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

  $ongoing_query = "SELECT * from dental_appointment_type";

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
else if($event_encoded["actiontype"] == "provider_list") {
    
    
    
     $ongoing_query = "SELECT * from dental_provider order by id desc";

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
          $ongoing_query1 = "SELECT * from dental_category where id=:id";

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
else if($event_encoded["actiontype"] == "provider_home") {
    
    
    
     $ongoing_query = "SELECT * from dental_provider where page='1' order by id desc";

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
 else if($event_encoded['actiontype'] == "login")
{



   $sel_user_query1 = "SELECT * FROM dental_user WHERE email = :email AND password=:password";

      $statement1 = $pdo->prepare($sel_user_query1);
     $statement1->execute(array(
          "email" => $event_encoded["email"],
          "password"=> md5($event_encoded["password"])
          ));
      
    $num_rows=$statement1->rowCount();

   
   
    
    if($num_rows>0){
    	$user_details = $statement1->fetch();
    	
    	
	    			$parent["status"]="yes";
			      	$meal["username"]=$user_details->username;
			      	$meal["email"]=$user_details->email;
			      	$meal["id"]=$user_details->id;
			      	$meal["fullname"]=$user_details->fullname;
			      $meal["phone"]=$user_details->phone;
			      	
			      	
			 
      
   
	    		
    	
       	
    }
    
    else{

      $parent["status"]="no";
    }


 }
else if($event_encoded["actiontype"] == "signup")
{
  $email = $event_encoded["email"];
  $username = $event_encoded["username"];
    /*if (!preg_match("/\\s/", $email))
     {*/
       
        $ongoing_query = "SELECT * FROM `dental_user` where email=:email";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
        "email" => $email));

        $num_rows = $statement->rowCount();

         $ongoing_query1 = "SELECT * FROM `dental_user` where username=:username";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
        "username" => $username));

        $num_rows1 = $statement1->rowCount();
        if($num_rows==0 && $num_rows1==0){

            $ongoing_query = "Insert into `dental_user` set `fullname`=:fullname,`email`=:email,username=:username,password=:password,phone=:phone";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            "fullname" => $event_encoded["fullname"],
            "email" => $event_encoded["email"],
            "username" => $event_encoded["username"],
            "password" => md5($event_encoded["password"]),
            "phone" => $event_encoded["phone"]
            ));  
            
                
        $meal['fullname'] = $event_encoded["fullname"];
         $meal['email'] = $event_encoded["email"];
         $meal['phone'] = $event_encoded["phone"];
         $meal['username'] = $event_encoded["username"];
         
        $meal['status'] = "yes";
        }
        if($num_rows1>0)
        {
          $meal['status'] = "username already exits";
        }
        if($num_rows>0)
        {
          $meal['status'] = "email id already exits";
        }
        

 } 

$parent['data'] = $meal;
echo json_encode($parent);