<?php session_start();
include("core/db.php");


    if (!$_SESSION['user']){
        echo "<script> alert('Войдите в аккаунт, чтобы создавать новые обсуждения')</script>";
        echo "<script> window.history.back() </script>";
    }



?>

<link rel="stylesheet" href="css/create_form.css">
<div id="wrap">
    <form action="post_new_form.php" method = "POST" id = form>
    <ul>
        <li  class = name >Название форума<input type="text"required name = nameForum> </li>
        <li class = name>Сообщение<input type="text" required name = textMessage></li>
        <li><input type="submit" id = send value="Создать форум"></li>
    </ul>
    </form>
</div>
<link rel="stylesheet" href="css/footer.css">
<?php 
    include("patterns/footer.php")
   

?>