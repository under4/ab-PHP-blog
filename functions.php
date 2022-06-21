<?php 
session_start();
require_once("db.php");

function check_login($con){
    if(isset($_SESSION["user_id"])){
        $id = $_SESSION["user_id"];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    return false;
    die;
}


function random_num($length){
    $text = "";
    if($length < 5){
        $length = 5;
    }

    $len = rand(4,$length);
    for($i=0; $i < $len; $i++){
        $text .= rand(0,9);
    }

    return $text;
}

function returnCategories($con){
    $query = "SELECT * FROM categories";
    $result = mysqli_query($con, $query);
    return $result -> fetch_all();
}

function returnPosts($con){
    $query = "SELECT * FROM posts";
    $result = mysqli_query($con, $query);
    return $result -> fetch_all();
}

function returnPost($con, $slug){
    $query = "SELECT * FROM posts WHERE slug='".$slug."'";
    $result = mysqli_query($con, $query);
    $data = $result -> fetch_all();
    return $data[0];
}

function isLoggedIn($con){
    $query = "SELECT * FROM users WHERE user_id='".$_SESSION["user_id"]."'";
    $result = mysqli_query($con, $query);
    $data = $result -> fetch_all();
    return count($data) == 1;
}

function isAdmin($con){
    $query = "SELECT * FROM users WHERE user_id='".$_SESSION["user_id"]."'";
    $result = mysqli_query($con, $query);
    $data = $result -> fetch_all();
    if(count($data) == 0){
        return false;
    }
    return count($data) == 1;
}

function promptAction(){
    
}

function randomImage(){
    return rand(0,2).".jpg";
}

?>