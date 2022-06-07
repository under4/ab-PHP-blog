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
    </head>
    <body>
        <div class="flex">
            <div id="main">
                <div class="posts">
                    <div class="post">
                        <div class="postInfo">
                            <div>
                                <div class="postUpper">
                                    <div>
                                        <h3>Post name Lorem, ipsum.</h3>
                                        <p>Author</p>
                                    </div>
                                    <div>
                                        <p><span class="iconSmall"><?php include("res/svg/read.svg") ?></span> 5 min read</p>
                                        <p><span class="iconSmall"><?php include("res/svg/date.svg") ?></span> 10.01.2022</p>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius, adipisci quasi dicta minima a autem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nostrum deleniti aperiam?</p>
                            </div>
                            <a href="">Read More...</a>                             
                        </div>
                        <img src="https://via.placeholder.com/500x400?text=post" alt="">
                    </div>
                </div>
            </div>    
            <?php require_once("side.php") ?>
        </div>
    </body>
</html>