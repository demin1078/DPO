<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    
</head>
<body>
    
    <div id = "flexReg" class = >
        <div id = contentMenu>
            <ul>
                <li><a href = "index.php">Главная страница</a></li>
                <li><a href = "services.php">Услуги</a></li>
                <li><a href = "forums.php">Форум</a></li>
                <li><a href = "reception.php">Электронная приёмная</a></li>
            </ul>
        </div>

        <!-- Searching  -->
        <form id="header_search">
            <input id= headerSearchField type="search" placeholder="Поиск" aria-label="Search">
            <button  type="submit">Найти</button>
          </form>
        <form action="log_out.php" method=post>
            <input type="submit" value = "log out">
        </form>
         
          
        <div id = "reg"><a href="enter.php"><h3 align="center"><a href="enter.php" id = regA></a></h3></div>
        <?php 
       
        $userName = $_SESSION['user']['name'];
      
      
        if($_SESSION['user']){ ?> 
            <script> document.getElementById("regA").innerHTML = "<?php echo $userName ?>" 
                 document.getElementById("regA").href = "index.php" 
            </script> <?php
           
        }
        else{
            echo '<script> 
                document.getElementById("regA").innerHTML = "Регистрация/вход" 
               
            </script> ';
        }
 
?>
    </div>