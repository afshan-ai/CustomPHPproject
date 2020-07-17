<?php
session_start();
 $username = $_SESSION['username'];
 $user_id = $_REQUEST['user_id'];
 $salt="9@4b2mkN$^)M*Hzc^i(@spjm";
include("config.php");


                                $query_device = "select * from `dental1_user` where id=:user_id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$user_id));
    $result_user = $statement_device->fetch();

     $query_device = "select * from `dental1_appointment`  where user_id=:user_id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$user_id));
    $result_user1 = $statement_device->fetch();
   
    if($result_user->profile_pic!='')
    {
    ?>
                                 <img src="../image/<?php echo $result_user->profile_pic;?>" alt="avatar">
                                 <?php
                             }
                             else
                             {
                                ?>
                                 <img src="../image/default.png" alt="avatar">
                                <?php
                             }
                             ?>
                                <div class="chat-about">
                                    <div class="chat-with"><?php echo str_replace($salt,'',base64_decode($result_user->fullname));?></div>
                                    <div class="row action">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="chat-num-messages"><i class="fa fa-phone"></i> <span><?php echo str_replace($salt,'',base64_decode($result_user->phone));?></span></div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="chat-num-messages"><i class="fa fa-envelope"></i> <span><?php echo str_replace($salt,'',base64_decode($result_user->email));?></span></div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="chat-num-messages"><i class="fa fa-calendar"></i> <span>Upcoming Appointment Date: <?php echo $result_user1->appointment_date;?></span></div>
                                        </div> 
                                    </div>
                                    
                                </div>