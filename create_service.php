<?php 
    include("core/db.php");
    $service_name = $_POST['service_name'];
    $descrtiption = $_POST['descrtiption'];
    $required_doc = $_POST['docs'];
    $res_docs = "";
 

    $check = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(id_service) AS con FROM services WHERE service_name = '$service_name'"));
    foreach ($required_doc as $el){
        $res_docs = $res_docs.','.$el;
    }
    $res_docs = substr($res_docs, 1);
    print_r($res_docs);
    if($check['con']){
        echo "<script> alert('Услуга с таким названием уже есть') </script>";
        echo '<script type="text/javascript"> window.location.href = "http://test/addService.php" </script>';
    }
    else{
        mysqli_query($connection,"INSERT INTO services(service_name, description, require_doc) VALUES('$service_name','$descrtiption','$res_docs') ");
        
        echo "<script> alert('Успешно добавлена услуга') </script>";
        echo '<script type="text/javascript"> window.location.href = "http://test/addService.php" </script>';
    }
?>