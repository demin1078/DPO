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
                <h3>Здравствуйте, <?php echo $_SESSION['user']['name']; ?></h3>
                <ul>
                    <?php 
                       
                        foreach ($_SESSION['user'] as $key => $value){
                            echo '<li>'. $key .': '. $value .'</li>';
                        }
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
                            echo '<li><span>вы записаны на услугу '. $val['service_name'] .'</span>
                            <input type = hidden value = '. $val['id_request'] .' name = "res"></input> 
                            <input type = submit value = "удалить"></li>';
                            echo '</form> ';
                        }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>

</div>


<?php 
 include("patterns/footer.php")
?>