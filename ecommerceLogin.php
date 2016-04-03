<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include "Menu.php";
        ?>
        <form name="Login" method="post" action="loginCheck.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="usrName" id="usrName"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pssWord" id="pssWord"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" name="submitLogin"></td>
                </tr>
            </table>
            <br>
            <a href="ValidateForm.php" text-decoration="none" a:hover="white">Create Account!</a>
        </form>
    </body>
</html>
