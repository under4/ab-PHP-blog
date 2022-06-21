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
        <link rel="stylesheet" href="css/recover1.css">
    </head>
    <body>
        <div class="flex">
            
            <div id="main">
                <form class="recover1" method="POST">
                    <p>What is your username?</p>
                    <input require name="username" type="text" placeholder="Username">
                    <input type="submit" value="Submit">
                    <p id="warning"></p>
                </form>

            </div>
        </div>
        <?php 
            if($_POST){
                $username = $_POST["username"];
                $query = "SELECT * FROM users WHERE user_name = '".$username."'";
                $result = mysqli_query($con, $query);
                $data = $result -> fetch_all();
                
                if(count($data) == 0){
                    echo '<p>No user by that name</p>';
                } else {
                    header("Location: recoverPassword2.php?user=". $data[0][1]);
                }

            }
        ?>
    </body>
</html>