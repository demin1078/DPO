<link rel="stylesheet" href="css/openForum.css">
<?php 
    session_start();
  
    include("core/db.php");
    include('patterns/header.php');
    
    if($_SESSION['user']){
        $name_forum = $_GET["id"];
        $id_answered = $_GET["answerTo"];

     
        echo "<div id = 'deleteMistake'> </div>";
    
        ?>
        <div id = wrap>
            
           <?php
    
        echo "<h1>". $name_forum ."</h1>";
        echo "<ul id = 'messagesList'>";
        $res = mysqli_query($connection, " SELECT message.*,users.* FROM message INNER JOIN users ON message.id_user = users.id_user WHERE id_message IN (SELECT id_message FROM forums WHERE name_forum = '$name_forum');");
        while($value = mysqli_fetch_assoc($res)){
          
            if($value['name'] == $_SESSION['user']['name']){
                $id_message = $value['id_message'];
                echo "<li class = 'forumMessageMy'>

                <h5>".$value['name']."</h5> 
                 
                
                <span>". $value['text_message'] ."</span>
                <h4>". $value['send_data']. "</h4>    

                 <h6 align='right' class = removeMessage id = 'deleteBut'><a href = 'post_remove_message.php?id_mes=$id_message'>Удалить</a></h6>
                       
                </li>"
                
                ;
            }
            else{
            echo "<li class = 'forumMessage'> 

                <h5> ".$value['name']."</h5>
                <h4>". $value['send_data']. "</h4>
                <span>"  . $value['text_message'] ." </span>
                
                <h3 id = answerTo align='right'><a href= 'openForum.php?id=". $name_forum."&answerTo=".$value['id_message']."#sendMessage '>Ответить </a></h3>
            </li>";
            
            }
        }
        echo "</ul>";
        if ($id_answered){
            $ans =mysqli_fetch_assoc(mysqli_query($connection,"SELECT name FROM users WHERE id_user = (SELECT id_user FROM message WHERE id_message = '$id_answered') "))['name'] . ",";
        }
        echo '
        <form action = "send_message_to_forum.php" method="POST">
                    <a name = "sendMessage"></a>
                    <textarea type="text" placeholder="Напечатайте сообщение" name = "text_message" required>'.$ans .'</textarea>
                    <input type = "hidden" name=name_forum value = "'. $_GET["id"] .'">
                    <input type = "hidden" name = id_answered value = '.$id_answered.'>
                    <button type = submit>Отправить сообщение</button>
                </form>';
       
    }
    else{
        echo "<script> alert('Вы не зарегистрированы!') </script>";
        echo  "<script> window.history.back() </script>"; 
    }
    echo "</div>";
    include("patterns/footer.php")
?>
