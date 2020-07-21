<?php
session_start();
 $username = $_SESSION['username'];
 $user_id = $_REQUEST['user_id'];
  
include("config.php");


         $time= date('Y-m-d h:i:sa');

     $ongoing_query1 = "SELECT * from `dental1_chat` where (`user_id`=:user_id and `from_user`=0) or (`from_user`=:from_user and `user_id`=0) order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         "user_id"=>$user_id,
         "from_user"=>$user_id,
           
            ));
        $results = $statement1->fetchAll();
        
        foreach($results as $result)
        {
        	if($result->from_user==0)
        	{
        	?>
        	 <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time"><?php echo $result->dt;?>
                                            </span>
                                            &nbsp; &nbsp;
                                            <span class="message-data-name">Admin</span>
                                        </div>
                                        <div class="message other-message float-right"> <?php echo str_replace($salt,'',base64_decode($result->message));?> </div>
                                    </li>
                                    <?php
        }
        else
        {
            $ongoing_query1 = "SELECT * from dental1_user where id=:user_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
         
            "user_id"=>$user_id
            ));
        $result1 = $statement1->fetch();
            
        	?>
        	<li>
                                        <div class="message-data">
                                            <span class="message-data-name"><?php echo ucfirst(str_replace($salt,'',base64_decode($result1->fullname)));?> </span>
                                            <span class="message-data-time"><?php echo $result->dt;?></span>
                                        </div>
                                        <div class="message my-message">
                                            <p><?php echo str_replace($salt,'',base64_decode($result->message));?></p>
                                            <div class="row">
                                            </div>
                                        </div>
                                    </li>
                                    <?php
        }
    }


?>   