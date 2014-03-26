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
   $mate_id=$_POST["mate_id"];
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $gender=$_POST["gender"];
  
   echo update_mate($uid, $mate_id, $firstname, $lastname, $gender, $db, $table_user, $table_mate);

   $db->close();
?>
