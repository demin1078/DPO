<?php session_start();
    include("core/db.php");
    include("patterns/header.php"); ?>
    <link rel="stylesheet" href="css/forums.css">
    <div class="deleteHeaderMistake"></div>
    <div id = forumsWrap>
        <div id = forums>
            <h1 align = "center">Форумы</h1>
            <div id="forumsList">
                <ul>
                    <?php 
                    $res = mysqli_query($connection, "SELECT name_forum, COUNT(id_message) AS numb_message FROM forums GROUP BY id_forum");
                    while ($data = mysqli_fetch_assoc($res)){
                        echo "<a href = 'openForum.php?id=" .$data['name_forum']." '><li>
                                <h2> ". $data['name_forum']. "</h2>
                                <div class = numbMess><img src = 'img/envelope.png'><h5> ". $data['numb_message']."</h5></div>     
                            </li></a>" ;
                    }
                    ?>
                </ul>
                <form action="create_form.php" id = "create_new_forum" method="POST">
                    <input type="submit" value="Открыть новое обсуждение">
                </form>
            </div>
        </div>
    </div>
<?php include("patterns/footer.php") ?>s