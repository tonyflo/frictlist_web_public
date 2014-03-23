<?php
/* @file update_frict.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to update a Frict from their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_user="user";
   $table_hu="hookup";
   $table_frict="frict";
   
   $uid=$_POST["uid"];
   $frict_id=$_POST["frict_id"];
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $gender=$_POST["gender"];
   $base=$_POST["base"];
   $from=$_POST["from"];
   $to=$_POST["to"];
   $notes=$_POST["notes"];
   
   echo update_frict($uid, $frict_id, $firstname, $lastname, $gender, $base, $from, $to, $notes, $db, $table_user, $table_hu, $table_frict);

   $db->close();
?>
