<?php
/* @file signin.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to sign into their account
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $table="user";
   
   $username=$_POST["username"];
   $password=$_POST["password"];
   $token=$_POST["token"];
   
   echo sign_in($username, $password, $token, $db, $table);

   $db->close();
?>
