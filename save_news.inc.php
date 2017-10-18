<?php

$t = (string)$_POST['title'] ?? '';
$title = htmlspecialchars(trim($t));

$c = (int)$_POST['category'] ?? '';
$category = htmlspecialchars(trim($c));

$d = (string)$_POST['description'] ?? '';
$description = htmlspecialchars(trim($d));

$s = (string)$_POST['source'] ?? '';
$source = htmlspecialchars(trim($d));

$result = !empty($title) && !empty($category) && !empty($description) && !empty($source);

if ( $result ) {
    $news->saveNews($title, $category, $description, $source);
    header("Location: news.php");
} else {
    $errMsg = 'Заполните все поля формы!';
}