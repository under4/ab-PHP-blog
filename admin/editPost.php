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
        <?php 
            parse_str($_SERVER['QUERY_STRING'], $output);
            $post_data = returnPost($con, $output["post"]);
            ob_start();
        ?>
        <div class="flex" >
            <?php require_once("side.php") ?>
            <div class="newPostContainer">
                <form method="POST" enctype="multipart/form-data">
                    <span>
                        <h2>Title*</h2>
                        <input type="text" <?php echo "value='".$post_data[3]."'" ?> id="title" name="title">
                    </span>
                    <div id="thumbnailEditContainer">
                        <label id="thumbLabel" for="thumbnail">Thumbnail</label>
                        <div>
                            <label for="updateThumbnail">Update Thumbnail</label>
                            <input type="checkbox" name="updateThumbnail" id="updateThumbnail">
                        </div>
                    </div>
                    
                    <input id="thumbnail" accept="image/x-png,image/gif,image/jpeg" type="file" placeholder="thumbnail" name="thumbnail">
                    <span>
                        <h2>Description</h2>
                        <textarea type="text"  name="description" rows="5"><?php echo $post_data[10] ?></textarea>
                    </span>
                    <span>
                        <h2>Category</h2>
                        <select <?php echo "value='".$post_data[2]."'" ?> name="category" id="categories">
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
                        <textarea <?php echo "value='".$post_data[5]."'" ?> name="text" id="text" rows="7" placeholder="Text"><?php echo $post_data[4] ?></textarea>
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
                            $updateThumbnail = isset($_POST["updateThumbnail"]);
                            $title = $_POST["title"];
                            $author = $user_data["name"];
                            $category = $_POST["category"];
                            $text = $_POST["text"];
                            $slug = str_replace(' ', '-', strtolower($_POST["title"]));
                            $description = $_POST["description"];
                            $file_name = "";
                            
                            if($updateThumbnail && $_FILES["file"] && $_FILES["file"]["error"] == 0){
                                $img_name = $_FILES["file"]["name"];
                                $img_size = $_FILES["file"]["size"];
                                $tmp_name = $_FILES["file"]["tmp_name"];
                                
                                $file_name = uniqid("IMG-", true) . '.' . strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                                $img_upload_path = "../res/img/uploadedImages/". $file_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                            }
                            
                            $query = "UPDATE posts SET categories='".$category."', title='".$title."', text='".$text."', slug='".$slug."', description='".$description."' WHERE post_id='".$post_data[1]."'";
                            mysqli_query($con, $query);
                            
                            if(false && $category != $post_data[0][2]){
                                $query = "SELECT * FROM categories WHERE category='".$category."'";
                                $result = mysqli_query($con, $query);
                                $data = $result -> fetch_all();

                                if($data[0][1] == ""){
                                    $newIds = $post_id;
                                } else {
                                    $newIds = $data[0][1].",".$post_id;
                                }
                                $query = "UPDATE categories SET post_ids='".$newIds."' WHERE category='".$category."'";
                                mysqli_query($con, $query);
                            }
                            ob_end_clean();
                            header("Location: ../post.php?post=".$slug);
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