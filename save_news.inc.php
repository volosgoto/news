<?php

//print_r($_POST);
$title = (string)trim($_POST['title']);
$category = (int)$_POST['category'];
$description = (string)trim($_POST['description']);
$source = (string)trim($_POST['source']);



if ( !empty($title) && !empty($category) && !empty($description) && !empty($source) ) {
    $news->saveNews($title, $category, $description, $source);
    header("Location: news.php");
} else {
    $errMsg = 'Заполните все поля формы!';
}