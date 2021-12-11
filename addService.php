<?php include("patterns/header.php");
        include("core/db.php") ?>
<div style=" background-color:green;height:100px"></div>
<div></div>
    <form action="create_service.php" method="POST">
        <li>Введите название услуги<input type="text" name = service_name required></li>
        <li>Введите её описание<input type="text" name = descrtiption required></li>
        <li>Выберите необходимые документы
            <select size="5" multiple="multiple" name = "docs[]">
                <option value="passport">паспорт</option>
                <option value="снилс">СНИЛС</option>
                <option value="education">образование</option>
                <option value="emails">почтовый адрес</option>
            </select></p>
        </li>
        <li><input type="submit" value="Отправить"></li>
    </form>
</div>