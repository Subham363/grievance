<?php
	session_start();
    include 'db_conn.php';

	if(isset($_SESSION['login'])) {
		header('Location:about.php');
	}
	if (isset($_GET['email']) && isset($_GET['password'])) {
	$email=$_GET['email'];
	$password=$_GET['password'];
	$conn=mysqli_connect('localhost','root','','grievance');
	$sql="select id from users where email='$email' and password='$password'";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)==1) {

$row=mysqli_fetch_assoc($result);
		$id=$row['id'];
		$_SESSION['login']=$id;
		header('location:grievance.php');
	}else{
		echo "error";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grievance | Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="icons/css/all.min.css">
</head>
<body><div class="div1">

		
		<form action='login.php' onsubmit="return validate()">

			<h1 class="header"> Log in!</h1>
			<input type="text" placeholder="Student/Teacher's ID" name="email" id="email">
			
			<span id="userError" style="color: red;display:none;margin-left:10px;">Username must not be empty</span>

			<br><br>
			<input type="password" placeholder="Password" name="password" id="pass">
			
			<span id="passError" style="color: red;display:none;margin-left:10px;">password must not be empty</span>

			<br><br><br>
			<input type="submit" class="login" value="Log in" id="login">
			<br><br><br>
			<a href="forgotpassword.php" class="forgotpassword">Forgot Password?</a>
			<br><br>
			<a href="signup.php" class="sgnin" id="submit">New User? Sign up</a>
			<br><br><br>
			<a href="indexx.php" class="backtohome" id="backtohome" style="margin-left: 200px;text-decoration: none;color: white">Back to home</a>
			<i class="fas fa-user fa-3x" style="position: absolute;left: 555px;top: 247px;"></i>
			<i class="fas fa-key fa-3x" style="position: absolute;left: 550px;top: 330px;"></i>

		</form>

	<script type="text/javascript" src="js/jquery.js"/></script>
	<script type="text/javascript"> 
		$(document).ready(function() {
			$('#login').click(function(){
				var email =$('#email');
				var pass =$('#pass');
                
				if(email.val()==''){
					$('#userError').show();
					email.focus();
					return false;
					
				} 
				if(!isEmail(email.val())) {
					$('#userError').text('invalid email');
					$('#userError').show();
					email.focus();
					return false;
					
				}

				if(pass.val()=='') {
					$('#passError').show();
					pass.focus();
					return false;
				}
				if(pass.val().length<8){
					$('#passError').text('wrong password');
					$('#passError').show();
					return false;

				}
				return true;




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