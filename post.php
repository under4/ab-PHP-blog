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
                <?php 
                    parse_str($_SERVER['QUERY_STRING'], $output);
                    $query = "SELECT * FROM posts WHERE slug='".$output["post"]."'";
                    $result = mysqli_query($con, $query);
                    $dataAll = $result -> fetch_all();
                    $data = $dataAll[0];

                    $dateStr = date_create($data[6]);
                    $date = date_format($dateStr, "d/m/Y");

                    if($data[5]==""){
                        $picUrl = "res/img/placeholderImages/".randomImage();
                    } else {
                        $picUrl = "res/img/uploadedImages/".$data[5];
                    }

                    //print_r($data);
                    echo '<section>
                            <div class="postUpper">
                                <h2>'.$data[3].'</h2>
                                <p>'.$data[9].'</p>
                            </div>
                            <img id="postHero" src="'.$picUrl.'" alt="">
                            <span>'.$data[4].'</span>
                        </section>';
                ?>
                
                <!-- Post Section End -->
                <!-- Comments Section Start -->
                <section id="commentsContainer">
                    <h2>Comments</h2>
                    <?php 
                        if(check_login($con)){
                            echo '<form method="POST" id="newComment">
                                    <h3>New Comment</h3>
                                    <textarea required name="comment" id="" cols="50" rows="4" placeholder="Type a comment"></textarea>
                                    <input type="submit"  value="Post Comment">
                                </form>';
                        } else {
                            echo "<a href='login.php' id='loginPrompt'>Login To Comment</a>";
                        }
                    ?>
                    
                    <div id="comments">
                        <?php 
                            $query = "SELECT * FROM comments WHERE post_id='".$data[1]."'";
                            $commentData = mysqli_query($con, $query);
                            $postComments = $commentData->fetch_all();

                            foreach ($postComments as $row) {
                                if($row[2] == $user_data["user_id"]){
                                    $commentButtons = '<a href=editComment.php?comment='.$row[0].'><span>Edit Comment</span></a>
                                                    <a href=deleteComment.php?comment='.$row[0].'><span>Delete Comment</span></a>';
                                } else {
                                    $commentButtons = "";
                                }

                                $dateStr = date_create($row[5]);
                                $date = date_format($dateStr, "d/m/Y");

                                echo '<div class="comment">
                                        <div class="commentUpper">
                                            <p>'.$row[3].'</p>
                                            <p>'.$date.'</p>
                                        </div>
                                        <p>'.$row[4].'</p>
                                        <div class="commentButtons">
                                            '.$commentButtons.'
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <?php 
                        if($_POST){
                            $comment_id = random_num(10);
                            $comment = $_POST["comment"];
                            $post_id = $data[1];
                            $author = $user_data["name"];
                            $author_id = $user_data["user_id"];
                            
                            if($comment != ""){
                                $query = "INSERT INTO comments (comment_id, comment, post_id, author_name, author_id) VALUES ('".$comment_id."', '".$comment."', '".$post_id."', '".$author."', '".$author_id."')";
                                mysqli_query($con, $query);

                                $post = returnPost($con, $data[7]);

                                $commentsOnPost = explode(",",$post[8]);
                                if(count($commentsOnPost)>1){
                                    $newCommentsOnPost = $post[8].",".$comment_id;
                                } else {
                                    $newCommentsOnPost = $comment_id;
                                }

                                $query = "UPDATE posts SET comments='".$newCommentsOnPost."'";
                                mysqli_query($con, $query);
                            }
                        }
                    ?>
                </section>
            </div>    
            <?php require_once("side.php") ?>
        </div>
    </body>
</html>