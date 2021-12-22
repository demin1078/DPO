<?php session_start();
    include("core/db.php");
    include("patterns/header.php"); 
    $sort = $_GET['sort']
    ?>
    <link rel="stylesheet" href="css/forums.css">
    <div class="deleteHeaderMistake"></div>
    <div id = forumsWrap>
        <div id = forums>   
            <h1>Форумы <a href = "?sort=up">&#9650;</a> <a href = "?sort=down">&#9660;</a></h1>
            
            <div id="forumsList">
                <ul>
                    <?php 
                    if (!$sort){
                    $res = mysqli_query($connection, "SELECT name_forum, COUNT(id_message) AS numb_message FROM forums GROUP BY id_forum");
                    while ($data = mysqli_fetch_assoc($res)){
                        echo "<a href = 'openForum.php?id=" .$data['name_forum']." '><li>
                                <h2> ". $data['name_forum']. "</h2>
                                <div align = 'right' class = numbMess><img src = 'img/envelope.png'><h5> ". $data['numb_message']."</h5></div>     
                            </li></a>" ;
                    }
                    }
                    else if($sort == 'up'){
                        
                        $res = mysqli_query($connection, "SELECT name_forum, COUNT(id_message) AS numb_message FROM forums GROUP BY id_forum ORDER BY numb_message DESC");
                        while ($data = mysqli_fetch_assoc($res)){
                        echo "<a href = 'openForum.php?id=" .$data['name_forum']." '><li>
                                <h2> ". $data['name_forum']. "</h2>
                                <div align = 'right' class = numbMess><img src = 'img/envelope.png'><h5> ". $data['numb_message']."</h5></div>     
                            </li></a>" ;
                    }
                }
                else if($sort == 'down'){
                    $res = mysqli_query($connection, "SELECT name_forum, COUNT(id_message) AS numb_message FROM forums GROUP BY id_forum ORDER BY numb_message ");
                        while ($data = mysqli_fetch_assoc($res)){
                        echo "<a href = 'openForum.php?id=" .$data['name_forum']." '><li>
                                <h2> ". $data['name_forum']. "</h2>
                                <div align = 'right' class = numbMess><img src = 'img/envelope.png'><h5> ". $data['numb_message']."</h5></div>     
                            </li></a>" ;
                    }

                }
                    ?>
                </ul>
                <form action="create_form.php" id = "create_new_forum" method="GET">
                    <input type="hidden" value =123 name = "id">
                    <input type="hidden" value = 324 name = "mes">
                    <input type="submit" value="Открыть новое обсуждение">
                </form>
            </div>
        </div>
    </div>
<?php include("patterns/footer.php") ?>s