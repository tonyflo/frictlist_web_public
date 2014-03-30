<?php
/* @file update_frict.php
 * @date 2014-03-30
 * @author Tony Florida
 * @brief Retrieves requests made to a user
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
   
   get_notifications($uid, $db);

   $db->close();
?>
