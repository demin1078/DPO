<?php session_start();
    include("patterns/header.php");
    include("core/db.php");

?>
<link rel="stylesheet" href="css/edit_delete_add_news.css">
<div style="height: 60px;"></div>


<div id="wrap">
    <ul>
        <li>
            <div class="card">
                   <div id="addNews" align="center">
                       <a href = "add_news.php">Добавить новость</a>
                   </div>
                </div>
            </li>
        <?php
            $all_news = mysqli_query($connection, "SELECT * FROM news");
            while ($news = mysqli_fetch_assoc($all_news)){
         
         ?>
            <li>
                <div class="card">
                    <div class= head><?php echo $news['name_news']; ?></div>
                    <div class= img> <img src= <?php  echo $news['first_image'] ?> alt=""> </div>
                    <div class = description><?php echo $news['description'] ?></div>
                    <div class = edit> <a href="edit_news.php?id=<?php print $news['id_news'] ?>"> Редактировать </a> </div>
                    <div class="delete"><a href="post_delete_news.php?id=<?php echo $news['id_news'] ?>" onclick = 'return confirm("do you want to delete Y/N")'>удалить</a></div>
                </div>
            </li>
            <?php } ?>
       
    </ul>
</div>