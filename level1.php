<?php
	require_once("models/config.php");
//Checks if user is logged in else redirects to the login page
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
$pass=$_REQUEST['password'];//on submit button store the password in a variable
if($pass==NULL||$pass!='webserver') //check if password entered is correct,if correct go to the else block.
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Level 1</title>
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
<div id="que">
<img src="level1.jpg">
<p>First what?</d>
<form method="post" action="level1.php" id="form"><?//submit the form to the same page?>
<p>password:<input type="text" name="password"></p>
<input type="submit" name="submit" value="submit"></form>
</div>
</div>
</div>
</div>
<‮
</body>
</html>
<?php
}
else { 
/* if password entered is correct then update score and redirect to next question */
updatescore(0);
header("location:level2.php");
}

?>

