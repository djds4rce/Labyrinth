<?php
	require_once("models/config.php");
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
if(!isscoresufficient(3)){ header("Location:scorenotenough.php"); die(); }

$pass=$_REQUEST['password'];
if($pass==NULL||$pass!='test')
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Level 4</title>
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
<p>Because you have reached till here i give you the answer it is Test</p>
<p>NO there is no trick here</p>
<form method="post" action="level4.php">
<p>password:<input type="text" name="password"></p>
<input type="submit" name="submit" value="submit"></form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
}
else { 
updatescore(3);
header("location:level5.php");
}

?>

