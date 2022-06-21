<?php 
require_once("db.php");
require_once("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/header.css">
    </head>
    

    <body>
        <section id="header">
            <div>
                <a href="index.php">
                    <h1 id="logo">Blog Overflow</h1>
                </a>
                
                <div id="links">
                    <a href="index.php">Home</a>
                    <a href="posts.php">Posts</a>
                </div>
            </div>
            <?php 
                
            ?>
            <div id="login">
                <?php 
                    if($user_data){
                        echo '<p>' .$user_data["name"].'</p>';
                        if($user_data && $user_data["admin"] == 1){
                            echo '
                                <a href="admin/posts.php"><button>Panel</button></a>
                            ';
                        }
                        echo '
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