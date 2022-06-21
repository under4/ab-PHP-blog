<?php 
    require_once("../../functions.php");
    if(!isAdmin($con)){
        header("Location: ../../index.php");
    }
    parse_str($_SERVER['QUERY_STRING'], $output);

    $postQuery = "SELECT * FROM posts WHERE post_id='".$output["post_id"]."'";
    $postData = mysqli_query($con, $postQuery);
    $data = $postData -> fetch_all();

    $categoryQuery = "SELECT * FROM categories WHERE category='".$data[0][2]."'";
    $categoryQueryData = mysqli_query($con, $categoryQuery);
    $categoryData = $categoryQueryData -> fetch_all();

    print_r($categoryData[0][1]);
    $categoryPostIds = explode(",",$categoryData[0][1]);
    //print_r($categoryPostIds);
    if (($key = array_search($data[0][1], $categoryPostIds)) !== false) {
        unset($categoryPostIds[$key]);
        
    }
    $newCategories = implode(",",$categoryPostIds);

    $query = "UPDATE categories SET post_ids='".$newCategories."' WHERE category='".$data[0][2]."'";
    mysqli_query($con, $query);

    $query = "DELETE FROM posts WHERE post_id='".$output["post_id"]."'";
    mysqli_query($con, $query);
    header("Location: ../../index.php");
?>