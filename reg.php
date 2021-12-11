<?php
 session_start();
 include("patterns/header.php") ?>

<?php  include("core/db.php");
   
?>
<link rel="stylesheet" href="css/reg.css">
    <div id=mainWrap>
        <div class = adverCol></div>
       
        <div id = mainContent>
            
            <div id = registration>
                <h1>Личный кабинет</h1>
                <form action="post.php" id = regForm method="POST">
                    <ul>
                        <li><input type="text" placeholder="Введитие имя" name = name required pattern="[а-яА-Я]{1,60}"></li>
                        <li><input type="text" placeholder="Введитие фамилию" name = secondName required pattern="[а-яА-Я]{1,60}"></li>
                        <li><input type="text" placeholder="Введитие отчество" name = nameName pattern="[а-яА-Я]{1,60}"></li>
                        <li><input type = "password" placeholder="Придумайте пароль" name = password required pattern="[^а-яА-Я]{6,60}"></li>
                        <li><input type="email"placeholder="Введитие email" name = email required pattern="[^а-яА-Я]{6,60}"></li>
                        <li><input type="date" placeholder="Введитие дату рождения" name = birthday required></li>
                        <li><input type="text" placeholder="Введитие ваше образование" name = education></li>
                        <li><input type="text" placeholder="Введитие СНИЛС" name = snils pattern="\d{11}" required></li>
                        <li><input type="text" placeholder="Введитие паспортные данные" pattern="\d{10}" name = passport></li>
                        <li><input type="text" placeholder="Введитие название организации, где вы работаете" name = work></li>
                    
                        <li><input type="file" class =""></li>
                        <li><div id = but> <input type="submit"  class ="butClick" value="Отправить данные"></div></li>
                    </ul>
                </form>
            </div>
            <div id = warning>
                <div id = textWarning><span>Нажав на кнопки "отправить данные" вы соглашаетесь на обработку данных, рассылку сообщений, сдачу вашей матки арабам на 20 лет, продажу квартиры, расчеленения первенца во имя Ктулху<hr><br>Удачного дня!</span></div>
            </div>
    </div>
       
    <div class = adverCol></div>
</div>
<?php include("patterns/footer.php") ?>