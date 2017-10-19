<?php

$title = $news->clearStr($_POST['title']) ?? '';
$category = $news->clearInt($_POST['category']) ?? '';
$description = $news->clearStr($_POST['description']) ?? '';
$source = $news->clearStr($_POST['source']) ?? '';

$result = !empty($title) && !empty($category) && !empty($description) && !empty($source);

if ( $result ) {
    $news->saveNews($title, $category, $description, $source);
    header("Location: news.php");
} else {
    $errMsg = 'Заполните все поля формы!';
}