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
        <title>New Post</title>
    </head>
    <body>
        <div class="flex" >
            <?php require_once("side.php")?>
            <div class="newPostContainer">
                <form method="POST" enctype="multipart/form-data">
                    <span>
                        <h2>Title*</h2>
                        <input value="" type="text" id="title" name="title" require>
                    </span>
                    <label id="thumbLabel" for="thumbnail">Thumbnail</label>
                    <input id="thumbnail" accept="image/x-png,image/gif,image/jpeg" type="file" placeholder="thumbnail" name="file">
                    <span>
                        <h2>Description</h2>
                        <textarea type="text" name="description" rows="5"></textarea>
                    </span>
                    <span>
                        <h2>Category</h2>
                        <select name="category" id="categories">
                            <?php 
                                $categories = returnCategories($con);
                                foreach($categories as $row){
                                $catName = $row[0];
                                echo '<option value='.$catName.'>
                                        '.$catName.'
                                    </option>';                                
                                }

                            ?>
                        </select>
                    </span>
                    <span>
                        <h2>Text</h2>
                        <textarea name="text" id="text" rows="7" placeholder="Text"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#text' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                        </script>
                    </span>
                    <input type="submit" value="Publish Post">
                    <?php 
                        //print_r($_POST);
                        if($_POST && $_POST["title"]){
                            $title = $_POST["title"];
                            $author = $user_data["name"];
                            $category = $_POST["category"];
                            $text = $_POST["text"];
                            $slug = str_replace(' ', '-', strtolower($_POST["title"]));
                            $post_id = random_num(8);
                            $description = $_POST["description"];
                            $file_name = "";
                            
                            if($_FILES["file"] && $_FILES["file"]["error"] == 0){
                                $img_name = $_FILES["file"]["name"];
                                $img_size = $_FILES["file"]["size"];
                                $tmp_name = $_FILES["file"]["tmp_name"];
                                
                                $file_name = uniqid("IMG-", true) . '.' . strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                                $img_upload_path = "../res/img/uploadedImages/". $file_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                            }
                            
                            $query = "INSERT INTO posts (post_id, categories, title, text, thumbnail, slug, author, description) VALUES ('$post_id', '$category', '$title', '$text', '$file_name', '$slug', '$author', '$description')";
                            mysqli_query($con, $query);

                            $query = "SELECT * FROM categories WHERE category='".$category."'";
                            $result = mysqli_query($con, $query);
                            $data = $result -> fetch_all();

                            if($data[0][1] == ""){
                                $newIds = $post_id;
                            } else {
                                $newIds = $data[0][1].",".$post_id;
                            }
                            $query = "UPDATE categories SET post_ids='".$newIds."' WHERE category='".$category."'";
                            $result = mysqli_query($con, $query);

                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>