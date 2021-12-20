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
    if (!$_SESSION['user']){
        echo "<script> alert('Войдите в аккаунт!') </script>";
        echo "<script> window.history.back()  </script>";
    }
    else{
        $data = "";
        if ($name){$data =$data . "name:" . $name . " ";}
        if ($last_name){$data =$data . "last_name:" . $last_name . " ";}
        if ($name_name){$data =$data . "name_name:" . $name_name . " ";}
        if ($snils){$data =$data . "snils:" . $snils . " ";}
        if ($passport){$data =$data . "passport:" . $passport  . " ";}
        if ($work){$data =$data . "work:" . $work  . " ";}
        if ($education){$data =$data . "education: " . $education  . " ";}
        echo $data;
        
        $sql = mysqli_query($connection,"INSERT INTO request_service(id_service, id_user,entered_data) VALUES('$id_service', '$id_user','$data')");
        echo "<script> alert('Вы успешно подали услугу') </script>";
        echo "<script> window.history.back() </script>";
    }
?>