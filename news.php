<?php
require_once 'NewsDB.class.php';
$news = new NewsDB();
require_once 'sort_news.inc.php';

$errMsg = '';
    if ("POST" == $_SERVER['REQUEST_METHOD'] && isset($_POST['submit'])) {
        require_once 'save_news.inc.php';
    }

    if ("POST" == $_SERVER['REQUEST_METHOD'] && isset($_POST['deleteById'])) {
        require_once 'delete_news.inc.php';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>
  <h3>Последние новости</h3>
  <?php
    if ($errMsg) {
        echo '<h3> ' . $errMsg . '</h3>' . '<hr>';
    }
  ?>
  </br>

<!--Вывод новостей-->
<!-- Cортировка-->
  <p class="font-weight-bold">Сортировать:</p>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" title="sortNews">
      <div class="btn-group">
          </br>
      <select name="sort" class="btn btn-info">
          <option selected value="new">Новые</option>
          <option value="old">Старые</option>
      </select>
      <input type="submit" name="submitSelect" value="Сортировать!" /> <br />
     </div>
  </form>

  <br />
<?php
    require_once 'get_news.inc.php';
?>
  <br />


  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" title="addNews">
      <div class="form-group">
          <p class="font-weight-bold">Добавить новость!</p>
          <label for="exampleInputEmail1">Заголовок новости:</label>
      <input type="text" class="form-control" name="title" placeholder="Заголовок новости"><br />
      Выберите категорию:<br />
      <select name="category">
          <option value="1">Политика</option>
          <option value="2">Культура</option>
          <option value="3">Спорт</option>
      </select>
      <br />
      Текст новости:<br />
      <textarea name="description" class="form-control" cols="50" rows="5" placeholder="Текст новости"></textarea><br />
      Источник:<br />

          <class="col">
      <input type="text" class="form-control" name="source" placeholder="Источник"/>
              </>
      <br />
      <input type="submit" class="btn btn-primary" name="submit" value="Добавить новость!" /> <br />
      <br />
      </div>
  </form>

  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" title="deleteNews">
      <div class="form-group">
          <label for="exampleInputEmail1">Удалить новость:</label>
                <input type="number" class="form-control" name="deleteById" value="Номер новости"/ placeholder="Номер новости"> <br />
      <input type="submit" class="btn btn-warning" name="delete" value="Удалить новость!" />
      </div>
  </form>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>