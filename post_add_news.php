<?php session_start();
include("core/db.php");
if (!$_SESSION['user']){
    print_r("А что ты тут делаешь, хатскер?");
}
else{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $firstImage = $_POST['firstImage'];
    $secondImage = $_POST['secondImage'];
    $prior = $_POST['prior'];

    print_r($firstImage. $secondImage. $prior.$name. $description);

    mysqli_query($connection, "INSERT INTO news(first_image,second_image,priority,name_news,description) VALUES
     ('$firstImage', '$secondImage', '$prior', '$name', '$description')");
     echo "<script>  alert('Новость успешно добавлена') </script>";
     echo "<script> window.history.back() </script>";

}

?>