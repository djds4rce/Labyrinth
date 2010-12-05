<?php
	require_once("models/config.php");
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
//if user tries to cheat and enters link directly,score is verifeid. If score not sufficent for present level redirect to score not enough page.
if(!isscoresufficient(1)){ header("Location:scorenotenough.php"); die(); }

$pass=$_REQUEST['password'];
if($pass==NULL||$pass!='epson')
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Level 2</title>
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
<p>Oh no Iam Preagent said Mrs.Printer</p>
<p>How can that be possible we had protection replied Mr.Printer</p>
<p>9 months later a son was born to them</p>
<p>what iam i talking about?</p>
<form method="post" action="level2.php">
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
updatescore(1);
header("location:level3.php");
}

?>

