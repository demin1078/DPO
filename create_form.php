<?php session_start();
include("core/db.php");

    if (!$_SESSION['user']){
        echo "<script> alert('Войдите в аккаунт, чтобы создавать новые обсуждения')</script>";
        echo "<script> window.history.back() </script>";
    }

?>
<form action="post_new_form.php" method = "POST">
<ul>
    <li>Название сервера<input type="text" required name = nameForum> </li>
    <li>Сообщение<input type="text" required name = textMessage></li>
    <li><input type="submit" value="Создать форум"></li>
</ul>
</form>