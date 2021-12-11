<?php session_start();
include('core/db.php');
    //print_r($_SESSION['user']);
    
    $id_service = $_POST['id_service'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $name_name = $_POST['name_name'];
    $snils = $_POST['снилс'];
    $passport = $_POST['passport'];
    $work = $_POST['work'];
    $education = $_POST['education'];
    
    $id_user = $_SESSION['user']['id'];
 
    $sql = mysqli_query($connection,"INSERT INTO request_service(id_service, id_user) VALUES('$id_service', '$id_user')");
    
    echo "<script> alert('Вы успешно подали услугу') </script>";


    echo "<script> window.location.href = 'http://test/services.php' </script>";
?>