<?php 
require_once("header.php");
require_once("functions.php");

if(check_login($con)){
    header("Location: index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    
        
    if(!empty($user_name) && !empty($password)){
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result){
            if(mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data["password"] == $password){
                    $_SESSION["user_id"] = $user_data["user_id"];
                    header("Location: index.php");
                    die;
                } else {
                    echo "wrong Password";
                }
            }
        }
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
                    <input type="text" name="user_name" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Login">
                </form>
                <div><a href="recoverPassword.php">Forgot Passoword</a> <p> or</p></div>
                <div><p>Dont Have An account?</p> <a href="signUp.php">Create a new Account</a></div>
            </div>   
        </div>
    </body>
</html>