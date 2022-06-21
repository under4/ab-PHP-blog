<?php 
require_once("../db.php");
require_once("../functions.php");

$user_data = check_login($con);
if(!$user_data){
    header("Location: ../login.php");
}
if($user_data && $user_data["admin"]==0){
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/root.css">
        <link rel="stylesheet" href="../css/header.css">
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    </head>
    

    <body>
        <section id="header">
            <div>
                <a href="../index.php">
                    <h1 id="logo">Blog Overflow</h1>
                </a>
                
                <div id="links">
                </div>
            </div>
            <div id="login">
                <?php 
                    if($user_data){
                        echo '<p>' .$user_data["name"].'</p>';
                        echo '
                            <a href="../index.php"><button>Exit Panel</button></a>
                            <a href="logout.php"><button>Log Out</button></a>';
                    } else {
                        echo '
                        <a href="login.php">Login</a>
                        <a href="signUp.php"><button>Sign Up</button></a>';
                    }
                ?>

                
            </div>
        </section>
        
    </body>
</html>