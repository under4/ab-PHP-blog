<?php 
session_start();
require_once("db.php");
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
                    <a href="categories.php">Categories</a>
                    <a href="about.php">About</a>
                </div>
            </div>
            <div id="login">
                <a href="login.php">Login</a>
                <a href="signUp.php"><button>Sign Up</button></a>
            </div>
        </section>
        
    </body>
</html>