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
        <title>Posts</title>
    </head>
    <body>
        <div class="flex">
            <?php require_once("side.php") ?>
            <div id="main" class="adminPosts">

                <?php 
                    $posts = returnPosts($con);
                    foreach($posts as $row){
                        //print_r($row);
                        $dateStr = date_create($row[6]);
                        $date = date_format($dateStr, "d/m/Y");
                        if($row[5]==""){
                            $picUrl = "../res/img/placeholderImages/".randomImage();
                        } else {
                            $picUrl = "../res/img/uploadedImages/".$row[5];
                        }

                        echo '<div class="post">
                                <div class="postInfo">
                                    <div class="postUpper">
                                        <div>
                                            <h3>'.$row[3].'</h3>
                                            <h5>'.$row[9].'</h5>
                                        </div>
                                        <div>
                                            <p>'.$date.'</p>
                                        </div>
                                    </div>
                                    <p>'.$row[10].'<p/>
                                </div>
                                <img src="'.$picUrl.'" alt="thumbnail">
                                <div class="postButtons">
                                    <a href="../post.php?post='.$row[7].'"><button>Go To Post</button></a>
                                    <a href="editPost.php?post='.$row[7].'"><button>Edit Post</button></a>
                                    <a href="deletePost.php?post='.$row[7].'"><button>Delete Post</button></a>
                                </div>
                            </div>';                                
                    }
                ?>

            </div>
        </div>
    </body>
</html>