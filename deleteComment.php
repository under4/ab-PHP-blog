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
        <link rel="stylesheet" href="css/newPost.css">
        <link rel="stylesheet" href="admin/css/deletePrompt.css">
        <link rel="stylesheet" href="css/deletePrompt.css">
        <title>New Post</title>
    </head>
    <body>
        <?php 
            parse_str($_SERVER['QUERY_STRING'], $output);
            $query = "SELECT * FROM comments WHERE comment_id LIKE '".$output["comment"]."'";
            $result = mysqli_query($con, $query);
            $data = $result -> fetch_all();


        ?>
        <div class="flex" >
            
            <div class="deleteCommentContainer deletePrompt">
                <h2>Are you sure you want to delete this comment?</h2>
                <span>
                    <h3>Comment: <strong><?php echo $data[0][4] ?></strong></h3>
                    <div class="deleteButtons">
                        <a <?php echo "href='functions/deleteComment.php?comment=".$data[0][0]."'" ?>><button>Delete</button></a>
                        <a href="posts.php"><button>Cancel</button></a>
                    </div>
                </span>
            </div>
        </div>
    </body>
</html>