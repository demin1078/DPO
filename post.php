<?php  session_start();
include("core/db.php"); 
$named = $_POST['name'];
$secondName = $_POST['secondName'];
$nameName = $_POST['nameName'];
$password = $_POST['password'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];

$snils = $_POST['snils'];
$passport = $_POST['passport'];
$work = $_POST['work'];
$education = $_POST['education'];



$sqlCheck1 = mysqli_query($connection,"SELECT COUNT(emails) AS con FROM users WHERE emails = '$email'");
$res = mysqli_fetch_assoc($sqlCheck1);

 
if ($res['con']){
    echo "<h1> Пользователь с таким email уже зарегистрирован </h1>";
   
}
else{
    
    mysqli_query($connection, "INSERT INTO users(name, last_name, patronymic, birtday,СНИЛС, passport, work,education,emails,passw) VALUES ('$named', '$secondName',
'$nameName','$birthday', '$snils','$passport','$work','$education','$email','$password')");
     $sql = mysqli_query($connection, "SELECT * FROM users WHERE emails = '$email' and passw = '$password'");
     $res = mysqli_fetch_assoc($sql);
     $_SESSION['user'] = [
        "id" => $res['id_user'],
        "name" => $res['name'],
        "last_name" => $res['last_name'],
        "patronymic" => $res["patronymic"],
        "birtday" => $res["birtday"],
        "снилс" => $res["СНИЛС"],
        "passport" => $res["passport"],
        "work" => $res["work"],
        "education" => $res["education"],
        "emails" => $res["emails"],
        "passw" => $res["passw"],
    ];
    header('location:http://test/index.php');
    $_SESSION['user']['name'];
    echo "<h3>Пользователь успешно зарегистрирован 
    </h3>";
}
?>
