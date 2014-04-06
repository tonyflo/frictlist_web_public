<?php
/* @file add_frict.php
 * @date 2014-03-25
 * @author Tony Florida
 * @brief Allows a user to add a Frict to their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";

   $table_user="user";
   $table_mate="mate";
   $table_frict="frict";
   
   $mate_id=$_POST["mate_id"];
   $base=$_POST["base"];
   $from=$_POST["from"];
   $rating=$_POST["rating"];
   $notes=$_POST["notes"];
   $creator=$_POST["creator"];
  
   echo add_frict($mate_id, $base, $from, $rating, $notes, $creator, $db, $table_user, $table_mate, $table_frict);

   $db->close();
?>