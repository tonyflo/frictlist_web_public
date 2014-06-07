<?php echo('<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Author: Tony Florida; Date: 2014-06-01 -->
<head>
	<title>Frictlist for Android</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <link href="frictlist.ico" rel="icon" type="image/x-icon" />
</head>
<body>
	<?php include "header.php"; ?>
	<?php include "../frictlist_private/android_app_list.php"; ?>
	
	<div class="text center">
			<h2>Frictlist for Android</h2>
			
			<?php
				if(isset($_POST['email']))
				{
					$result = 0;
					if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						$result = -1;
					}
					else
					{
						$result = android_app_list($_POST['email']);
					}
					
					if($result == 0)
					{
						//success
						echo "<h4>You have successfully registered ".$_POST['email']." and will be contacted when Frictlist is available for Android.</h4>";
						return;
					}
					else if($result == -1)
					{
						//the email was null or invalid
						echo "<h4>The provided email address was not valid.</h4>";

					}
					else if($result == -2)
					{
						//email was already in the db
						echo "<h4>The email address ".$_POST['email']." has already been registered for a reminder.</h4>";

					}
					else if($result == -3)
					{
						//something went wrong with the insert
						echo "<h3>Sorry</h3>";
						echo "<h4>Something went wrong. Please try again.</h4>";
					}
					else
					{
						//other unknown error
						echo "<h3>Sorry</h3>";
						echo "<h4>Something went wrong. Please try again.</h4>";
					}
					
					echo '<form name="android_app_list" action="android.php" method="POST">
						<input type="text" name="email" id="email" size="20" maxlength="255"/><br>
						<input type="submit" value="Remind Me"><br></form>';
					
					return;
				}
			?>			
			
			<!-- The following with display if the POST data is not set -->
			<h3>Frictlist is currently not available for Android.</h3>
			<h4>Provide your email below to be notified when Frictlist available for your Android device.</h4>
			<form name="android_app_list" action="android.php" method="POST">
				<input type="text" name="email" id="email" size="20" maxlength="255"/><br>
				<input type="submit" value="Remind Me"><br>
			</form>
			<br>
			
			<img src="resources/images/android_link.png"/>
	</div>

	<?php include "footer.php"; ?>
	
</body>
</html>
