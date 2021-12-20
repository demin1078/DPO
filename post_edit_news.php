<?php include("core/db.php");
    $first_image = $_POST['first_image'];
    $second_image = $_POST['second_image'];
    $naming = $_POST['naming'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    if ($first_image){
        mysqli_query($connection, "UPDATE news SET first_image = '$first_image' WHERE id_news = '$id'");
    }
    if ($second_image){
        mysqli_query($connection, "UPDATE news SET second_image = '$second_image' WHERE id_news = '$id'");
    }
    if ($naming){
        mysqli_query($connection, "UPDATE news SET name_news = '$naming' WHERE id_news = '$id'");
    }
    if ($description){
        mysqli_query($connection, "UPDATE news SET description = '$description' WHERE id_news = '$id'");
    }

    echo "<script> window.history.back() </script>"

?>