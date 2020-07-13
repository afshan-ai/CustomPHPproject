<?php
/*
* Author: Shahrukh Khan and Santanu Mondal
*/
include("config.php");
include("includes/header.php");
?>   
<?php echo $msg; ?>

  <div class="height30"></div>








<div class="chatRoom">

    
    
    <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="body">
                            <div id="plist" class="people-list">
                                <!--<div class="form-line m-b-15">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>-->
                                <div class="tab-content">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 590px;"><div id="chat_user" style="overflow: hidden; width: auto; height: 590px;">
                                        <ul class="chat-list list-unstyled m-b-0">
                                            <li class="clearfix active">
                                                <img src="./images/user1.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">William Smith</div>
                                                    <div class="status">
                                                        <i class="material-icons offline">fiber_manual_record</i>
                                                        left 7 mins ago </div>
                                                </div>
                                            </li>
                                            <li class="clearfix ">
                                                <img src="./images/user2.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Martha Williams</div>
                                                    <div class="status">
                                                        <i class="material-icons offline">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user3.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Joseph Clark</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user4.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Nancy Taylor</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user5.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Margaret Wilson</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user6.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Joseph Jones</div>
                                                    <div class="status">
                                                        <i class="material-icons offline">fiber_manual_record</i>
                                                        left 30 mins ago </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user7.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Jane Brown</div>
                                                    <div class="status">
                                                        <i class="material-icons offline">fiber_manual_record</i>
                                                        left 10 hours ago </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user8.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Eliza Johnson</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user3.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Mike Clark</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user4.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Ann Henry</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user5.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Nancy Smith</div>
                                                    <div class="status">
                                                        <i class="material-icons online">fiber_manual_record</i>
                                                        online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="./images/user9.jpg" alt="avatar">
                                                <div class="about">
                                                    <div class="name">David Wilson</div>
                                                    <div class="status">
                                                        <i class="material-icons offline">fiber_manual_record</i>
                                                        offline since Oct 28 </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 347.405px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card conversation">
                        <div class="chat">
                            <div class="chat-header clearfix">
                                <img src="./images/user2.jpg" alt="avatar">
                                <div class="chat-about">
                                    <div class="chat-with">John Doe</div>
                                    <div class="row action">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="chat-num-messages"><i class="fa fa-phone"></i> <span>9051852825</span></div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="chat-num-messages"><i class="fa fa-envelope"></i> <span>john@gmail.com</span></div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="chat-num-messages"><i class="fa fa-calendar"></i> <span>Upcoming Appointment Date: 12-06-20</span></div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 449px;"><div class="chat-history" id="chat-conversation" style="overflow: hidden; width: auto; height: 449px;">
                                <ul>
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time">10:10 AM, Today
                                            </span>
                                            &nbsp; &nbsp;
                                            <span class="message-data-name">Maria</span>
                                        </div>
                                        <div class="message other-message float-right"> Hi John, how are you? How is
                                            your work going on? </div>
                                    </li>
                                    <li>
                                        <div class="message-data">
                                            <span class="message-data-name">John </span>
                                            <span class="message-data-time">10:12 AM, Today</span>
                                        </div>
                                        <div class="message my-message">
                                            <p>Its good. We completed almost all task assign by our manager.</p>
                                            <div class="row">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-data">
                                            <span class="message-data-name">John </span>
                                            <span class="message-data-time">10:12 AM, Today</span>
                                        </div>
                                        <div class="message my-message">
                                            <p>How are you feel today? What's about vacation?.</p>
                                            <div class="row">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time">10:10 AM, Today
                                            </span>
                                            &nbsp; &nbsp;
                                            <span class="message-data-name">Maria</span>
                                        </div>
                                        <div class="message other-message float-right"> I am good, We think for next
                                            weekend.
                                        </div>
                                    </li>
                                </ul>
                            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 356.816px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            <div class="chat-message clearfix">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Enter text here..">
                                    </div>
                                </div>
                                <!--<div class="chat-upload">
                                    <button type="button" class="btn btn-circle waves-effect waves-circle waves-float bg-deep-orange">
                                        <i class="material-icons">attach_file</i>
                                    </button>
                                    <button type="button" class="btn btn-circle waves-effect waves-circle waves-float bg-deep-orange">
                                        <i class="material-icons">insert_emoticon</i>
                                    </button>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



</div>








<?php
include("includes/footer.php");
?>

