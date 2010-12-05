<?php
/* This function is called on login. It redirects the User to the question he was answering last */
require_once("models/config.php");
  global $loggedInUser,$db,$db_table_prefix;
          $query="SELECT score FROM `".$db_table_prefix."Users` WHERE User_ID = '".$db->sql_escape($loggedInUser->user_id)."'";
          $result=mysql_query($query) or die(mysql_error);
          $row_a = mysql_fetch_array($result);
          extract($row_a);
                                                switch($score){
                                                       case "0":header('location:level1.php'); break;
                                                       case "1":header('location:level2.php'); break;
                                                       case "2":header('location:level3.php'); break;
                                                       case "3":header('location:level4.php'); break;
                                                       case "4":header('location:level5.php'); break;
                                                       default:header('location:login.php');break; 
                                                       }
						die();
?>

