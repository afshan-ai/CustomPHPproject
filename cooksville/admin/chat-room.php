<?php
/*
* Author: Shahrukh Khan and Santanu Mondal
*/
include("config.php");
include("includes/header.php");

?>   
<style type="text/css">
	#chat-conversation, #chat_user
	{
		overflow-y: scroll !important;
		
	}
</style>
<?php echo $msg; ?>

  <!--<div class="height30"></div>-->








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
                                        	<?php
                                        	$query_device = "select * from `dental1_user` order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array());
    $result_devices = $statement_device->fetchAll();
    $i==0;
    foreach($result_devices as $cat)
    {
        if($_REQUEST['id']!='')
        {
            $user_id=$_REQUEST['id'];
        }
        else
        {
            if($i==0)
            {
                $user_id=$cat->id;
            }
        }
        
    	?>
                                            <li class="clearfix active chat_head" data="<?php echo $cat->id;?>">
                                            	<!--<a href="chat-room.php?id=<?php echo $cat->id;?>">-->
                                                   <?php if($cat->profile_pic!='')
    {
    ?>
                                 <img src="../image/<?php echo $cat->profile_pic;?>" alt="avatar">
                                 <?php
                             }
                             else
                             {
                                ?>
                                 <img src="../image/default.png" alt="avatar">
                                <?php
                             }
                             ?>
                                                
                                                <div class="about">
                                                    <div class="name"><?php echo ucfirst(str_replace($salt,'',base64_decode($cat->fullname)));?></div>
                                                    <div class="status">
                                                        
                                                        </div>
                                                </div>
                                           <!-- </a>-->
                                            </li>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                            
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
                                <?php 
                                $query_device = "select * from `dental1_user` where id=:user_id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$user_id));
    $result_user = $statement_device->fetch();

    $query_device = "select * from `dental1_appointment`  where user_id=:user_id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$user_id));
    $result_user1 = $statement_device->fetch();
    //echo '<pre>';print_r($result_user1);echo '</pre>';

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
                            </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                            	<div class="chat-history" id="chat-conversation" style="overflow: hidden; width: auto; height: 300px;">
                                <ul>
                                	<?php
                                   $ongoing_query1 = "SELECT * from dental1_chat where (user_id=:user_id and from_user=0) or (from_user=:from_user and user_id=0) order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
         "user_id"=>$user_id,
         "from_user"=>$user_id
           
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

                                </ul>
                            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 356.816px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            <div class="chat-message clearfix">

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control chat_message" placeholder="Enter text here..">
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






  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <input type="hidden" class="user_id" value="<?php echo $user_id;?>">

<?php
include("includes/footer.php");
?>


<script>
jQuery(document).ready(function(){
  var elem = document.getElementById('chat-conversation');
  elem.scrollTop = elem.scrollHeight;
	//jQuery('.user_id').val(jQuery('.chat_head:first-child').attr('data'));
	jQuery('.chat_head').click(function(){
		var dt = jQuery(this).attr('data');
		jQuery('.user_id').val(dt);
        jQuery.post('get_user.php',{user_id:dt},function(data){
            jQuery('.chat-header').html(data);
        })
		jQuery.post('get_chat.php',{user_id:dt},function(data){
  			
  			jQuery('#chat-conversation ul').html(data);
  			var elem = document.getElementById('chat-conversation');
  elem.scrollTop = elem.scrollHeight;
  		})
	})

	jQuery('.chat_message').keyup(function(event) {
  if (event.keyCode === 13) {
  		var chat = jQuery(this).val();
  		var uid = jQuery('.user_id').val();
  		jQuery('.chat_message').val('');

  		jQuery.post('add_chat.php',{ch:chat,user_id:uid},function(data){
  			
  			jQuery('#chat-conversation ul').html(data);
       
  		})
       var elem = document.getElementById('chat-conversation');
  elem.scrollTop = elem.scrollHeight;

  }
});
	setInterval(function(){ 
		var uid= jQuery('.user_id').val();
		jQuery.post('get_chat.php',{user_id:uid},function(data){
  			
  			jQuery('#chat-conversation ul').html(data);
  			/*var elem = document.getElementById('chat-conversation');
  elem.scrollTop = elem.scrollHeight;*/
  		}) }, 1000);
})

</script>