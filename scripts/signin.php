<?php
/* @file signin.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to sign into their account
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $table="user";
   
   $email=$_POST["email"];
   $password=$_POST["password"];
   
   echo sign_in($email, $password, $db, $table);

   $db->close();
?>
