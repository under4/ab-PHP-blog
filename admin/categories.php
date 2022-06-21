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
        <div class="flex">
            <?php require_once("side.php") ?>
            <div id="main" class="categoriesContainer">
                <form method="post">
                    <input name="categoryName" type="text" placeholder="Name" require>
                    <input type="submit" value="Add New">
                    <?php 
                        if ($_POST && $_POST["categoryName"] != ""){
                            $name = $_POST["categoryName"];
                            $query = $con -> query("SELECT * FROM categories WHERE category LIKE '$name'");
                            if($query -> num_rows == 0){
                                $ids = "";
                                $addCat = $con -> prepare("INSERT INTO categories (category, post_ids) VALUES ('$name','$ids')");
                                $addCat -> execute();
                            } else {
                                echo "This Category already exists";
                            }
                        }
                    ?>
                </form>

                <div id="adminCategories">
                    <?php 
                            $data = returnCategories($con);
                            foreach($data as $row){
                                $catName = $row[0];
                                $catLength = count(explode(",",$row[1]));
                                if($catLength == 1 && explode(",",$row[1])[0] == ""){
                                    $catLength = 0;
                                }
                                echo '<span class="category">
                                        <div class="categoryInfo">
                                            <h3>'. $catName .'</h3>
                                            <h3>'. $catLength .'</h3>
                                        </div>
                                        <div class="categoryButtons">
                                            <a href="deleteCategory.php?name='.$catName.'"><button>Delete</button></a>
                                            <a href="editCategory.php?name='.$catName.'"><button>Edit</button></a>
                                        </div>
                                    </span>';                                
                            }
                            
                        ?>
                    <!--
                    <span class="category">
                        <div class="categoryInfo">
                            <h3>Category Name</h3>
                            <h3>X</h3>
                        </div>
                        <div class="categoryButtons">
                            <button>Delete</button>
                            <button>Edit</button>
                        </div>
                    </span>
                        -->
                </div>
            </div>
        </div>
    </body>
</html>