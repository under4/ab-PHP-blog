<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/19a4fd8ab0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/root.css">
        <link rel="stylesheet" href="css/side.css">
    </head>
    <body>
        <?php 
            $post_info = returnPosts($con);
        ?>
        <div id="sideContainer">
            <section id="categories">
                <div>
                    <h3>Categories</h3>
                </div>
                <ul>
                    <?php 
                        $categories = returnCategories($con);
                        foreach ($categories as $row) {
                            $count = count(explode(",",$row[1]));
                            if($count == 1 && explode(",",$row[1])[0] == ""){
                                $count = 0;
                            }
                            echo '<li><a href="posts.php?category='.$row[0].'"><span class="category">'.$row[0].'</span><span class="numOfPostsInCategory">'.$count.'</span></a></li>';
                        }
                    ?>
                </ul>
            </section>
            <section id="socialLinks">
                <h3>My Social Media</h3>
                <div>
                    <a href="" class="social"><?php include("res/svg/github.svg") ?></a>
                    <a href="" class="social"><?php include("res/svg/website.svg") ?></a>
                </div>
            </section>
        </div>
    </body>
</html>
