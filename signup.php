
<!DOCTYPE html>
<html>
<head>
	<title>Grievance | SignUp</title>
	<link rel="stylesheet" type="text/css" href="css\signup.css">
</head>
<body>
	<div class="div1">

		<form action="signup.php">

			<h1 class="header">Sign up</h1>
			<input type="text" class="firstname" placeholder="Full Name" name="name" id="name"><br>
			<span id="nameError" style="color: red;display:none;margin-left:10px;">Fisrt name must not be empty</span>
			<br>
			
			<input type="text" placeholder="Email" name="email" id="email"><br>
			<span id="emailError" style="color: red;display:none;margin-left:10px;">Email must not be empty</span>
			<br>

			<input type="text" class="mnumber" placeholder="Mobile number" name="number" id="mnumber"><br>
			<span id="mnumberError" style="color: red;display:none;margin-left:10px;">mobile number is required</span>
			<br>

			<input type="password" placeholder="New password" name="password1" id="pass1"><br>
			<span id="pass1Error" style="color: red;display:none;margin-left:10px;">password must not be empty</span>
			<br>
			<input type="password" placeholder="Confirm password" name="password2" id="pass2"><br>
			<span id="pass2Error" style="color: red;display:none;margin-left:10px;">confirm password must not be empty</span>
			<br><br>
				<div style="color: black;font-family: Comic Sans MS, cursive, sans-serif;">Gender:
				<input type="radio" name="gender" id="male" value="male">Male
				<input type="radio" name="gender" id="female" value="female">Female
				<input type="radio" name="gender" id="others" value="others">Others
				<br><br>
			<div style="text-align: center;">By clicking Sign Up, you agree to our Terms,Data Policy and Cookie Policy.<div></span>
			<br>
		
			<input type="submit" class="sgnup" value="Sign up" name="signup" id="signup">
			<br><br>
			<span>already a user?<a href="login.php" style="text-decoration: none;color: black;font-size: 25px; ">login</a></span>
		</div>

		</form>
	</div>
	<script type="text/javascript" src="jquery.js"/></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#signup').click(function(){ 
				var name =$('#name');
				var number=$('#mnumber');
				var email=$('#email');
				var password1=$('#pass1');
				var password2=$('#pass2');

				if(name.val()==''){
					$('#nameError').show();
					name.focus();
					return false;
					
				} 

			
				if(email.val()==''){
					$('#emailError').show();
					email.focus();
					return false;
					
				} 
				if(!isEmail(email.val())) {
					$('#emailError').text('invalid email');
					$('#emailError').show();
					email.focus();
					return false;
				}

				if(number.val()==''){
					$('#mnumberError').show();
					number.focus();
					return false;
					
				} 


				if ( number.val().match('^[0-9]{10}$') ) {
				} else {
					$('#mnumberError').text('invalid phone');
					$('#mnumberError').show();
					mobile.focus();
					return false;
				}

				if(password1.val()==''){
					$('#pass1Error').show();
					password1.focus();
					return false;
					
				}

				if(password1.val().length<8)
				{
					
					$('#pass1Error').text('invalid');
					$('#pass1Error').show();
					password1.focus();
					return false;
				}else{
					$('#pass1Error').hide();
				}
				
				if(password1.val()!=password2.val()){
					$('#pass2Error').text('Both password should be same');
					$('#pass2Error').show();
					password2.focus();
					return false;

				}
				else{
					$('#pass2Error').hide();
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
		function isCreatepass(pass){ 
			var p= /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])$/;
			if (p.test(createpass)) {
				return true;
			}
			else{
				return false;
			}
		}

	</script>
	<?php 
	$conn=mysqli_connect('localhost','root','','grievance');


	if (isset($_GET['name']) && isset($_GET['number']) && isset($_GET['email']) && isset($_GET['gender']) && isset($_GET['password1'])){
		$name=$_GET['name'];
		$number=$_GET['number'];
		$email=$_GET['email'];
		$gender=$_GET['gender'];
		$password=$_GET['password1'];
		
		$sql="insert into users(name,number,email,gender,password) values('$name','$number','$email','$gender','$password')";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			

		}else{
			echo 'some error occurred';
		}
	}

?>
	

</body>



</html>