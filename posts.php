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
        <title>Posts</title>
    </head>
    <body>
        <?php 
            parse_str($_SERVER['QUERY_STRING'], $output);
            if(isset($output["search"])){
                $searchQ = "%".$output["search"]."%";
                $query = "SELECT * FROM posts WHERE title LIKE '".$searchQ."'";
                $result = mysqli_query($con, $query);
                $post_data = $result -> fetch_all();
            } else if(isset($output["category"])){
                $query = "SELECT * FROM posts WHERE categories='".$output["category"]."'";
                $result = mysqli_query($con, $query);
                $post_data = $result -> fetch_all();
            } else {
                $post_data = returnPosts($con);
            }
            
        ?>
        <div class="flex">
            <div id="main">
                <div class="posts">
                    <?php 
                            if(count($post_data) == 0){
                                echo '<p>There are no posts at the moment</p>';
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
                                            <a href="post.php?post='.$row[7].'">Read More...</a>                       
                                        </div>
                                        <img src="'.$picUrl.'" alt="">
                                    </div></a>';
                            }
                        ?>
                    <!--<div class="post">
                        <div class="postInfo">
                            <div>
                                <div class="postUpper">
                                    <div>
                                        <h3>Post name Lorem, ipsum.</h3>
                                        <p>Author</p>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius, adipisci quasi dicta minima a autem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nostrum deleniti aperiam?</p>
                            </div>
                            <a href="">Read More...</a>                             
                        </div>
                        <img src="https://via.placeholder.com/500x400?text=post" alt="">
                    </div>-->
                </div>
            </div>    
            <?php require_once("side.php") ?>
        </div>
    </body>
</html>