<?php 
session_start();
if($_SESSION['username']=='')
{
  ?>
          <script>window.location.href="index.php"</script>
          <?php
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<title>SummerBreeze Dentistry ::ADMIN</title>
    
    
 <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
    
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    
    
<link href="style.css" rel="stylesheet" type="text/css">
    
    
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--[if lte IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
 <link href="jquery/css/start/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<!--<script src="libs/jquery-1.9.0.min.js"></script>
-->
    
    
    
    
    
    <script src="js/chat.js"></script>
    
    
    
    
    
    <script src="jquery/js/jquery-1.9.1.js"></script>
<style>

.booked_out .ui-state-default {
    background: #28c0eb;
    border: 1px solid #28c0eb;
}

input, textarea
{
  border: 1px solid black;
}
select
{
  margin-left :100px;
}
nav ul
{
  max-height: 60vh;
}
  </style>
	<script src="jquery/js/jquery-ui-1.10.3.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ 
	 minDate: 0,
    onSelect: function(selectedDate) { 
	
	$("#date_sel").val(selectedDate.toString());
	 $("#date_sel") .removeAttr('disabled');
      //alert("You clicked on " + selectedDate.toString()); 
    } 
  });
  
//var array = ["2014-11-03","2014-11-13","2014-01-23"];


var arr = <?php echo $obj_json; ?>;

  $( "#datepicker4" ).datepicker();  
  $( "#datepicker2" ).datepicker({ 
	// minDate: 0,
beforeShowDay: function(date){
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        if(arr.indexOf(string) != -1 )
        {
          return [true,"booked_out","Booked out"];
        }
        else
        {
           return [true,'',"available"];
        }
    },
    onSelect: function(selectedDate) {



 
var id= selectedDate.toString();
var loc= $("#loc").val();


	 $.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "agent="+id+"&loc="+loc,
        cache: false,
        beforeSend: function () { 
		
	$("#tableshow").html("<img src='<?php echo SITE_IMAGE_PATH ?>loading.gif' alt='' width='240' height='240' style=' padding-left:350px;'>");
        },
        success: function(html) {    
            $("#tableshow").html( html );
        }
 
    });
      //("You clicked on " + selectedDate.toString()); 
    }
      

   /* if($.inArray($.datepicker.formatDate('yy-mm-dd', date ), array) > -1)
    {
      alert('hi');
        return [false,"booked_out","Booked out"];
    }
    else
    {
        return [true,'',"available"];
    }
}*/



  });
  
    $( "#annc li" ).click(function(){ 
	
	
 
var annc = this.id;
	 $.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "annc="+annc,
        cache: false,
        beforeSend: function () { 
		//$("#tableshow").html("<img src='<?php echo SITE_IMAGE_PATH ?>loading.gif' alt='' width='240' height='240' style=' padding-left:0px;'>");

        },
        success: function(html) {    
            $("#tableshow2").html( html );
        }
    });
      //("You clicked on " + selectedDate.toString()); 
    
  });

  
 $('#msg li').click(function() {
   
 
var msg = this.id;
	 $.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "msg="+msg,
        cache: false,
        beforeSend: function () { 
		//$("#tableshow").html("<img src='<?php echo SITE_IMAGE_PATH ?>loading.gif' alt='' width='240' height='240' style=' padding-left:0px;'>");

        },
        success: function(html) {    
            $("#tableshow2").html( html );
        }
    });
      //("You clicked on " + selectedDate.toString()); 
    
  });
    $( "#msg2" ).click(function(){ 
	

 
var msg = $( "#msg2" ).val();
	 $.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "msg="+msg,
        cache: false,
        beforeSend: function () { 
		
//$("#tableshow").html("<img src='<?php echo SITE_IMAGE_PATH ?>loading.gif' alt='' width='240' height='240' style=' padding-left:0px;'>");
        },
        success: function(html) {    
            $("#tableshow2").html( html );
        }
    });
      //("You clicked on " + selectedDate.toString()); 
    
  });
    $( "#msg3" ).click(function(){ 
	
	
 
var msg = $( "#msg3" ).val();
	 $.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "msg="+msg,
        cache: false,
        beforeSend: function () { 
		
//$("#tableshow").html("<img src='<?php echo SITE_IMAGE_PATH ?>loading.gif' alt='' width='240' height='240' style=' padding-left:0px;'>");
        },
        success: function(html) {    
            $("#tableshow2").html( html );
        }
    });
      //("You clicked on " + selectedDate.toString()); 
    
  });
  
 
  
  
  
  });
  
       function decide(id,slot_id){
	   
	   if(confirm('Are you sure?')){
		   
	
    
	var str = $("#"+id).val();

	var id = str.substring(0,str.indexOf("_"));
	var decide = str.substr(str.indexOf("_")+1);


	
	 $.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "agent="+id+"&decide="+decide+"&slot="+slot_id,
        cache: false,
        beforeSend: function () { 


		$("#tableshow").html("<img src='<?php echo SITE_IMAGE_PATH ?>loading.gif' alt='' width='240' height='240' style=' padding-left:0px;'>");
        },
        success: function(html) {  

//alert('success');
			//alert(html);
  
            $("#tableshow").html( html );
        }
    });
      //("You clicked on " + selectedDate.toString()); 
	   }
	   }

  </script>
