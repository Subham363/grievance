<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/mygrievance.css">
	<title>Grievance | MyGrievance</title>
	
</head>
<body>
	<?php 
	$page=4;
	include 'header.php';?>
	<div style="margin-top: 5%;">
		<?php
		

		if(isset($_SESSION['login'])){
			$conn=mysqli_connect('localhost','root','','grievance');
			$uid=$_SESSION['login']; 
			$sql="select grievance.id,users.name,grievance.title,grievance.body,grievance.timestamp from users,grievance where grievance.uid=$uid and users.id=$uid";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				?>
				<div class="card">
					<div class="container" style="box-shadow: 10px -10px 10px grey;">
						<b style="font-size: 25px;"><?php echo $row['title']; ?></b>
						<p style="font-size: 10px;">posted by <?php echo $row['name']; ?></p>
						<p><?php echo $row['body']; ?></p>
						<p style="float: right;color: aqua;"><?php echo $row['timestamp']; ?></p>
						<br><br>
						<a href="deletegrievance.php?id=<?php echo $row['id']; ?>"style="color: red;text-decoration:none; " >Delete</a>
					</div>
				</div>
			<?php } 
		}
		?>
	</div>
</body>
</html>