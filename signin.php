<?php
    session_start();    
    
    include "db.php";
    include "functions.php";
    
    if(isset($_POST['signin'])){
        require_once("db.php");
        $username = strip_tags($_POST['username']);
        $pw = strip_tags($_POST['pw']);
        
        $username = stripslashes($username);
        $pw = stripslashes($pw);
        
        $username = mysqli_real_escape_string($db, $username);
        $pw = mysqli_real_escape_string($db, $pw); 
        
        $sql = "SELECT id, pw, fullname FROM user WHERE username=? and status = 'Active' LIMIT 1";
        
        // Create prepared statement

        $stmt = mysqli_stmt_init($db);

        // Prepare the prepared statment 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL Statement Failed";
        } else {
            // Bind parameters to placeholder
            mysqli_stmt_bind_param($stmt, "s", $username);
            // Run parameters inside database 
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) != NULL){
                $row = mysqli_fetch_assoc($result);
            
                $id = $row['id'];
                $db_password = $row['pw'];
                $db_fullname = $row['fullname'];     
                
                if(password_verify($pw, $db_password) == TRUE) {
                    $_SESSION['sac_id'] = $id;
                    
                    $_SESSION['fullname'] = $db_fullname;         

                    $registersignin = "INSERT INTO systemrecord (user, object, record) values ($id, $id, 'Signed in to version 2')";
                    $process = $db->query($registersignin);

                    // $settimezone = "SET GLOBAL time_zone = '+8:00'";
                    // $processtime = $db->query($settimezone);
                                        
                    header("Location: /sac2");
                    
                } else {
                    echo "You did not enter the correct details<br />";
                    echo "<p>Please make sure you enter the details correctly when you try again. Thank you.</p>";
                    return;
                }
    
            } else {
                echo "Sorry, that username does not exist. Please make sure you enter the details correctly when you try again. Thank you.";
                return;
            }

        }

                
        
    }

    include "header.php";


?>

    
        <?php 
        
       
        navigationbar(); 
        $sessiontype = $_SESSION['sessiontype'];
        // echo $sessiontype;
        
        ?>

        <div class="container-fluid">               
                
        <h1>Social Amelioration Program Input Form</h1>
        
        <p>Sign-in Page</p>
        <form action="/sac2/signin.php" method="post" enctype="multipart/form-data">
            <label>Username</label>
            <input placeholder="Username" name="username" type="text" autofocus></p>
            <label>Password</label>  
            <input placeholder="Password" name="pw" type="password">
            <br><br>
            <input name="signin" type="submit" value="Sign in">
        </form>
        <br/>

        <p> If you are a new user, <a href='/sac2/createaccount'>create an account first</a>.</p>
                
        <p><small><font color='white'>Developed by Distinct Shadow.</font></small></p>
                        
        </div>
    
	</body>
</html>
