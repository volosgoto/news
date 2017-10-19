<?php

$id = $news->clearInt($_POST['deleteById']);

if ( $id ) {
    $news->deleteNews($id);
    header("Location: news.php");
    die;
} else {
    $errMsg = 'Новость №' . $id . ' не удалена!';
}