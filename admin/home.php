<?php
include("config.php");

include("includes/header.php");
?>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>







<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        
        
        <div class="row adminHighlight">
 
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                        <div class="left">
                            <span class="circle">10</span>
                        </div>

                        <p>
                            <span class="text">Upcoming Appointments</span>
                            <a href="">View All <i class="fa fa-fw fa-angle-right"></i></a>
                        </p>

                    </article>
                </div>
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                        <div class="left">
                            <span class="circle">26</span>
                        </div>
                        <p>
                            <span class="text">Completed Appointments</span>
                            <a href="">View All <i class="fa fa-fw fa-angle-right"></i></a>
                        </p>

                    </article>
                </div>
                <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                    <div class="left">
                            <span class="circle">16</span>
                    </div>
                    <p>
                        <span class="text">New Chats</span>
                        <a href="">View All <i class="fa fa-fw fa-angle-right"></i></a>
                    </p>

                    </article>
                </div>
            <div class="item col-md-6 col-sm-6 col-xs-12">
                    <article>
                    <div class="left">
                            <span class="circle">100</span>
                    </div>
                    <p>
                        <span class="text">Total Reviews</span>
                        <a href="">View All <i class="fa fa-fw fa-angle-right"></i></a>
                    </p>

                    </article>
                </div>
    
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                
                <div class="hometab">
	<ul class="">
    	<li><a href="<?php SITE_ADMIN_URL ?>schedule_loc.php" target="_parent" title="Manage Schedule"><span class="ms"></span>Manage<br>Schedule</a></li>
        <li><a href="<?php SITE_ADMIN_URL ?>list_users.php" target="_parent" title="List Of Users"><span class="luser"></span>List Of Users</a></li>
        <!--<li><a href="<?php SITE_ADMIN_URL ?>announcements.php" target="_parent"  title="Notifications"><span class="noti"></span>Notifications</a></li>-->
        <li><a href="<?php SITE_ADMIN_URL ?>location.php" target="_parent" title="Locations"><span class="locat"></span>Locations</a></li>
        <!-- <li><a href="<?php SITE_ADMIN_URL ?>messages.php" target="_parent" title="Messages"><span class="msg"></span>Messages</a></li> -->
        <li><a href="<?php SITE_ADMIN_URL ?>referrals.php" target="_parent" title="Referrals"><span class="refe"></span>Referrals</a></li>
         <!--<li><a href="<?php SITE_ADMIN_URL ?>video.php" target="_parent" title="videos"><span class="vid"></span>Video Links</a></li>-->
         
                  <li><a href="<?php SITE_ADMIN_URL ?>categories.php" target="_parent" title="Categories"><span class="cat"></span>Categories</a></li>


         <li><a href="<?php SITE_ADMIN_URL ?>doctors.php" target="_parent" title="Doctors"><span class="doc"></span>Doctors</a></li>
         <!--<li><a href="<?php SITE_ADMIN_URL ?>formlist.php" target="_parent" title="Registration Form"><span class="registration-form-ico"></span>Registration Form</a></li>-->
         <li><a href="<?php SITE_ADMIN_URL ?>pushnotifications.php" target="_parent" title="Push Notification"><span class="push-notification-ico"></span>Push Notification</a></li>
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
                <li class="item">
                    <div class="top">
                        <span class="user"><img src="./images/user6.jpg" alt=""></span>
                        <div class="text">
                            <h4>John Doe</h4>
                            <span class="appType">Emergency Appointment</span>
                        </div>
                        <a href="tel:998558955" class="call"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="bottom">
                        <span class="time"><i class="fa fa-clock-o"></i> 9:00 AM</span>
                        <span class="pay">$ 200</span>
                    </div>
                </li>
                <li class="item">
                    <div class="top">
                        <span class="user"><img src="./images/user6.jpg" alt=""></span>
                        <div class="text">
                            <h4>John Doe</h4>
                            <span class="appType">Appointment</span>
                        </div>
                         <a href="tel:998558955" class="call"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="bottom">
                        <span class="time"><i class="fa fa-clock-o"></i> 9:00 AM</span>
                        <span class="pay">$ 200</span>
                    </div>
                </li>
                <li class="item">
                    <div class="top">
                        <span class="user"><img src="./images/user6.jpg" alt=""></span>
                        <div class="text">
                            <h4>John Doe</h4>
                            <span class="appType">Emergency Appointment</span>
                        </div>
                         <a href="tel:998558955" class="call"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="bottom">
                        <span class="time"><i class="fa fa-clock-o"></i> 9:00 AM</span>
                        <span class="pay">$ 200</span>
                    </div>
                </li>
                <li class="item">
                    <div class="top">
                        <span class="user"><img src="./images/user6.jpg" alt=""></span>
                        <div class="text">
                            <h4>John Doe</h4>
                            <span class="appType">Appointment</span>
                        </div>
                         <a href="tel:998558955" class="call"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="bottom">
                        <span class="time"><i class="fa fa-clock-o"></i> 9:00 AM</span>
                        <span class="pay">$ 200</span>
                    </div>
                </li>
            </ul>
            
        </div>
    </div>
</div>










<!--

<div class="recent-activities-row">
     <div class="col-md-8">    
          <div class="recent-activities">
                                   <h4>Chat Room</h4>
                                   <table class="table table-hover">     
                                       
                                      <tbody>
                                          <tr>
                                              <th>Patient Name</th>
                                              <th>Phone</th>
                                              <th>Email</th>
                                              <th>Appointment</th>
                                              <th>Chat Messages</th>
                                          </tr>
                                        <tr>
                                              <td>John Doe</td>
                                              <td>12525656</td>
                                              <td>john@gmail.com</td>
                                              <td>Yes</td>
                                              <td><a href="" class="chatNo">10</a></td>
                                          </tr>
                                           <tr>
                                              <td>John Doe</td>
                                              <td>12525656</td>
                                              <td>john@gmail.com</td>
                                              <td>Yes</td>
                                              <td><a href="" class="chatNo">10</a></td>
                                          </tr>
                                           <tr>
                                              <td>John Doe</td>
                                              <td>12525656</td>
                                              <td>john@gmail.com</td>
                                              <td>Yes</td>
                                              <td><a href="" class="chatNo">10</a></td>
                                          </tr>
                                           <tr>
                                              <td>John Doe</td>
                                              <td>12525656</td>
                                              <td>john@gmail.com</td>
                                              <td>Yes</td>
                                              <td><a href="" class="chatNo">10</a></td>
                                          </tr>
                                           <tr>
                                              <td>John Doe</td>
                                              <td>12525656</td>
                                              <td>john@gmail.com</td>
                                              <td>Yes</td>
                                              <td><a href="" class="chatNo">10</a></td>
                                          </tr>
                                      </tbody>
                                    </table>  
                                  
          </div>
     </div>
    
    <div class="col-md-4 review"> 
        <article>
            <span class="circle">45</span>
            <h4>Total Reviews</h4>
        </article>
    </div>
                 
</div>

-->











<?php
include("includes/footer.php");
?>