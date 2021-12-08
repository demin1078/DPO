<?php  include("core/db.php"); 
$named = $_POST['name'];
$secondName = $_POST['secondName'];
$nameName = $_POST['nameName'];
$password = $_POST['password'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];


$sqlCheck1 = mysqli_query($connection,"SELECT COUNT(emails) AS con FROM users WHERE emails = '$email'");
$res = mysqli_fetch_assoc($sqlCheck1);

 
if ($res['con']){
    echo "<h1> Такой пользователь уже зарегистрирован </h1>";
   
}
else{
    
    mysqli_query($connection, "INSERT INTO users(name, last_name, patronymic, birtday,emails,passw) VALUES ('$named', '$secondName',
'$nameName','$birthday','$email','$password')");
    echo "<h3>Пользователь успешно зарегистрирован </h3>";
}
?>
