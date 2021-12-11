
    <?php session_start();
    include("core/db.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // error_reporting(E_ERROR | E_PARSE);
    $sql = mysqli_query($connection, "SELECT COUNT(emails) AS con FROM users WHERE emails = '$email' and passw = '$password'");
    $res = mysqli_fetch_assoc($sql);
    if ($res['con']){ 
        $sql = mysqli_query($connection, "SELECT * FROM users WHERE emails = '$email' and passw = '$password'");
        $res = mysqli_fetch_assoc($sql);
        
     

       // include ("patterns/header.php");
  
     
    
        $_SESSION['user'] = [
            "id" => $res['id_user'],
            "name" => $res['name'],
            "last_name" => $res['last_name'],
            "patronymic" => $res["patronymic"],
            "birtday" => $res["birtday"],
            "снилс" => $res["СНИЛС"],
            "passport" => $res["passport"],
            "work" => $res["work"],
            "education" => $res["education"],
            "emails" => $res["emails"],
            "passw" => $res["passw"],
        ];

       
   
        header('location:http://test/index.php');
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