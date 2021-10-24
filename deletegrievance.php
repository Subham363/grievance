<?php
if(isset($_GET['id'])){
   $id=$_GET['id'];
	$conn=mysqli_connect('localhost','root','','grievance');
	$sql="delete from grievance where id='$id'";
	$result=mysqli_query($conn,$sql);
}
header('location:mygrievance.php');
?>