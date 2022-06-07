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
        <link rel="stylesheet" href="css/post.css">
    </head>
    <body>
        <div id="post" class="flex">
            <div id="main">
                <!-- Post Section Start -->
                <section>
                    <div class="postUpper">
                        <h2>Post Name Lorem, ipsum dolor.</h2>
                        <p>Author</p>
                    </div>
                    <img id="postHero" src="https://via.placeholder.com/500x400?text=post" alt="">
                    <p>post Content Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eligendi quisquam fugiat laudantium perferendis, alias nam culpa. Porro officiis voluptas quisquam natus! Cumque et est similique laboriosam error, labore commodi.</p>
                </section>
                <!-- Post Section End -->
                <!-- Comments Section Start -->
                <section id="commentsContainer">
                    <h2>Comments</h2>
                    <form action="" id="newComment">
                        <h3>New Comment</h3>
                        <textarea name="comment" id="" cols="50" rows="4" placeholder="Type a comment"></textarea>
                        <input type="submit"  value="Post Comment">
                    </form>
                    <div id="comments">
                        <div class="comment">
                            <div class="commentUpper">
                                <p>Author</p>
                                <p>10.02.2022</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam animi repudiandae quasi.</p>
                            <div class="commentButtons">
                                <span>Edit Comment</span>
                                <span>Delete Comment</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>    
            <?php require_once("side.php") ?>
        </div>
    </body>
</html>