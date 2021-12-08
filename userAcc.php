<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include("core/db.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // error_reporting(E_ERROR | E_PARSE);
    $sql = mysqli_query($connection, "SELECT COUNT(emails) AS con FROM users WHERE emails = '$email' and passw = '$password'");
    $res = mysqli_fetch_assoc($sql);
    if ($res['con']){ 
        $sql = mysqli_query($connection, "SELECT name,last_name FROM users WHERE emails = '$email' and passw = '$password'");
        $res = mysqli_fetch_assoc($sql);

        echo "<h1>Имя". $res['name']. "</h1>";
        echo "<h1>Фамилия ". $res['last_name']. "</h1>";
        echo "<h1>--------</h1>";
    
        ?>
        
    <?php
    }
    else{
        echo "Аккаунт не найден";
        echo '<script type="text/javascript">  alert("Вы ввели неправильные данные") </script>';
        echo '<script type="text/javascript"> window.location.href = "enter.php" </script>';
    }
            ?>
    <h2></h2>
    <h3></h3>
</body>
</html>