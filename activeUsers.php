<?php
include("core/db.php");
$result = mysqli_query($connection,"SELECT id_user, COUNT(id_user) AS numb FROM message GROUP BY id_user ORDER BY numb DESC;");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Самые активные пользователи</h1>
    <ul>
        <?php while ($users = mysqli_fetch_assoc($result)) 
        {   ?>
        <li style="font-size: 20px;"><?php echo "Пользователь " . $users["id_user"]; echo "  Отправил сообщений:".$users['numb'] ?></li>
        <?php }?>
    </ul>
</body>
</html>