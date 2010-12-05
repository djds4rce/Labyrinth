
		<?php if(!isUserLoggedIn()) { ?>
             <table border="0">
               <tr>
                 <td><a href="login.php">Login</a></td>
                 <td><a href="register.php">Register</a></td>
                 <td><a href="forgot-password.php">Forgot Password</a></td>
                 
               </tr> 
            </table>
       <?php } else { ?>
 	<table border="0">
               <tr>
            	<td><a href="logout.php">Logout</a></td>
            	<td><a href="scoreboard.php">Score</a></td>
                <td><a href="question.php">Question</a></td>       			                
               </tr>
        </table>
       <?php } ?>
            
                        

