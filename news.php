<?php
require_once 'NewsDB.class.php';
$news = new NewsDB();
$errMsg = '';
    if ("POST" == $_SERVER['REQUEST_METHOD'] && isset($_POST['submit'])) {
        require_once 'save_news.inc.php';
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
        echo $errMsg . '<hr>';

  $newsArr = $news->displayNews();

  foreach ($newsArr as $line) {
      $category = '';
      switch ($line['category']) {
          case 1: $category = 'Политика'; break;
          case 2: $category = 'Культура'; break;
          case 3: $category = 'Спорт'; break;
      }
      $dt = date("d-m-Y : H-i-s", $line['datetime']);
      echo 'Title: ' . $line['title'] . ' '.
          'Cetegory:' . $category . ' ' .
          'Description: ' . $line['description'] . ' ' .
          'Source: ' .  $line['source'] . ' ' .
          'Date: ' . $dt;
      echo PHP_EOL;
      echo '<hr>';
    }

  ?>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
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
    <input type="text" name="source" /><br />
    <br />
    <input type="submit" name="submit" value="Добавить!" />
</form>
<?php

?>
</body>
</html>