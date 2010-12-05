<?php
// User Management Backend v2.01 BETA
// Author: Jonathan Cassels <cassels.jon@gmail.com>
	require_once("models/config.php");
	if(!isUserLoggedIn()) { header("Location: login.php"); die; }
	$access = $loggedInUser->groupID();
	if ($access['Group_ID'] != 0) {header("Location: login.php"); die; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php echo $loggedInUser->display_username; ?></title>
<link href="cakestyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="logo"></div>
<div id="regbox">
        
<div style="text-align:center; padding-top:15px;">
        
<?php

if (!empty($_POST)) {
$sql = "SELECT * FROM ".$db_table_prefix."Users";
$users = $db->sql_query($sql);
$sql = "SELECT * FROM ".$db_table_prefix."Groups";
$groups = $db->sql_query($sql);
$errors = array();
	while($row = $db->sql_fetchrow($users)) {
		$deleteID = "delete" . $row['User_ID'];
		$delete=($_POST[$deleteID])?"Yes":"No";
		$usernameID = "username" . $row['User_ID'];
		$newusername = $_POST[$usernameID];
		$emailID = "email" . $row['User_ID'];
		$newemail = $_POST[$emailID];
		$groupID = "group_id" . $row['User_ID'];
		$newgroup = $_POST[$groupID];
		if ($delete == "Yes") {
			$sql = "DELETE from ".$db_table_prefix."Users WHERE User_ID = '".$row['User_ID']."'";
			$db->sql_query($sql);
		}
		else {
		if($newusername != $row['Username']) {
			if(minMaxRange(5,25,$newusername)){
				$errors[] = "Unable to update ".$row['Username']."'s username because selected name is not between 5 and 25 characters.";
			}
			elseif (usernameExists($newusername)){				
				$errors[] = "Unable to change ".$row['Username']."'s name because selected username is already in use.";
			}
			else{
			$sql = "UPDATE ".$db_table_prefix."Users SET Username = '".$newusername."', Username_clean = '".sanitize($newusername)."' WHERE User_ID='".$row['User_ID']."'";
			$db->sql_query($sql);
			}
		}
		if ($row['Email'] != $newemail) {
			if(trim($newemail) == "")
			{
				$errors[] = "Unable to update ".$row['Username']."'s email because no address was entered.";
			}
			else if(!isValidEmail($newemail))
			{
				$errors[] = "Unable to update ".$row['Username']."'s email because address is invalid.";
			}
			else if(emailExists($newemail))
			{
				$errors[] = "Unable to update ".$row['Username']."'s email because address is already in use.";		
			}
			else {
			$sql = "UPDATE ".$db_table_prefix."Users SET Email = '".$newemail."' WHERE User_ID='".$row['User_ID']."'";
			$db->sql_query($sql);
			}
		}
		if ($newgroup != $row['Group_ID']){
			$sql = "UPDATE ".$db_table_prefix."Users SET Group_ID = '".$newgroup."' WHERE User_ID='".$row['User_ID']."'";
			$db->sql_query($sql);	
		}
}
}
}

$sql = "SELECT * FROM ".$db_table_prefix."Users";
$users = $db->sql_query($sql);
$sql = "SELECT * FROM ".$db_table_prefix."Groups";
$groups = $db->sql_query($sql);

if(count($errors) > 0) {
	$list="";  
	foreach($errors as $issue) $list.="<li>".$issue."</li>";
echo "<div id=\"errors\">";
echo "<ol>";
echo $list;
echo "</ol>";
echo "</div>";
}
echo <<< HTML1
<table class="table">
<tr>
<td>User ID</td>
<td>Name</td>
<td>Email</td>
<td>Group</td>
<td>Last Seen</td>
<td>Delete</td>
</tr>
HTML1;

echo "<form name=\"ChangeUser\". action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";
while ($row = $db->sql_fetchrow($users)) {
	echo "<tr>";
	echo "<td>".$row['User_ID']."</td>";
	echo "<td><input type=\"text\" size=\"12\" name=\"username".$row['User_ID']."\" value=\"".$row['Username']."\"></td>";
	echo "<td><input type=\"text\" size=\"12\" name=\"email".$row['User_ID']."\" value=\"".$row['Email']."\"></td>";
	echo "<td><select name=\"group_id".$row['User_ID']."\">";
	while ($row2 = $db->sql_fetchrow($groups)){
		if ($row['Group_ID'] == $row2['Group_ID']){
			echo "<option selected value=\"".$row2['Group_ID']."\">".$row2['Group_Name']."</option>";
		}	
		else {
			echo "<option value=\"".$row2['Group_ID']."\">".$row2['Group_Name']."</option>";
		}
	}
	mysql_data_seek($groups,0);
	echo "</select>";
	echo "</td>";
	echo "<td>".date("M jS",$row['LastSignIn'])."</td>";
	echo "<td><input name=\"delete".$row['User_ID']."\" type=\"checkbox\" id=\"delete\" value=\"delete\"></td>";
	echo "</tr>";
	}
	
echo <<< EOT
<tr>
<td>
<input type="submit" size="1" value="Modify">
</form>
</td>
</tr>
</table>
            
        </div>
        
    </div>

</div>
</body>
</html>
EOT;
//include("models/clean_up.php"); 
?>
