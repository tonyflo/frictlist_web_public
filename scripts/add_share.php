<?php
/* @file add_share.php
 * @date 2014-05-20
 * @author Tony Florida
 * @brief Adds an entry to the share table when user shares app via sms or email
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
   $share_type=$_POST["share_type"];
   $share_status=$_POST["share_status"];
   $mate_id=$_POST["mate_id"];
  
   echo add_share($uid, $share_type, $share_status, $mate_id, $db);

   $db->close();
?>