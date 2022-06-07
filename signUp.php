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
                    <input type="text" placeholder="Name" required>
                    <input type="text" placeholder="Username" required>
                    <input type="password" placeholder="Password" required>
                    <label for="questionSelector">Select a recovery question</label>
                    <select id="questionSelector">
                        <option value="1">What is the name of your first pet?</option>
                        <option value="2">What is your mother's maiden name?</option>
                        <option value="3">What is the name of the town where you were born?</option>
                    </select>
                    <input type="text" placeholder="Answer" required>
                    <input type="submit" value="Register">
                </form>
                <div><p>Already Have An account?</p> <a href="login.php">Login</a></div>
            </div>   
        </div>
    </body>
</html>