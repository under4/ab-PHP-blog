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
        <link rel="stylesheet" href="css/index.css">
        <title>Blog Overflow</title>
    </head>
    <body>
        <div class="flex">
            <div id="main">
                <!-- Hero Start -->
                <section id="hero">
                    <div id="latestPost">
                        <div id="latestInfo">
                            <div id="latestDateInfo" class="flex">
                                <h4>Latest Post</h4>
                                <div class="flex">
                                    <p><?php include("res/svg/date.svg") ?> 10.04.2022</p>
                                    <p><?php include("res/svg/read.svg") ?> 5 min read</p>
                                </div>
                            </div>
                            <div id="latestInfoName">
                                <h2>Post Name Lorem, ipsum dolor.</h2>
                                <p>Author</p>
                            </div>
                            
                            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro eos quae quis...</p>
                            <span><span class="category">Web Design</span></span>
                        </div>
                        <img src="https://via.placeholder.com/500x400?text=latestPost" alt="">
                    </div>
                </section>
                <!-- Hero End -->
                <!-- Index Posts Start -->
                <section id="indexPosts">
                    <div>
                        <h2>Latest Posts</h2>
                    </div>
                    <div id="latestPostsIndex">
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
                </section>
                <!-- Index Posts End -->
            </div>
            <!-- Sidebar Start -->

            <?php require_once("side.php") ?>

            
            <!-- Sidebar End -->
        </div>
        
    </body>
</html>

<!-- https://via.placeholder.com/411x60 -->