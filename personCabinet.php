<?php session_start(); 
    include("core/db.php");
    include("patterns/header.php");
?>
<link rel="stylesheet" href="css/personCabinet.css">
<div style = "height:60px"></div>
<div id = Wrap>
    <div id = mainWrap>
        <div id = naming><h2>Личный кабинет</h2>
                <?php if ($_SESSION['user']['is_admin'] == 1) {
                        echo '<h4 align="right"> <a href = "edit_delete_add_news.php"> Добавить новости </a> </h4>' ;}?> 
        </div>
        <div id = main_content>
            <div id = user_info>
                <div id = greeting>Здравствуйте, <div id = help><li id = kill><?php echo $_SESSION['user']['name']; ?></li></div></div>
                <ul id = info>
                    <?php  
                       echo '<li>Имя: '.$_SESSION['user']['name']  .'</li>';
                       echo ' <li> Фамилия: '.$_SESSION['user']['last_name'].'</li>';
                       echo ' <li>Отчество: '. $_SESSION['user']['patronymic'] .'</li>';
                       echo ' <li>Дата рождения: '. $_SESSION['user']['birtday'] .'</li>';
                       echo '<li>СНИЛС: '.$_SESSION['user']['снилс']  .'</li>';
                       echo '<li>пасспорт: '. $_SESSION['user']['passport'] .'</li>';
                       echo ' <li>место работы: '. $_SESSION['user']['work'] .'</li>';
                       echo '<li>Образование: '. $_SESSION['user']['education'] .'</li>';
                       echo '<li>Почта: '. $_SESSION['user']['emails'] .'</li>';
                       echo '<li>Администратор: '.  $_SESSION['user']['is_admin'].'</li>';
                       
                       
                    ?>
                </ul>
            </div>
            <div id = require_service>
                <ul>
                   
                    <?php
                        
                        $req =(mysqli_query($connection, "SELECT request_service.id_request, request_service.reg_data,services.service_name, request_service.id_user 
                        FROM request_service 
                        INNER JOIN services ON request_service.id_service = services.id_service 
                        WHERE id_user = ". $_SESSION['user']['id'] .""));
                        while($val = mysqli_fetch_assoc($req)){
                            echo ' <form action="delete_service_request.php" method="POST">';
                            echo '<li ><span class=ebl2>вы записаны на услугу: "'. $val['service_name'] .'"</span>
                            <input type = hidden value = '. $val['id_request'] .' name = "res"></input> 
                            <span class = ebl><input class ="delete" type = submit value = "удалить"></span></li>';
                            echo '</form> ';
                        }
                    ?>
                    
                </ul>
            </div>
        </div>
        <form action="log_out.php" method=post> <input type="submit" value = "ВЫЙТИ" style="width: 120px;height:30px;margin-left:12px;margin-bottom:10px;background:white"> </form>
    </div>
    

</div>


<?php 
 include("patterns/footer.php")
?>