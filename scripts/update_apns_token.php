<?php
/* @file update_apns_token.php
 * @date 2014-04-29
 * @author Tony Florida
 * @brief Updates a user's device token which is used for APNS (push notifications)
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
   $token=$_POST["token"];
   
   update_apns_token($uid, $token, $db);

   $db->close();
?>
