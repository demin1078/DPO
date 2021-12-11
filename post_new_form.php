<?php session_start();
include("core/db.php");
$nameForum = $_POST['nameForum'];
$textMessage = $_POST['textMessage'];

$isSet = mysqli_fetch_assoc(mysqli_query($connection,"SELECT COUNT(name_forum) AS con FROM forums WHERE '$nameForum' = name_forum" ))['con'];
if ($isSet){
    echo "<script>alert('Форум с таким названием уже есть') </script>";
}
else{
    $userId = $_SESSION['user']['id'];
    mysqli_query($connection,"INSERT INTO message(text_message,id_user) VALUES ('$textMessage','$userId')");
    $idMessage =mysqli_fetch_assoc(mysqli_query($connection, "SELECT MAX(id_message) as mx FROM message"))['mx'];
    mysqli_query($connection, "INSERT INTO forums(id_message,name_forum) VALUES ('$idMessage','$nameForum') ");
}
?>