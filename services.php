
<?php 
    include("patterns/header.php");
    include("core/db.php");
    $res = mysqli_query($connection, "SELECT service_name FROM services");
    $serv = $_GET['serv'];
    $search = $_GET['search'];
    $resSearch = mysqli_query($connection, "SELECT service_name FROM services WHERE service_name LIKE '%$search%'");
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
                <?php  
              
                if ($_SESSION['user']['is_admin'] == 1){
                    echo' <li  class = nameServiceLi id = nameServiceLiAdd><a href="addService.php"> Добавить услугу </a></li>';
                }
                else{
                    echo "<form action = 'http://test/services.php' method = GET>
                    <li class = nameServiceLi > <input type = 'search' placeholder = 'Что вы ищите?' id = search name = search> <input type = 'submit' id = 'find' value = 'найти'>  </li> </form>";
                    
                }
                ?>
                <?php
                if (!$search){
                while($nameOfService = mysqli_fetch_assoc($res)) {?>
                <li class = nameServiceLi1 <?php 
                    if($nameOfService['service_name'] == $serv){
                    echo 'style = background-color:blanchedalmond   ';}
                ?>><a href = "?serv=<?php print $nameOfService['service_name']?>">
                <div class = nameServiceLi><?php echo $nameOfService['service_name']; ?></div></a></li>
                <?php }} 
                else{
                    while($nameOfService = mysqli_fetch_assoc($resSearch)) {?>
                        <li class = nameServiceLi1 <?php 
                            if($nameOfService['service_name'] == $serv){
                            echo 'style = background-color:blanchedalmond   ';}
                        ?>><a href = "?serv=<?php print $nameOfService['service_name'].'&search='.$search ?>">
                        <div class = nameServiceLi><?php echo $nameOfService['service_name']; ?></div></a></li>
                                <?php }}

                ?>



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
                        <li ><input type="text" placeholder="Имя" required name = name value="<?php echo $_SESSION['user']['name'] ?>"></li>
                        <li><input type="text" placeholder="Фамилия" required name = last_name value = "<?php echo $_SESSION['user']['last_name'] ?>"></li>
                        <li><input type="text" placeholder="Отчество" name = name_name value = "<?php echo $_SESSION['user']['patronymic'] ?>"> </li>
                        <?php   
                           $array = explode(',',$currentSerivce['require_doc']);    
                           foreach ($array as $el){                       
                               echo "<li> <input type='text' required name = ". $el ." value = '". $_SESSION['user'][$el] ."' required placeholder = '$el'></li>";
                           }
                            ?>                      
                    </ul>
                
            </div>
            <div id = serviceButton>
                <img src="https://sun9-77.userapi.com/impf/wYo3uBN1ZuuT1bRw5c394MbcUIkek3NLHgIcLA/giv8OAQaM8I.jpg?size=1080x1070&quality=96&sign=e1dbece2b7dc8389dba6315cdcfd6db4&type=album" alt="">
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