<script type="text/javascript">







$(document).ready(function(e) {



$("#choice1").click(function(e) {
   $("#time_slot1") .removeAttr('disabled');
	$("#time_slot2").val(" ");
	$("#time_slot2").attr('disabled','disabled');
});

$("#choice2").click(function(e) {
    $("#time_slot2") .removeAttr('disabled');
	$("#time_slot1").val(" ");
	$("#time_slot1").attr('disabled','disabled');
});
    
});



function file_validation(sel){

	
    var ext = sel.value.match(/\.(.+)$/)[1];
    switch(ext.toLowerCase())
    {
        case 'jpg':
        case 'bmp':
        case 'png':
        case 'tif':
          //  alert('allowed');
            break;
        default:
            alert('Not Supported. Please upload image type files.');
            sel.value='';
  
};

	
	}






function categoryDB(sel)

{var id = sel.options[sel.selectedIndex].value;  

$.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "agent="+id,
        cache: false,
        beforeSend: function () { 
           // $('#content').html('<img src="loader.gif" alt="" width="24" height="24" style=" padding-left:469px;">');
        },
      success: function(html) {   

	$("#sub_theme").html( html );
		
        }
    });
		
	}
	
	function categoryEdit(id,prod)

{

$.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "agent="+id,
        cache: false,
        beforeSend: function () { 
           // $('#content').html('<img src="loader.gif" alt="" width="24" height="24" style=" padding-left:469px;">');
        },
      success: function(html) {   

	$("#tableshow").html( html );
		
        }
    });
		
	}
	
	
function autocom(){
	

	
	var curr_text=$('#to').val();
	
		$('#to').autocomplete({
			source: 'includes/suggest.php?ch='+curr_text,
			select: function( event, ui ) {
			 $( "#to" ).hide();
			
			 },
			
 			change: function( event, ui ) {
					 $( "#to" ).show();
			 
		
			 
			 $( "#to" ).val( ui.item.label );
			 
			  $( "#m_ID" ).val( ui.item.value );
			 
	  
	  										
			}});
		
	
	
	}


	function schedule(){
		
		var loc= $("#loc").val();
		
		$.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "loc="+loc,
        cache: false,
        beforeSend: function () { 
           // $('#content').html('<img src="loader.gif" alt="" width="24" height="24" style=" padding-left:469px;">');
        },
      success: function(html) {   

	window.location.href="schedule_cat.php";
		
        }
    });
		
	
		}
		
			function schedule_cat(){
		
		var cat= $("#cat").val();
		
		$.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "cat="+cat,
        cache: false,
        beforeSend: function () { 
           // $('#content').html('<img src="loader.gif" alt="" width="24" height="24" style=" padding-left:469px;">');
        },
      success: function(html) {   

	window.location.href="schedule_doc.php";
		
        }
    });
		
	
		}
		
		
		
				function schedule_doc(){
		
		var doc= $("#doc").val();
		
		$.ajax({
        type: "GET",
        url: "includes/agent.php",
        data: "doc="+doc,
        cache: false,
        beforeSend: function () { 
           // $('#content').html('<img src="loader.gif" alt="" width="24" height="24" style=" padding-left:469px;">');
        },
      success: function(html) {   

	window.location.href="schedule.php";
		
        }
    });
		
	
		}
</script>
    
    

    
</head>

<body>

<div class="">
<header>
  <div class="wrapper">
<div class="logo"><a href="index.php" title=""><img src="./images/login_logo.png" /></a></div>
<!--<div class="hd_rt"><?php echo $pageTitle; ?></div>
<div class="height30"></div>
<span style="display:none;" class="ani">
<?php echo $dt_enc;
?>
</span>-->


