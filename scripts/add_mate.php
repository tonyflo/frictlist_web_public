<?php
/* @file add_mate.php
 * @date 2014-03-24
 * @author Tony Florida
 * @brief Allows a user to add a mate
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_user="user";
   $table_mate="mate";
   
   $uid=$_POST["uid"];
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $gender=$_POST["gender"];
  
   echo add_mate($uid, $firstname, $lastname, $gender, $db, $table_user, $table_mate);

   $db->close();
?>
