<link rel="stylesheet" href="css/openForum.css">
<?php 
    session_start();
  
    include("core/db.php");
    include('patterns/header.php');
    
    if($_SESSION['user']){
        $name_forum = $_GET["id"];
        echo "<div id = 'deleteMistake'> </div>";
        echo "<h1>". $name_forum ."</h1>";
        echo "<ul id = 'messagesList'>";
        $res = mysqli_query($connection, " SELECT message.*,users.* FROM message INNER JOIN users ON message.id_user = users.id_user WHERE id_message IN (SELECT id_message FROM forums WHERE name_forum = '$name_forum');");
        while($value = mysqli_fetch_assoc($res)){
          
            if($value['name'] == $_SESSION['user']['name']){
                $id_message = $value['id_message'];
                echo "<li class = 'forumMessageMy'>". $value['text_message'] .
                " <h5>".$value['name']."</h5>

                 <h6 class = removeMessage><a href = 'post_remove_message.php?id_mes=$id_message'>удалить</a></h6>
                <h4 align = 'right'>". $value['send_data']. "</h4>             
                </li>"
                
                ;
            }
            else{
            echo "<li class = 'forumMessage'>". $value['text_message'] ." <h5>".$value['name']."</h5>
                <h4 align = 'right'>". $value['send_data']. "</h4>
            </li>";
            
            }
        }
        echo "</ul>";
        echo '
        <form action = "send_message_to_forum.php" method="POST">
                    <textarea type="text" name = "text_message" required></textarea>
                    <input type = "hidden" name=name_forum value = "'. $_GET["id"] .'">
                    <button type = submit>Отправить сообщение</button>
                </form>';
       
    }
    else{
        echo "<script> alert('Вы не зарегистрированы!') </script>";
        echo  "<script> window.history.back() </script>"; 
    }
    include("patterns/footer.php")
?>
