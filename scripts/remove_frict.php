<?php
/* @file update_frict.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to remove a frict from their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_frict="frict";
   
   $frict_id=$_POST["frict_id"];
   $creator=$_POST["creator"];
   
   echo remove_frict($frict_id, $creator, $db, $table_frict);

   $db->close();
?>
