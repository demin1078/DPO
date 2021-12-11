
<?php 
    include("patterns/header.php");
    include("core/db.php");
    $res = mysqli_query($connection, "SELECT service_name FROM services");
    $serv = $_GET['serv'];
    $currentSerivce = mysqli_query($connection, "SELECT * FROM services WHERE service_name = '$serv'");
    $currentSerivce = mysqli_fetch_assoc($currentSerivce);

?>
<link rel = "stylesheet" href = "css/services.css">
    
<div id = mainContent>
    
    <div id = topicService>
        <h1 align="center">Услуги</h1>
    </div>
    <div id = mainService>
        <div id = nameService>
            <ul>
                <li  class = nameServiceLi><a href="addService.php"> Добавить услугу </a></li>
                <?php
              
                while($nameOfService = mysqli_fetch_assoc($res)) {?>
                <li <?php 
                    if($nameOfService['service_name'] == $serv){
                    echo 'style = background-color:green';}
                ?>><a href = "?serv=<?php print $nameOfService['service_name']?>">
                <div class = nameServiceLi><?php echo $nameOfService['service_name']; ?></div></a></li>
                <?php } ?>
            </ul>
        </div>
        <div id = describeSerivce>
            <div id = nameChoiseService>
                <h4 align=center><?php echo $serv ?></h4>
            </div>
            <div id = describeChoiseService>
                <?php 
                    echo $currentSerivce['description'];
                    echo $currentSerivce['id_service'];
                 ?>
            </div>
            <div id = sendData>
            <div id="yieldData">
                <form action="post_serv_req.php" method="post">
                    <ul>              
                        <li>Ваше имя:<input type="text" placeholder="Иван" required name = name value="<?php echo $_SESSION['user']['name'] ?>"></li>
                        <li>Ваша фамилия:<input type="text" placeholder="Иванов" required name = last_name value = "<?php echo $_SESSION['user']['last_name'] ?>"></li>
                        <li>Ваше отчество(если есть):<input type="text" placeholder="Иванович" name = name_name value = " <?php echo $_SESSION['user']['patronymic'] ?>"> </li>
                        <?php   
                           $array = explode(',',$currentSerivce['require_doc']);    
                           foreach ($array as $el){                       
                               echo "<li>Ваш ". $el ."<input type='text' required name = ". $el ." value = '". $_SESSION['user'][$el] ."' required></li>";
                           }
                            ?>                      
                    </ul>
                
            </div>
            <div id = serviceButton>
                <input type="hidden" value = "<?php echo $currentSerivce['id_service'] ?>" name="id_service">
                <input type="submit" value = "подать заявление" >
            </div>
            </form>
            </div>
        </div>
    </div>
</div>



<div id = footerLine></div>
<div id  = wrapFoot>
    <div id = footCopy>&copy;Все права на сайт защищены</div>
    <div id = ></div>
    <div id = footSocial>
        <ul>
            <li><img src = "img/vk.png"></li>
            <li><img src = "img/inst.png"></li>
            <li><img src = "img/facebook.png"></li>
        </ul>
    </div>
</div>


</body>
</html>