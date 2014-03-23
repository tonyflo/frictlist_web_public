<?php
/* @file add_frict.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to add a Frict to their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_user="user";
   $table_hu="hookup";
   $table_frict="frict";
   
   $uid=$_POST["uid"];
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $gender=$_POST["gender"];
   $base=$_POST["base"];
   $from=$_POST["from"];
   $to=$_POST["to"];
   $notes=$_POST["notes"];
  
   echo add_frict($uid, $firstname, $lastname, $gender, $base, $from, $to, $notes, $db, $table_user, $table_hu, $table_frict);

   $db->close();
?>
