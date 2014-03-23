<?php
/* @file update_frict.php
 * @date 2014-03-22
 * @author Tony Florida
 * @brief Allows a user to update a Frict from their list
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
   
   echo get_frictlist($uid, $db);

   $db->close();
?>
