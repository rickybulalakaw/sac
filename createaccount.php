<?php 
    session_start();
    include "db.php";
    include "functions.php";
    
if(isset($_POST['register'])) {
        require_once("db.php");
        
        $username = strip_tags($_POST['username']);        
        $pw = strip_tags($_POST['password']);
        $pw_confirm = strip_tags($_POST['password_confirm']);
        $fullname = strip_tags($_POST['fullname']);
                 
        $username = stripslashes($username);        
        $pw = stripslashes($pw);
        $pw_confirm = stripslashes($pw_confirm);
        $fullname = stripslashes($fullname);             
               
        $username = mysqli_real_escape_string($db, $username);
        $pw = mysqli_real_escape_string($db, $pw);        
        $pw_confirm = mysqli_real_escape_string($db, $pw_confirm);
        $fullname = mysqli_real_escape_string($db, $fullname);

        if($username == "") {
            echo "A username is required to create an account and will be used to log in. Click Back on your browser and enter your preferred username.";
            return;

        }

        if($pw == "" || $pw_confirm == "") {
            echo "Please insert your password. Click Back on your browser to enter correct data";
            return;
        }
        
        if($pw != $pw_confirm) {
            echo "The passwords do not match!  Click Back on your browser to enter correct data";
            // echo "<br/>".$pw."<br />";       
            // echo $pw_confirm;
            return;
        }
                                   
        $pw = password_hash($pw, PASSWORD_DEFAULT);

        // Checks if the username already exists

        $sql2 = "SELECT username from user where username = ?";

        // Create a prepared statement
        $stmt = mysqli_stmt_init($db);

        // Prepare the statement
        if(!mysqli_stmt_prepare($stmt, $sql2)){
            echo "SQL Statement Failed.";
            return;
        } else {
            // Bind parameters to the placeholders
            mysqli_stmt_bind_param($stmt, "s", $username);
            // Run parameters inside database 
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) >= 1) {
                echo "That username already exists. Please click Back on your browser and try a different username in creating your account.";
                return;
            }

        }
                
        $sql = "INSERT INTO user (username, pw, fullname) VALUES (?, ?, ?)";
       
        // Create a prepared statement
        $stmt = mysqli_stmt_init($db);

        // Prepare the statement
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL Statement Failed.";
            return;
        } else {
            // Bind parameters to the placeholders
            mysqli_stmt_bind_param($stmt, "sss", $username, $pw, $fullname);
            // Run parameters inside database 
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        }

            
           
       header("Location:/sac2");
       
       }

    include "header.php";

    navigationbar();
?>


       

    <div class="container-fluid">
       
       
       <div class="row">

        <div class="col">
            <h1>User Registration Page</h1>
            <p>This user registration page is only for initiation of your account, which still needs to be validated and activated by the MSWDO.</p>
        
        </div>
       
       </div>
       <div class="row">
            
            <div class="col-md-6 col-xs-12">
                
                
                <form action="/sac2/createaccount.php" method ="post" enctype="multipart/form-data">
                    <p><b>Username <input placeholder="Username" name="username" type="text"></p>
                    <p>Password <input placeholder="password" name="password" type="password" autofocus></p>

                    <p>Confirm Password <input placeholder="Confirm Password" name="password_confirm" type="password"></p>
                    <p>Full Name <input placeholder="Full Name" name="fullname" type="text"></p>
                    <p><b>Please check the details before clicking "Register" below</b></p>
                        
                    <input name="register" type="submit" value="Register">
                    </p>
                </form>
            
            
            </div>

            <div class="col-md-6 col-xs-12">
                <p><b>Privacy Notice</b>: By creating an account for accessing this system, you agree that you will take care of your own account. You will not share your username and password to anyone unless explicitly asked for by a legal authority in writing. </p>
            
            
            </div>
       
        </div>
            
        
                

            </div>
                </div>
            <div class="footer"></div>
           
        </div>

    </div>


    </body>
</html>

