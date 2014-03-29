<?php
/* @file add_mate.php
 * @date 2014-03-29
 * @author Tony Florida
 * @brief Send a request to a mate to make a connection
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   //user id of the user of the app
   $uid=$_POST["uid"];
   //mate_id from the personal matelist of the user of the app
   $users_mate_id=$_POST["users_mate_id"];
   //user id to send the request to
   $mates_uid=$_POST["mates_uid"];
  
   echo send_mate_request($uid, $users_mate_id, $mates_uid, $db);

   $db->close();
?>
