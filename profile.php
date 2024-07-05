<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лихачев А.А.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container nav_bar">
            <div class="row">
                <div class="row">
                    <div class="col-4 nav_logo"></div>
                    <div class="col-4">
                        <div class="nav_text">Информация обо мне!</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>
                        Коротко обо мне!
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <h2>
                        ОН ЖЕ "КАПИТАН" <br>
                        ОБЛАДАТЕЛЬ КАРТЫ ОСТРОВА <br>
                        СОКРОВИЩ. МНОГО ПЬЕТ И<br>
                        ВСЕГДА ПРОСТУЖЕН.<br>
                        ХАРАКТЕР СКВЕРНЫЙ<br>
                        НЕ ЖЕНАТ.
                    </h2>
                    <h3>
                        А если серьезно, то я являюсь студентом цифровых кафедр, а также студентом ДВФУ.
                        Параллельно работаю по специальности и просто кайфую
                    </h3>
                </div>
                <div class="col-4">
                        <div class="row my_photo"></div>
                        <div class="row"><p class="title_photo">Так это же буквально я.<br>P.S. Берёзов Дмитрий Дмитриевич</p></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="button_js col-12">
                    <button id="myButton"> Click on me</button>
                    <p id="demo"></p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 index">
                    <h1 class="hello">
                        Привет, <?php echo $_COOKIE['User']; ?>
                    </h1>
                </div>
                <div class="row">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <div class="row"> <input type="text" class="form" name="title" placeholder="Заголовок вашего поста"> </div>
                    <div class="row"> <textarea name="text" rows="10" placeholder="Введите текст вашего поста ..."></textarea></div>
                    <input type="file" name="file" /><br>
                    <div class="row"> <button type="submit" class="btn__post" name="submit">Сохранить пост!</button> </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/button.js"></script>
    </body>
</html>

<?php
    require_once('db.php');

    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'db_first');

    if (isset($_POST['submit'])) {
        $title = $_POST['title']; 
        $main_text = $_POST['text'];
        if (!$title || !$main_text) die("Заполните все поля");
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

        if(!mysqli_query($link, $sql)) die("не удалось добавить пост");
        if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

    }
?>