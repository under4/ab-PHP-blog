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
        <?php 
            $post_data = returnPosts($con);
        ?>
        <div class="flex">
            <div id="main">
                <!-- Hero Start -->
                <section id="hero">
                    <?php 
                        $latestDate = "";
                        $latestPost = $post_data[0];
                        if($latestPost[5]==""){
                            $picUrl = "res/img/placeholderImages/".randomImage();
                        } else {
                            $picUrl = "res/img/uploadedImages/".$latestPost[5];
                        }
                        echo '<a href="post.php?post='.$latestPost[7].'"><div id="latestPost">
                            <div id="latestInfo">
                                <div id="latestDateInfo" class="flex">
                                    <h4>Latest Post</h4>
                                    <div class="flex">
                                        <p>'.$latestDate.'</p>
                                    </div>
                                </div>
                                <div id="latestInfoName">
                                    <h2>'.$latestPost[3].'</h2>
                                    <p>'.$latestPost[9].'</p>
                                </div>
                                
                                <p class="description">'.$latestPost[10].'</p>
                                <span><span class="category">'.$latestPost[2].'</span></span>
                            </div>
                            <img src="'.$picUrl.'" alt=""/>
                        </div></a>';
                        array_shift($post_data);
                    ?>
                </section>
                <!-- Hero End -->
                <!-- Index Posts Start -->
                <section id="indexPosts">
                    <div>
                        <h2>Latest Posts</h2>
                    </div>
                    <div id="latestPostsIndex">
                        <?php 
                            if(count($post_data) == 0){
                                echo '<p>There are no other posts at the moment</p>';
                            }
                            foreach ($post_data as $row) {
                                $dateStr = date_create($row[6]);
                                $date = date_format($dateStr, "d/m/Y");
                                if ($row[5]=="") {
                                    $picUrl = "res/img/placeholderImages/".randomImage();
                                } else {
                                    $picUrl = "res/img/uploadedImages/".$row[5];
                                }
                                echo '<a href="post.php?post='.$row[7].'"><div class="post">
                                        <div class="postInfo">
                                            <div>
                                                <div class="postUpper">
                                                    <div>
                                                        <h3>'.$row[3].'</h3>
                                                        <p>'.$row[9].'</p>
                                                    </div>
                                                    <div>
                                                        <p><span class="iconSmall">'.$date.'</p>
                                                    </div>
                                                </div>
                                                <p>'.$row[10].'</p>
                                            </div>     
                                            <a href="">Read More...</a>                       
                                        </div>
                                        <img src="'.$picUrl.'" alt="">
                                    </div></a>';
                            }
                        ?>
                    </div>
                </section>
                <!-- Index Posts End -->
            </div>
            <?php require_once("side.php") ?>
        </div>
        
    </body>
</html>

<!-- https://via.placeholder.com/411x60 -->