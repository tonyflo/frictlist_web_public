<?php
/* @file update_frict.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to update a Frict from their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_user="user";
   $table_frict="frict";
   
   $uid=$_POST["uid"];
   $frict_id=$_POST["frict_id"];
   
   echo remove_frict($uid, $frict_id, $db, $table_user, $table_frict);

   $db->close();
?>
