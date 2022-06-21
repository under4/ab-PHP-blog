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
        <title>Categories</title>
    </head>
    <body>
        <?php
            parse_str($_SERVER['QUERY_STRING'], $output);
            $query = "SELECT * FROM categories WHERE category LIKE '".$output["name"]."'";
            $result = mysqli_query($con, $query);
            $data = $result -> fetch_all();
            if(count($data)  == 0){
                header("Location:404.php");
            }
        ?>
        <div class="flex">
            <?php require_once("side.php") ?>
            <div id="main" class="categoriesContainer">
                <div id="adminCategories">
                    <h2>Change Category Name</h2>
                    <form method="POST">
                        <input name="name" type="text" <?php echo "value='".$output['name']."'" ?>>
                        <input type="submit"  value="Change Name">
                    
                    <?php 
                        if($_POST){
                            $newName = strtolower($_POST["name"]);
                            $name = $output['name'];

                            $query = "UPDATE categories SET category='$newName' WHERE category='$name'";
                            $result = mysqli_query($con, $query);
                        }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>