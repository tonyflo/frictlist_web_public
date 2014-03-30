<?php
/* @file get_outgoing_status.php
 * @date 2014-03-29
 * @author Tony Florida
 * @brief Ability to search for a mate
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
  
   echo get_outgoing_status($uid, $db);

   $db->close();
?>
