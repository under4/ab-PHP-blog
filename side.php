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
        <div id="sideContainer">
            <section id="search">
                <form>
                    <input type="text" placeholder="Search For Posts">
                    <input type="submit" value="Search">
                </form>
            </section>
            <section id="categories">
                <div>
                    <h3>Top Categories</h3>
                    <a href="categories.php">See All</a>
                </div>
                <ul>
                    <li><a href=""><span class="category">CategoryName</span><span class="numOfPostsInCategory">5</span></a></li>
                    <li><a href=""><span class="category">CategoryName</span><span class="numOfPostsInCategory">5</span></a></li>
                    <li><a href=""><span class="category">CategoryName</span><span class="numOfPostsInCategory">5</span></a></li>
                    <li><a href=""><span class="category">CategoryName</span><span class="numOfPostsInCategory">5</span></a></li>
                    <li><a href=""><span class="category">CategoryName</span><span class="numOfPostsInCategory">5</span></a></li>
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
