<?php 
    require_once("../functions.php");
    parse_str($_SERVER['QUERY_STRING'], $output);

    $query = "DELETE FROM comments WHERE comment_id='".$output["comment"]."'";
    mysqli_query($con, $query);
    header("Location: ../index.php");
?>