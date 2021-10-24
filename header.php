<ul>
	<li class="title"><a href="indexx.php">Grievance</a></li>
	
	<?php
	if(isset($_SESSION['login'])){?>
			
	            <li class="button"><a href="logout.php">Logout</a></li>		
				<li ><a  class="<?php if($page==5) echo 'active';?>" href="about.php">Profile</a></li>
				<li ><a  class="<?php if($page==4) echo 'active';?>" href="mygrievance.php">My Grievances</a></li>
			

	<?php }else{?>
		
		<li class="button"><a href="login.php">Login</a></li>
	<?php } ?>
	<li><a class="<?php if($page==3) echo 'active';?>" href="contact.php">Contact-us</a></li>
	<li><a class="<?php if($page==2) echo 'active';?>" href="grievance.php">New Grievances</a></li>
	<li><a class="<?php if($page==1) echo 'active';?>" href="indexx.php">Home</a></li>		
</ul>