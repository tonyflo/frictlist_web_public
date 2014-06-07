<?php
/* @file reset.php
 * @date 2014-04-27
 * @author Tony Florida
 * @brief Allows a user to reset their password with a token
 */

session_start();
$token=$_GET['token'];
include("../frictlist_private/credentials.php");

echo 
'<!doctype html>
<html>
<head>
   <title>Forgot Frictlist Password</title>
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <link rel="stylesheet" type="text/css" href="style.css" />
   <link href="frictlist.ico" rel="icon" type="image/x-icon" />
</head>
<body>';
include "header.php";

if(!isset($_POST['password']))
{
   $query="select email from token where token=? and used=0";
   $sql=$db->prepare($query);
   $sql->bind_param('s', $token);
   $sql->execute();
   $sql->bind_result($email);
   $sql->fetch();
   $sql->free_result();

   if ($email != "")
   {
      $_SESSION['email']=$email;
   }
   else 
   {
      echo '<p class="text center">Invalid link or password has already been changed.<p>';
      include "footer.php";
      echo "</body></html>";
      exit;
   }
}

$pass=$_POST['password'];
$email=$_SESSION['email'];

if(isset($_POST['password']) && isset($_SESSION['email']) && strlen($pass) >= 6)
{
   $hash=pw_hash($pass);

   $query="update user set password=? where email=?";
   $sql=$db->prepare($query);
   $sql->bind_param('ss', $hash, $email);
   $sql->execute();
   $sql->store_result();
   $numrows=$sql->affected_rows;
   $sql->free_result();
   
   if($sql == TRUE)
   {
      $q="update token set used=1, reset_datetime='".date("Y-m-d H:i:s")."' where token=?";
      $s=$db->prepare($q);
      $s->bind_param('s', $token);
      $s->execute();
      $s->store_result();
      $n=$s->affected_rows;
      $s->free_result();
      
      if($n == 1)
      {
         echo '<p class="text center">Your password was successfully changed!</p>';
      }
      else
      {
         echo '<p class="text center">There was a non-critical error processing your request. Your password may have been changed.</p>';
      }
   }
   else
   {
      echo '<p class="text center">There was a critical error in processing your request. You password has not been changed.</p>';
   }
}
else
{
   if(isset($_POST['password']) && strlen($pass) < 6)
   {
      echo '<p class="text center">Your password must be at least 6 characters.</p>';
   }
   
   echo '<form method="post" class="text center">
   Enter your new password:<input required type="password" name="password" /><br>
   <input type="submit" value="Change Password">
   </form>';
}

/*
 * @brief Converts a string into a hash
 * @source http://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/
 * @param password a password between 6 and 255 characters
 * @retval the hashed value of the password
 */
function pw_hash($password)
{
    // A higher "cost" is more secure but consumes more processing power
    $cost = 10;

    // Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

    // Prefix information about the hash so PHP knows how to verify it later.
    // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

    // Hash the password with the salt
    $hashed = crypt($password, $salt);
    
    return $hashed;
} //end pw_hash()

include "footer.php";
echo "</body>
</html>";