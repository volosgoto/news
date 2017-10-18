<?php

$t = $_POST['title'] ?? '';
$title = htmlspecialchars(trim($t));

$c = $_POST['category'] ?? '';
$category = htmlspecialchars(trim($c));

$d = $_POST['description'] ?? '';
$description = htmlspecialchars(trim($d));

$s = $_POST['source'] ?? '';
$source = htmlspecialchars(trim($d));


if ( !empty($title) && !empty($category) && !empty($description) && !empty($source) ) {
    $news->saveNews($title, $category, $description, $source);
    header("Location: news.php");
} else {
    $errMsg = 'Заполните все поля формы!';
}