<?php 
require_once("header.php");
require_once("functions.php");
?>
<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/19a4fd8ab0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/editComment.css">
    </head>
    <body>
        <?php
            parse_str($_SERVER['QUERY_STRING'], $output);
            $query = "SELECT * FROM comments WHERE comment_id LIKE '".$output["comment"]."'";
            $result = mysqli_query($con, $query);
            $data = $result -> fetch_all();

            if(!check_login($con) || $data[0][2]!=$user_data["user_id"]){
                header("Location: index.php");
            }

            if(count($data)  == 0){
                echo "This comment doesn't exist";
                die;
            }
        ?>
        <div class="flex">
            <div id="main" class="editCommentCont">
                <div>
                    <h2>Editing Comment</h2>
                    <form method="POST">
                        <textarea name="comment" rows="8" require type="text"><?php echo $data[0][4] ?></textarea>
                        <input type="submit"  value="Save Comment">
                    
                    <?php 
                        if($_POST && $_POST["comment"]!=""){
                            $newComment = $_POST["comment"];
                            $commentId = $output["comment"];
                            $query = "UPDATE comments SET comment='$newComment' WHERE comment_id='$commentId'";
                            mysqli_query($con, $query);

                            $post_id = $data[0][1];
                            $query = "SELECT slug FROM posts WHERE post_id='".$post_id."'";
                            $result = mysqli_query($con, $query);
                            $data = $result->fetch_all();
                            $slug = $data[0][7];
                            header("Location: index.php");
                        }
                    ?>
                    </form>
                </div>
            </div>
            <?php require_once("side.php") ?>
        </div>
    </body>
</html>