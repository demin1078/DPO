<?php session_start();
    $text_message = $_POST['text_message'];
    $name_forum =$_POST['name_forum'];
    $id_answered = $_POST['id_answered'];
    include("core/db.php");

    $id_forum = mysqli_fetch_assoc(mysqli_query($connection,"SELECT id_forum FROM forums"))['id_forum'];
    $n = mysqli_fetch_assoc(mysqli_query($connection,'SELECT MAX(id_message) AS  mx FROM message'))['mx'] + 1;
    print_r($id_forum);
    print_r($id_answered);
    $user_id = ($_SESSION['user']['id']);
    if ($id_answered){
        mysqli_query($connection, "INSERT INTO message(text_message,id_user,whomAnswet) VALUES ('$text_message', '$user_id','$id_answered')");
    }
    else{
        mysqli_query($connection, "INSERT INTO message(text_message,id_user) VALUES ('$text_message', '$user_id')");
    }
    mysqli_query($connection, "INSERT INTO forums(id_forum,id_message,name_forum) VALUES ('$id_forum','$n', '$name_forum')");
    header('location:openForum.php?id='. $name_forum.'');
?>