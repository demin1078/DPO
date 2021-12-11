<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/enter.css">
    <title>Document</title>
</head>
<body>
    <div id = "regField">
        <form action="userAcc.php" method="post">
            <input type="text" placeholder="email" name = 'email' required>
            <input type="text" placeholder="password" name = 'password' required>
            <input type="submit">
        </form>
        <div id = registration>
            <a href="reg.php">Нет аккаунта? Зарегистрируйтесь!</a>
        </div>
    </div>
</body>
</html>