<nav>
               <select name="select" id="select" ONCHANGE="location = this.options[this.selectedIndex].value;">
                 <option value="home.php">Home</option>
                 <option value="appointment.php">Appointment</option>
                 <option value="provider.php">Provider List</option>
                 <option value="insurance_provider.php">Insurance Provider List</option>
                 <option value="list_users.php">List of Users</option>
                <option value="chat-room.php">Chat</option>
                
            <?php /*?>     <option value="video.php">Video Links</option><?php */ ?>
                 <option value="logout.php">Logout</option>
               
                </select>
<?php $link = substr($_SERVER['SCRIPT_NAME'], strripos($_SERVER['SCRIPT_NAME'], '/') + 1, strlen($_SERVER['SCRIPT_NAME']) - strripos($_SERVER['SCRIPT_NAME'], '/')); ?>
                <ul>

<?php



//$qry = mysql_query(" SELECT SUM(app_no) AS total FROM device_id ");
//$row = mysql_fetch_assoc($qry);

//$not = $row['total'];

?>










                	<li  <?php if ($link == 'home.php') { ?> class="selected" <?php 
                                                                        } ?>><span><a href="home.php" class="home-icon">Home</a></span></li>            
                    <li  <?php if ($link == 'appointment.php') { ?> class="selected" <?php 
                                                                                    } ?>><span><a href="appointment.php" class="menu-icon2">Appointments</a></span></li>  
            <li  <?php if ($link == 'provider.php') { ?> class="selected" <?php 
                                                                                    } ?>><span><a href="provider.php" class="manageschedule-icon">Providers</a></span></li>   
                                                                                    <li  <?php if ($link == 'insurance_provider.php') { ?> class="selected" <?php 
                                                                                    } ?>><span><a href="insurance_provider.php" class="menu-icon4">Insurance Providers</a></span></li>   

                    <li <?php if ($link == 'list_users.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="list_users.php" class="user-icon">Users</a></span></li>    
                                                                                <li <?php if ($link == 'chat-room.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="chat-room.php" class="menu-icon5">Chat</a></span></li>
                                                                                <li <?php if ($link == 'gallery.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="gallery.php" class="menu-icon6">Gallery</a></span></li>
                                                                                <li <?php if ($link == 'location.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="location.php" class="menu-icon7">Location</a></span></li>
                                                                                <li <?php if ($link == 'referral.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="referral.php" class="menu-icon8">Referrals</a></span></li>
                                                                                <li <?php if ($link == 'reviews.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="reviews.php" class="menu-icon9">Reviews</a></span></li>
                                                                                <li <?php if ($link == 'offers.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="offers.php" class="menu-icon10">Offers</a></span></li>
                                                                                <li <?php if ($link == 'dentalxchange.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="dentalxchange.php" class="menu-icon11">Sterilization</a></span></li>
                                                                                <li <?php if ($link == 'sterilization.php') { ?> class="selected" <?php 
                                                                                } ?>><span><a href="sterilization.php" class="menu-icon12">DentalXChange</a></span></li>

                    <!--<li  <?php if ($link == 'announcements.php') { ?> class="selected" <?php 
                                                                                    } ?>><span><a href="announcements.php" class="announcement-icon">Notifications<span class="nmb"><?php echo $row; ?></span></a></span></li>-->            
                    
                    <li  <?php if ($link == 'logout.php') { ?> class="selected" <?php 
                                                                            } ?>><span><a href="logout.php" class="logout-icon">Logout</a></span></li>
                                                                            
                                                                            
                </ul>
                </nav>
                

</div>
</header>
<section class="body">
<div class="wrapper">
<div class="hd_rt">
    <div class="row">
        <div class="col-md-12 col-sm-12">
             <div class="search"><form method="post" action="list_users.php"><i class="fa fa-search"></i><input type="search" name="search" placeholder="Search for patients" class="form-control" value="<?php echo $_REQUEST['search'];?>"></form></div>
                <!--<p class="welcomeTxt"><span>Welcome</span> to Summer Breeze Dental</p>-->
                <!--<div class="hd_rt_right">
                    <p class="ping"><a href=""><img src="./images/bell.png" alt=""><span class="count">10</span></a></p>
                    <p class="ping"><a href=""><img src="./images/maill.png" alt=""></a></p>
                </div>-->
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="heading">Welcome to SummerBreeze Dentistry</h2>
        </div>
        
    </div>
</div>
<div class="content-section">


