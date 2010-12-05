<?php
	require_once("models/config.php");
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
if(!isscoresufficient(4)){ header("Location:scorenotenough.php"); die(); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>finish</title>
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
<h1>you have reachead The End for Now thank you for helping me test this</h1>
</div>
</div>
</div>
</body>
</html>
