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
    </head>
    <body>
        <div class="flex" >
            <?php require_once("side.php") ?>
            <div class="newPostContainer">
                <form method="POST">
                    <span>
                        <h2>Title*</h2>
                        <input type="text" id="title" name="title">
                    </span>
                    <label for="thumbnail">Thumbnail</label>
                    <input id="thumbnail" type="file" placeholder="thumbnail" name="thumbnail">
                    <span>
                        <h2>Category</h2>
                        <select name="categories" id="categories">
                            <option value="1">pholder</option>
                            <option value="1">pholder</option>
                        </select>
                    </span>
                    <span>
                        <h2>Text</h2>
                        <textarea name="text" id="text" rows="7" placeholder="Text"></textarea>
                        <script>
                            CKEDITOR.replace('text');
                        </script>
                    </span>
                    <input type="submit" value="Publish Post">
                </form>
            </div>
        </div>
    </body>
</html>