<?php
/* @file add_mate.php
 * @date 2014-03-29
 * @author Tony Florida
 * @brief Ability to search for a mate
 */
   include "../../frictlist_private/credentials.php";
   include "../../frictlist_private/account.php";
   
   $uid=$_POST["uid"];
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $gender=$_POST["gender"];
  
   echo search_mate($uid, $firstname, $lastname, $gender, $db);

   $db->close();
?>
