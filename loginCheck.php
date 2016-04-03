<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        //post user information
        $myusername = htmlentities($_POST["usrName"]);
        $mypassword = htmlentities($_POST["pssWord"]);
        $submit = htmlentities($_POST['submitLogin']);

        include 'Menu.php';

        require_once 'dblogin.php';

        //sanitize input from the user
        $myusername = $con->real_escape_string($myusername);
        $myusername = stripslashes($myusername);
        $mypassword = $con->real_escape_string($mypassword);
        $mypassword = stripslashes($mypassword);

//create salt variable using the same string used to salt the hash when users create an account             
//hash password entered by the user to sign in to compare to hashed password in database
            $salt = '3R';
            $mypassword = crypt($mypassword, $salt);
//sql query checks if login info exists
            $check = "SELECT username, password FROM Form WHERE username = '$myusername' AND password = '$mypassword'";
            $check2 = $con->query($check);
            if (!$check2) {
                die("Could not carry out action <br>" . $con->error);
            } else {
//if login information does not exist or exists more than one time, user is denied access
                $num = mysqli_num_rows($check2);
                if ($num != 1) {
                    echo "Wrong Username and/or Password";
                } else {
                    echo "<h1>Welcome to Our Catalogue!</h1>"
                    . "<a href='catalogue.php'><h2>Click Here to Continue</h2></a>";
                }
            }
        //database connection closed
        $con->close();
        ?>
    </body>
</html>
