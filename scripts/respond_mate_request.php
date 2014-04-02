<?php
/* @file respond_mate_request.php
 * @date 2014-04-01
 * @author Tony Florida
 * @brief Respond to a mate request
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
   $request_id=$_POST["request_id"];
   $mate_id=$_POST["mate_id"];
   $status=$_POST["status"]; //accept (1) or reject (-1)
  
   echo respond_mate_request($uid, $request_id, $mate_id, $status, $db);

   $db->close();
?>
