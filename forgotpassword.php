<?php
/* @file forgotpassword.php
 * @date 2014-04-27
 * @author Tony Florida
 * @brief Allows a user to reset their password with a token
 */
 
echo 
'<!doctype html>
<html>
<head>
   <title>Forgot Frictlist Password</title>
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>';
include "header.php";
 
function getRandomString($length) 
{
   $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
   $validCharNumber = strlen($validCharacters);
   $result = "";

   for ($i = 0; $i < $length; $i++) {
       $index = mt_rand(0, $validCharNumber - 1);
       $result .= $validCharacters[$index];
   }
   return $result;
}

function mailresetlink($to,$token)
{
   $subject = "Forgot Frictlist Password";
   $uri = 'http://frictlist.flooreeda.com' ;
   $message = '
<html>
<head>
<title>Forgot Frictlist Password</title>
</head>
<body>
<p>Click on the link to reset your password <a href="'.$uri.'/reset.php?token='.$token.'">Reset Password</a></p>

</body>
</html>
   ';
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
   $headers .= 'From: Frictlist Admin<admin@flooreeda.com>' . "\r\n";
   $headers .= 'Bcc: admin@flooreeda.com' . "\r\n";

   if(mail($to,$subject,$message,$headers))
   {
      echo '<p class="text center">The password reset link was sent to <b>'.$to.'</b></p>'; 
   }
}

//display password reset form
if(!isset($_GET['email']))
{
   echo'<form action="forgotpassword.php" class="text center">
	 Enter Your Email:<br>
	 <input type="text" name="email" /><br>
	 <input type="submit" value="Reset My Password" />
	 </form>'; 
    include "footer.php";
    echo "</body></html>";
   exit();
}

include("../frictlist_private/credentials.php");
$email=$_GET['email'];

$query="select email from user where email=?";
$sql=$db->prepare($query);
$sql->bind_param('s', $email);
$sql->execute();
$sql->store_result();
$numrows=$sql->num_rows;
$sql->free_result();

if($numrows==0)
{
   echo '<p class="text center">The email <b>'.$email.'</b> has not been registered with Frictlist.</p>';
}
else
{
   //email exists
   $token=getRandomString(10);
   $query="insert into token(email, token, request_datetime) values(?, ?, '".date("Y-m-d H:i:s")."')";
   $sql=$db->prepare($query);
   $sql->bind_param('ss', $email, $token);
   $sql->execute();
   $sql->free_result();

   if($sql == TRUE)
   {
      if(isset($_GET['email']))
      {
         mailresetlink($email,$token);
      }
   }
   else
   {
      echo '<p class="text center">Sorry, there was a problem possessing your request. Please try again.</p>';
   }
}

include "footer.php";
echo "</body>
</html>";

?>
