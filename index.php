
    <?php include("patterns/header.php");
    include("core/db.php");

    $get_all_news = mysqli_query($connection, "SELECT * FROM news ORDER BY date_news DESC, priority ASC LIMIT 2");
    $first_news = mysqli_fetch_assoc($get_all_news);
    $second_news = mysqli_fetch_assoc($get_all_news);

    ?>
    <link rel="stylesheet" href="css/index.css">
    <div id = mainMain>
    <div id = mainWrap>
        <div class="adverCol"></div>
        <div id  = help>
        <div id = "mainContent">
                    <div class = contentBlog id = firstColumn>
                        <div class = name id = name_service ><span><a href = "http://test/services.php?serv=%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D1%8C%20%D0%BA%20%D0%B2%D1%80%D0%B0%D1%87%D1%83">УСЛУГИ  </a><img src="img/compass.jpg" alt=""><hr></span></div>
                        <div id= service_top>
                            <ul>
                                <?php 
                                    $services = mysqli_query($connection, "SELECT service_name FROM services ORDER BY numb_views DESC LIMIT 3");
                                    while ($service = mysqli_fetch_assoc($services)['service_name']){
                                        echo '<li><a href="http://test/services.php?serv='.$service.'">'.$service.'</a></li>';
                                    }

                                ?>

                                <li><a href="http://test/services.php?serv=%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D1%8C%20%D0%BA%20%D0%B2%D1%80%D0%B0%D1%87%D1%83">Все услуги</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="contentBlog">
                        <div class = name id = name_forum ><span><a href = "http://test/forums.php">ФОРУМ</a><a href="activeUsers.php"><img src= "img/vikackaaaaaaaaa.jpg"></a><hr></span></div>
                        <div id = forum_top>
                            <ul>
                            <?php 
                                    $forums = mysqli_query($connection, "SELECT COUNT(id_message) AS con,id_forum,name_forum FROM forums GROUP BY id_forum ORDER BY con  DESC LIMIT 3");
                                    while ($forum = mysqli_fetch_assoc($forums)){
                                        $id_forum = $forum['id_forum'];
                                        $name_forum = $forum['name_forum'];
                                        echo '<li><a href="http://test/openForum.php?id='.$name_forum.'">'.$name_forum.'</a></li>';
                                    }
                                ?>

                        
                                <li><a href="#">Все форумы</a></li>
                            </ul>
                        </div>
                    </div>
                  
        </div>
        <div id = "newsBox"> 
            <div id = newsText>
                <h1>Последние новости города</h1>
            </div>
    
            <div class = canukillme id = newsFirstBlock>
                <div class = imgAdv id = firstNews style="background-image: url(<?php echo $first_news['first_image'] ?>)"><div class = adverBlock><div class = adverText><?php echo $first_news['name_news'] ?></div></div></div>
                <div class = imgDescribe><div><?php echo $first_news['description'] ?></div></div>
                <div class = imgSubImg> <img src=<?php echo $first_news['second_image'] ?> alt=""> </div>
            </div>

            <div class = canukillme id = newsSecondBlock> 
                <div class = imgSubImg> <img src="<?php echo $second_news['second_image'] ?>" alt=""> </div>
                <div class = imgDescribe id = imgDescribe2><?php echo $second_news['description'] ?></div>
                <div class = imgAdv id = secondNews style="background-image: url(<?php echo $second_news['first_image'] ?>)"><div class = adverBlock><div class = adverText><?php echo $second_news['name_news'] ?></div></div></div>
        
            </div>
            
        </div>
        </div>
        <div class="adverCol"></div>
    </div>
    </div>
    <?php include("patterns/footer.php") ?>