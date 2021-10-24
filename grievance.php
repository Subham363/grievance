<?php
session_start();
$message='';
$conn=mysqli_connect('localhost','root','','grievance');
if (isset($_GET['title']) && isset($_GET['body'])) {
	$title=$_GET['title'];
	$body=$_GET['body'];

	$uid=$_SESSION['login'];
	$sql="insert into grievance(uid,title,body) values('$uid','$title','$body')";
	$result=mysqli_query($conn,$sql);
	if ($result) {
		$message='<span style="color:red;"></span>';
	}else{
		$message='<span style="color:red;"> inserted unsuccessfully'.
		mysqli_error($conn).'</span';
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>MyGrievance | Grievance</title>
	<link rel="stylesheet" type="text/css" href="css/grievance.css">
</head>
<body>
	<?php 
	$page=2;
	include 'header.php';?>
	<?php if (isset($_SESSION['login'])) {?>
		
		<form action="grievance.php">
			<h3><input type="text" name="title" placeholder="TITLE" style="margin-top: 30px;height: 35px;width: 300px;margin-top: 70px;font-family: Comic Sans MS, cursive, sans-serif;font-size: 20px;margin-left: 600px;text-align:center; border-radius: 15px;background-color:lightgrey;"></h3>
			<input type="text" name="body" placeholder="What's On Your Mind......" style="margin-top: 2px;font-family: Comic Sans MS, cursive, sans-serif;width: 600px;margin-left: 450px;font-size: 30px; height: 170px;border-radius: 7px;text-align: center  ;color: black;border-radius: 40px;background-color: lightgrey;"><br><br>
			<input type="submit" class="submit" value="SUBMIT">

			<?php echo ''.$message.''; ?>
		</form>
	<?php } ?>
	<div style="margin-top: 100px;">
		<?php
		$sql='SELECT users.name,grievance.title,grievance.body,grievance.timestamp from users,grievance WHERE grievance.uid=users.id';
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			?>
			<div class="card" style="background-color:lightgrey;box-shadow: 10px -10px 10px grey;">
				<form>
				<div class="container">
					<b style="font-size: 25px;"><?php echo $row['title']; ?></b>
					<p style="font-size: 10px;">posted by <?php echo $row['name']; ?></p>
					<p><?php echo $row['body']; ?></p><br>
					<input type="text" name="text" placeholder="Reply to the grievance" style="width: 400px;color: black;border-radius: 10px;height: 30px;padding-left: 10px;">
                    <p style="float: right;color: aqua;"><?php echo $row['timestamp']; ?></p>

				</div>
				</form>

			</div>
		<?php }
		?>
	</div>
</body>
</html>