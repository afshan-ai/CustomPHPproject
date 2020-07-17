<?php
include("config.php");

include("includes/header.php");
?>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>


<?php
$ongoing_query = "SELECT * from dental1_appointment where status='In Progress' or status='approved'";


       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows=$statement->rowCount();
        $ongoing_query = "SELECT * from dental1_appointment where status='completed'";


       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows1=$statement->rowCount();

          $ongoing_query = "SELECT * from dental1_review";


       $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
           
            ));
        
         $num_rows2=$statement->rowCount();
       
        
         ?>



<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        
        
        <div class="row adminHighlight">
 
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                        <div class="left">
                            <span class="circle"><?php echo $num_rows;?></span>
                        </div>

                        <p>
                            <span class="text">Upcoming Appointments</span>
                            <a href="appointment.php">View All <i class="fa fa-fw fa-angle-right"></i></a>
                        </p>

                    </article>
                </div>
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                        <div class="left">
                            <span class="circle"><?php echo $num_rows1;?></span>
                        </div>
                        <p>
                            <span class="text">Completed Appointments</span>
                            <a href="appointment.php">View All <i class="fa fa-fw fa-angle-right"></i></a>
                        </p>

                    </article>
                </div>
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                    <div class="left">
                            <span class="circle">2</span>
                    </div>
                    <p>
                        <span class="text">New Chats</span>
                        <a href="chat-room.php">View All <i class="fa fa-fw fa-angle-right"></i></a>
                    </p>

                    </article>
                </div>
            <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                    <div class="left">
                            <span class="circle"><?php echo $num_rows2;?></span>
                    </div>
                    <p>
                        <span class="text">Total Reviews</span>
                        <a href="reviews.php">View All <i class="fa fa-fw fa-angle-right"></i></a>
                    </p>

                    </article>
                </div>
    
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                
                <div class="hometab">
	<ul class="">
    	<li><a href="<?php SITE_ADMIN_URL ?>appointment.php" target="_parent" title="Manage Appointment"><span class="ms"></span>Appointment</a></li>
        <li><a href="<?php SITE_ADMIN_URL ?>list_users.php" target="_parent" title="List Of Users"><span class="luser"></span>List Of Users</a></li>
        <!--<li><a href="<?php SITE_ADMIN_URL ?>announcements.php" target="_parent"  title="Notifications"><span class="noti"></span>Notifications</a></li>-->
        <li><a href="<?php SITE_ADMIN_URL ?>location.php" target="_parent" title="Locations"><span class="locat"></span>Locations</a></li>
        <!-- <li><a href="<?php SITE_ADMIN_URL ?>messages.php" target="_parent" title="Messages"><span class="msg"></span>Messages</a></li> -->
        <li><a href="<?php SITE_ADMIN_URL ?>referral.php" target="_parent" title="Referrals"><span class="refe"></span>Referrals</a></li>
         <!--<li><a href="<?php SITE_ADMIN_URL ?>video.php" target="_parent" title="videos"><span class="vid"></span>Video Links</a></li>-->
         
      


         <li><a href="<?php SITE_ADMIN_URL ?>provider.php" target="_parent" title="Dentists"><span class="doc"></span>Dentists</a></li>
         <!--<li><a href="<?php SITE_ADMIN_URL ?>formlist.php" target="_parent" title="Registration Form"><span class="registration-form-ico"></span>Registration Form</a></li>-->
         <li><a href="<?php SITE_ADMIN_URL ?>offers.php" target="_parent" title="Offers"><span class="offer-ico"></span>Offers</a></li>
 <!--<li><a href="<?php SITE_ADMIN_URL ?>fetch_doctor.php" target="_parent" title="Doctors"><span class="doc"></span>Assigns Doctors</a></li>
<li><a href="<?php SITE_ADMIN_URL ?>all_category.php" target="_parent" title="Doctors"><span class="doc"></span>Serach Doctors</a></li>-->
<!--<li><a href="<?php SITE_ADMIN_URL ?>assign_location.php" target="_parent" title="Doctors"><span class="doc"></span>Assigns Doctors</a></li>-->


    </ul>
    <div style="clear:both; line-height:0; font-size:0;"></div>
</div>
            </div>
        </div>    
        
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="whiteBox">
            <h3 class="heading">Upcomming Appointments<a href="" class="linkCal">June - July</a></h3>
            
            
            <div Class="secDate">
                
                <div id="owl-demo" class="owl-carousel owl-theme">
                    
 
                        <div class="item">
                            <article>
                                <a class="link" href="#">
                                    <span class="date">20</span>
                                    <span class="day">Mon</span>
                                </a>
                            </article>
                        </div>

                        <div class="item">
                            <article>
                                <a class="link" href="#">
                                    <span class="date">21</span>
                                    <span class="day">Tue</span>
                                </a>
                            </article>
                        </div>
                        <div class="item">
                            <article>
                                <a class="link active" href="#">
                                    <span class="date">22</span>
                                    <span class="day">Wed</span>
                                </a>
                            </article>
                        </div>
                        <div class="item">
                            <article>
                                <a class="link" href="#">
                                    <span class="date">23</span>
                                    <span class="day">Thu</span>
                                </a>
                            </article>
                        </div>
                        
                        
                        <div class="item">
                            <article>
                                <a class="link" href="#">
                                    <span class="date">24</span>
                                    <span class="day">Fri</span>
                                </a>
                            </article>
                        </div>
                        <div class="item">
                            <article>
                                <a class="link" href="#">
                                    <span class="date">25</span>
                                    <span class="day">Sat</span>
                                </a>
                            </article>
                        </div>
                        <div class="item">
                            <article>
                                <a class="link" href="#">
                                    <span class="date">26</span>
                                    <span class="day">Sun</span>
                                </a>
                            </article>
                        </div>
                        
                        
                    </div>
                
                
                
                
            </div>
            
            <ul class="patinet">
                <?php
                    $query_device = "select * from `dental1_appointment` where status='approved' order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $appointments = $statement_device->fetchAll();

 foreach($appointments as $appointment)
 {

    $ongoing_query1 = "SELECT * from dental1_user where id=:id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
           "id"=>$appointment->user_id
           
            ));
        $result1 = $statement1->fetch();

    ?>
                <li class="item">
                    <div class="top">
                        <?php if($result1->profil_pic!='')
                        {
                            ?>
                            <span class="user"><img src="../images/<?php $result1->profil_pic;?>" alt=""></span>
                            <?php
                        }
                        else
                        {
                            ?>
                            <span class="user"><img src="../image/default.png" alt=""></span>
                            <?php
                        }
                        ?>
                        
                        <div class="text">
                            <h4><?php echo $result1->fullname;?></h4>
                            <span class="appType">Emergency Appointment</span>
                        </div>
                        <a href="tel:<?php echo $result1->phone;?>" class="call"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="bottom">
                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo $appointment->scheduled_time;?></span>
                        <span class="pay">$ 200</span>
                    </div>
                </li>
                <?php
            }
            ?>
               
            </ul>
            
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>