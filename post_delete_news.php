<?php session_start();
    include('core/db.php');
    if (!$_SESSION['user']){
        echo "вы не должны здесь находится";
    }
    else{
        echo "ds";
        $id = $_GET['id'];
        print_r($id);
        mysqli_query($connection, "DELETE FROM news WHERE id_news = '$id'");
        echo "<script> alert('Новость удалена') </script>";
        echo "<script> window.history.back() </script>";

    }
?>