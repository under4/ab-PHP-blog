<?php
try{
    //$db = new PDO('mysql:host=localhost;dbname=blog;charset=UTF8','root','');
} catch(PDOException $error) {
    echo "couldnt connect to database";
    echo "<br>";
    die($error);
}
?>