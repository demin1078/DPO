<?php 
    include("patterns/header.php")
?>
<link rel="stylesheet" href="css/reception.css">
<!-- Основная часть сайта -->
    <div id = "mainWrap">
        <div id = mainContent>

            <div id="conteinerSlides">
                <div class = Slide>
                    <img src="https://static.nation-news.ru/uploads/2021/06/01/orig-234-1622575247.jpeg" alt="">
                    <div class = imgText>Медицинский центр </div>
                </div>
                <a  href = "#" class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a  href = "#" class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div id="sendRequest">
                <form action="post">
                    <div id = "formContent">
                    <input type="text" placeholder="Имя">
                    <input type="text" placeholder="Фамилия">
                    <input type="text" placeholder="Отчество">
                    <input type="text">
                    <input type="text">
                    <input type="text">
                    <input type="text">
                    <input type="text">
                    </div>
                    <textarea id = mainSendText></textarea>
                </form>
            </div>

        </div>
    </div>
    

<?php include("patterns/footer.php") ?>