<?php 
require_once("header.php")
?>
<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/19a4fd8ab0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div id="loginContainer" class="flex">
            <div id="main">
                <form>
                    <input type="text" placeholder="Username" required>
                    <input type="password" placeholder="Password" required>
                    <input type="submit" value="Login">
                </form>
                <div><a href="passwordRecover.php">Forgot Passoword</a> <p> or</p></div>
                <div><p>Dont Have An account?</p> <a href="signUp.php">Create a new Account</a></div>
            </div>   
        </div>
    </body>
</html>