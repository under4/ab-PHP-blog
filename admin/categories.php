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
        <link rel="stylesheet" href="css/categories.css">
    </head>
    <body>
        <div class="flex">
            <?php require_once("side.php") ?>
            <div id="main" class="categoriesContainer">
                <form method="post">
                    <input type="text" placeholder="Name">
                    <input type="submit" value="Add New">
                </form>
            </div>
        </div>
    </body>
</html>