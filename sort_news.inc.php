<?php
$result = '';
if ( !empty($_POST['sort']) && 'new' != $_POST['sort'] ) {
    $result = $news->sortNews($_POST['sort']);
    if ( $result ) {
        $news->sortNews($result);
    } else {
        $errMsg = 'Не удалось отсортировать новости!';
    }
} else {
    $news->sortNews('new');
}
