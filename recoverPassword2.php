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
        <?php 
            parse_str($_SERVER['QUERY_STRING'], $output);
            $query = "SELECT * FROM users WHERE user_id='".$output["user"]."'";
            $result = mysqli_query($con, $query);
            $dataAll = $result -> fetch_all();
            $user = $dataAll[0];

            $recoveryQuestions = array('What is the name of your first pet?', "What is your mother's maiden name?", 'What is the name of the town where you were born?');
            $userQuestion = $recoveryQuestions[$user[6]-1];
        ?>
        <div class="flex">
            
            <div id="main">
                <form class="recover2" method="POST">
                    <p><?php echo $userQuestion ?></p>
                    <input type="text" placeholder="Answer" name="answer" id="answer">
                    <input type="password" placeholder="New Password" name="newPassword" id="newPassword">
                    <input type="submit" value="Change Password">
                    <p id="warning"></p>
                </form>

            </div>
        </div>
        <?php
            if($_POST){
                if($_POST["answer"] == $user[7]){
                    $newPass = $_POST["newPassword"];
                    $user_id = $output["user"];
                    $query = "UPDATE users SET password='".$newPass."' WHERE user_id='".$user_id."'";
                    mysqli_query($con, $query);
                    header("Location: login.php");
                }
            }
        ?>
    </body>
</html>