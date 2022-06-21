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
        <link rel="stylesheet" href="css/newPost.css">
        <link rel="stylesheet" href="css/deletePrompt.css">
        <title>New Post</title>
    </head>
    <body>
        <?php 
            parse_str($_SERVER['QUERY_STRING'], $output);
            $post_data = returnPost($con, $output["post"]);

        ?>
        <div class="flex" >
            <?php require_once("side.php")?>
            <div class="deletePostContainer deletePrompt">
                <h3>Are you sure you want to delete this post?</h3>
                <span>
                    <h2>Title: <strong><?php echo $post_data[3] ?></strong></h2>
                    <div class="deleteButtons">
                        <a <?php echo "href='functions/deletePost.php?post_id=".$post_data[1]."'" ?>><button>Delete</button></a>
                        <a href="posts.php"><button>Cancel</button></a>
                    </div>
                </span>
            </div>
        </div>
    </body>
</html>