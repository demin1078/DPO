<form action="post_add_news.php" method = "POST">
    <ul>
        <li><input type="text" placeholder = "Подпись новости" name = name required></li>
        <li><input type="text" placeholder="Описание новости" name = description required></li>
        <li><input type="text" placeholder="URL основного изображения" name = firstImage required></li>
        <li><input type="text" placeholder="URL доп. изображения" name = secondImage required></li>
        <li><input type="text" placeholder="Приоритет от 1 до 5"name = prior required></li>
        <li><input type="submit" value = "Добавить новость"></li>
    </ul>
</form>