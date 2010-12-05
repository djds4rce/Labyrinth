<?php
require_once("models/config.php");
global $loggedInUser,$db,$db_table_prefix; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scores</title>
<link href="cakestyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="content">

        <div id="left-nav">
        <?php include("layout_inc/left-nav.php"); ?>
            <div class="clear"></div>
        </div>

        <div id="main">
<?
$query="SELECT username_clean,score FROM  ".$db_table_prefix."Users ORDER BY score desc,answer_time asc 
        LIMIT 20";
$result=mysql_query($query);
$temp=0;
echo "<table border=\"0\" id=\"score\">";
echo"<tr><td>Rank</td><td>Username</td><td>score</td>";
while ($rows=mysql_fetch_assoc($result)) {
              echo "<tr><td>";
              $temp=$temp+1;
              echo $temp;
              echo ".</td>";
                    foreach($rows as $value)
                   {
                     echo"<td>";
                     echo $value;
                     echo"</td>";
                    }
              echo "</tr>";
               
             }
echo"</table>";         
?>
</div>
</div>
</div>
</body>
</html>


