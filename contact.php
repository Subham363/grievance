<?php
session_start();
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Grievance | Contact</title>
	<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
	<?php 
	$page=3;
	include 'header.php';?>
	
		<h2>Contact us</h2>
      <div class="box">
        
        	<br><br>
        	<input type="text" name="name" placeholder="NAME"  style="text-align: center;margin-left: 90px"><br>
        	<span id="nameError" style="color:red;display:none;margin-left:10px;">User name must not be empty</span><br>

        	<input type="text" name="email" placeholder="EMAIL ADDRESS"  style="text-align: center;margin-left: 90px"><br>
        	<span id="userError" style="color:red;display:none;margin-left:10px;">Email must not be empty</span><br>

           
        	<input type="text" name="feed" placeholder="WHATS ON YOUR MIND......"  style="text-align: center;margin-left: 90px;height: 200px"><br>
        	<span id="feedError" style="color:white;display:none;margin-left:10px;"> write something</span><br>
        
        	<input type="submit" value="SUBMIT" id="login" style="margin-left: 350px;height: 40px;width: 150px;border-radius: 16px;">
       
		
		
	</div>


	<div class="box3">
	   <p><img src="images/college.jpg";style="text-align: center;">Srinix College Of Engineering<br>
	   	<p style=";margin-left: 100px; margin-top: -10px">Baleshwar,Odisha</p>
		<a href="tel:06782261052"><img src="images/phone.png" style="  width: 50px;height: 50px; border-radius: 60%;">06782-261052,+91-943808365</a><br><br>

			<a href="mailto:principal.srinix@gmail.com"><img src="images/mail.png" style="  width: 50px;height: 50px; border-radius: 60%;">principal.srinix@gmail.com</a><br><br>
			

		<a href="http://www.srinix.org"><img src="images/weblogo.png" style=" width: 50px;height: 50px; border-radius: 60%;">www.srinix.org</a><br>
      

		<h3 style="text-align: center;">SOCIAL MEDIA:-</h3>
		<p style="text-align: center;">
<a href="https://facebook.com/scebalasore"><img src="images/ph2.png" class="a1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<a href="https://twitter.com/scebalasore"><img src="images/ph5.png" class="a1">
                                            </p>

	</div>

	


	<script type="text/javascript" src="jquery.js"/></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#login').click(function(){ 
				var email =$('#email');
				var name=$('#name');

				if(name.val()==''){
					$('#nameError').show();
					name.focus();
					return false;
				} else {
					$('#nameError').hide();
				}

				if ( name.val().match('^[a-zA-Z]{3,16}$') ) {

				} else {
					$('#nameError').text('invalid name');
					$('#nameError').show();
					name.focus();
					return false;
				}

				if(email.val()==''){
					$('#userError').show();
					email.focus();
					return false;
					
				} 
				if(!isEmail(email.val())) {
					$('#userError').text('invalid email format');
					$('#userError').show();
					email.focus();
					return false;
				}
			});

		});
		function isEmail(email) {
			var r = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(r.test(email)) {
				return true;
			}
			else{
				return false;

			}
		}
	</script>
</body>
</html>