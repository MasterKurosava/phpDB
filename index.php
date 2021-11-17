<? include "engine/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles/main.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="header">
      <?php
        include "engine/register.php";
      ?>
    </div>

    <div class="content">
      <div class="uploadBlock">
      <form action="<?php echo URL; ?>" method="post" enctype="multipart/form-data">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
            <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файлы</label>
        </div>
        <button type="submit" class="imgLoadBtn">Загрузить</button>
      </form>
      </div>
      <div class="gallery">
        <?php
        $imgData=mysqli_query($link, "SELECT img_name FROM gallery");
        $imgNames=mysqli_fetch_all($imgData);
        foreach($imgNames as $name){
          echo '
          <div class="photoBlock">
          <div class="photo">
            <img src="./imgs/'.$name[0].'">
          </div>
          <ul class="comments">
            <li class="commentItem">Классный</li>
            <li class="commentItem">Хороший</li>
            <li class="commentItem">Нормальный</li>
          </ul>
          <form class="commentForm">
            <input class="commentInput" type="co" name="comment" placeholder="Комментарий">
            <input class="commentSubmit" type="submit" value="Отправить">
          </form>
        </div>
          ';
        }
        ?>
      </div>
    </div>

  </div>

</body>
</html>