<?php
/* @file signup.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to sign up for an account
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table="user";
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $username=$_POST["username"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $gender=$_POST["gender"];
   $birthdate=$_POST["birthdate"];
  
   echo sign_up($firstname, $lastname, $username, $email, $password, $gender, $birthdate, $db, $table);

   $db->close();
?>
