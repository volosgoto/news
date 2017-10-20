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
</head>
<body>
  <h1>Последние новости</h1>
  <?php
    if ($errMsg) {
        echo '<h3> ' . $errMsg . '</h3>' . '<hr>';
    }
  ?>
  </br>

<!--Вывод новостей-->
<!-- Cортировка-->
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" title="sortNews">
      Сортировать:<br />
      <select name="sort">
          <option selected value="new">Новые</option>
          <option value="old">Старые</option>
<!--          <option value="category">Категории</option>-->
      </select>
      <input type="submit" name="submitSelect" value="Сортировать!" /> <br />
  </form>
  <br />

  <?php

  //echo 'POST: ', print_r($_POST);
  echo '<br />';
    require_once 'get_news.inc.php';
?>
  <p>
      Добавить новость!
  </p>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" title="addNews">
      Заголовок новости:<br />
      <input type="text" name="title" /><br />
      Выберите категорию:<br />
      <select name="category">
          <option value="1">Политика</option>
          <option value="2">Культура</option>
          <option value="3">Спорт</option>
      </select>
      <br />
      Текст новости:<br />
      <textarea name="description" cols="50" rows="5"></textarea><br />
      Источник:<br />
      <input type="text" name="source" />
      <br />
      <input type="submit" name="submit" value="Добавить новость!" /> <br />
      <br />
      Удалить новость: <br />
      <input type="number" name="deleteById" value="Номер новости"/> <br />
      <input type="submit" name="delete" value="Удалить новость!" />
  </form>

</body>
</html>