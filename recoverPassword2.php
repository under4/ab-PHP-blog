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
        <link rel="stylesheet" href="css/recover2.css">
    </head>
    <body>
        <div class="flex">
            
            <div id="main">
                <form class="recover2" method="POST">
                    <p>Security Question</p>
                    <input type="text" placeholder="Answer" name="answer" id="answer">
                    <input type="password" placeholder="New Password" name="newPassword" id="newPassword">
                    <input type="submit" value="Change Password">
                    <p id="warning"></p>
                </form>

            </div>
        </div>
    </body>
</html>