<?php 
require_once("header.php");
require_once("functions.php");

if(check_login($con)){
    header("Location: index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $recovery_q = $_POST["recovery_q"];
    $recovery_a = $_POST["recovery_a"];

    if(!empty($user_name) && !empty($name) && !empty($password) && !empty($recovery_a)){
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password, name, recovery_q, recovery_a) values ('$user_id', '$user_name', '$password', '$name', '$recovery_q', '$recovery_a')";
        mysqli_query($con, $query);
        header("Location: login.php");
        die;
    }

}

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
                <form method="POST">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="user_name" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <label for="questionSelector">Select a recovery question</label>
                    <select name="recovery_q" id="questionSelector">
                        <option default value="1">What is the name of your first pet?</option>
                        <option value="2">What is your mother's maiden name?</option>
                        <option value="3">What is the name of the town where you were born?</option>
                    </select>
                    <input type="text" name="recovery_a" placeholder="Answer" required>
                    <input type="submit" value="Register">
                </form>
                <div><p>Already Have An account?</p> <a href="login.php">Login</a></div>
            </div>   
        </div>
    </body>
</html>