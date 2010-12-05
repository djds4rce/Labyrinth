<?php
	/*
		UserCake Version: 1.4
		http://usercake.com
	
		Developed by: Adam Davis
	*/
	require_once("models/config.php");
        function afterlogin()
         {
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
          }
 	
	//Prevent the user visiting the logged in page if he/she is already logged in
	if(isUserLoggedIn()) { afterlogin(); }
?>
<?php
	/* 
		Below is a very simple example of how to process a login request.
		Some simple validation (ideally more is needed).
	*/

//Forms posted
if(!empty($_POST))
{
		$errors = array();
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);

		//Perform some validation
		//Feel free to edit / change as required
		if($username == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
		}
		if($password == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			//A security note here, never tell the user which credential was incorrect
			if(!usernameExists($username))
			{
				$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
			}
			else
			{
				$userdetails = fetchUserDetails($username);
			
				//See if the user's account is activation
				if($userdetails["Active"]==0)
				{
					$errors[] = lang("ACCOUNT_INACTIVE");
				}
				else
				{
					//Hash the password and use the salt from the database to compare the password.
					$entered_pass = generateHash($password,$userdetails["Password"]);

					if($entered_pass != $userdetails["Password"])
					{
						//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
						$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
					}
					else
					{
						//Passwords match! we're good to go'
						
						//Construct a new logged in user object
						//Transfer some db data to the session object
						$loggedInUser = new loggedInUser();
						$loggedInUser->email = $userdetails["Email"];
						$loggedInUser->user_id = $userdetails["User_ID"];
						$loggedInUser->hash_pw = $userdetails["Password"];
						$loggedInUser->display_username = $userdetails["Username"];
						$loggedInUser->clean_username = $userdetails["Username_Clean"];
						
						//Update last sign in
						$loggedInUser->updateLastSignIn();
		
						$_SESSION["userCakeUser"] = $loggedInUser;
						
						//Redirect to last unaswered question
                                                afterlogin();
											}
				}
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
        
        <h1>Login</h1>
        
        <?php
        if(!empty($_POST))
        {
        ?>
        <?php
        if(count($errors) > 0)
        {
        ?>
        <div id="errors">
        <?php errorBlock($errors); ?>
        </div>     
        <?php
        } }
        ?> 
        
            <div id="regbox">
                <form name="newUser" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <p>
                    <label>Username:</label>
                    <input type="text" name="username" />
                </p>
                
                <p>
                     <label>Password:</label>
                     <input type="password" name="password" />
                </p>
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Login" class="submit" />
                </p>
                <a href="register.php">Register</a>
                </form>
                
            </div>
        </div>
        
            <div class="clear"></div>
        </div>
</div>
</body>
</html>


