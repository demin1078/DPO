<?php 
    include("core/db.php");
    $res = $_POST['res'];
    print_r($res);
    mysqli_query($connection, "DELETE FROM request_service WHERE id_request = $res");
    echo "<script> alert('Услуга успешно удалена') </script>";
    echo "<script> window.history.back() </script>";
?>