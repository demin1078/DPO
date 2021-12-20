<?php include("core/db.php");
    $id_card = $_GET['id'];
    include("patterns/header.php")
?>
<link rel="stylesheet" href="css/edit_news.css">
<div style="height: 60px;"></div>
<div id="wrap">
    <form action="post_edit_news.php" method="POST">
        <?php 
            $chose_news = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM news WHERE id_news = $id_card"));
        ?>
        <div id = first_image class = card>
            <h4> Основная картинка</h4>
            <img src= <?php echo $chose_news['first_image'] ;?> alt="">
            <input type="text" placeholder="Вставьте URL новой картинки" name = first_image>
        </div>
        <div id="second_image" class = card>
            <h4> Дополнительная картинка</h4>
            <img src=<?php echo $chose_news['second_image']; ?> alt="">
            <input type="text" placeholder="Вставьте URL новой картинки" name = second_image>
        </div>
        <div id="naming" class = card>
            <h4> Название новости картинка</h4>
            <h5><?php echo $chose_news['name_news']; ?></h5>
            <input type="text" placeholder="Введите новое заглавие" name = naming>
        </div>
        <div id="description" class = card>
            <h4> Описание новости</h4>
            <h5><?php echo $chose_news['description'] ;?></h5>
            <textarea placeholder="Введите новое описание" name = description></textarea>
        </div>
        <input type="hidden" name = id value = <?php echo $id_card; ?>>
        <input type="submit" value = "Обновить Информацию">
    </form>
</div>