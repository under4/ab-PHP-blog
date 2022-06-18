<?php 
require_once("header.php");
require_once("../functions.php");
?>
<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/19a4fd8ab0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/root.css">
        <link rel="stylesheet" href="css/posts.css">
    </head>
    <body>
        <div class="flex">
            <?php require_once("side.php") ?>
            <div id="main" class="adminPosts">
                <div class="post">
                    <div class="postInfo">
                        <div class="postUpper">
                            <div>
                                <h3>Title Lorem, ipsum dolor.</h3>
                                <h5>Author</h5>
                            </div>
                            <div>
                                <p>10.10.2022</p>
                                <p>views?</p>
                            </div>
                        </div>
                        
                        <p>Desc Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quas distinctio officia.</p>
                    </div>
                    <img src="https://via.placeholder.com/300x250?text=thumbnail" alt="thumbnail">
                    <div class="postButtons">
                        <a href="../post.php"><button>Go To Post</button></a>
                        <a href="editPost.php"><button>Edit Post</button></a>
                        <a href="deletePost.php"><button>Delete Post</button></a>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>