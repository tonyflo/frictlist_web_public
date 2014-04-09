<?php
/* @file remove_mate.php
 * @date 2014-03-27
 * @author Tony Florida
 * @brief Allows a user to remove a mate from their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
 
   $table_mate="mate";
   $table_frict="frict";
   
   $mate_id=$_POST["mate_id"];
   $creator=$_POST["creator"];
   
   echo remove_mate($mate_id, $creator, $db, $table_mate, $table_frict);

   $db->close();
?>
