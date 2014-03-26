<?php
/* @file update_frict.php
 * @date 2014-03-25
 * @author Tony Florida
 * @brief Allows a user to update a Frict from their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_mate="mate";
   $table_frict="frict";
   
   $mate_id=$_POST["mate_id"];
   $frict_id=$_POST["frict_id"];
   $base=$_POST["base"];
   $from=$_POST["from"];
   $to=$_POST["to"];
   $notes=$_POST["notes"];
   
   echo update_frict($frict_id, $mate_id, $base, $from, $to, $notes, $db, $table_mate, $table_frict);

   $db->close();
?>
