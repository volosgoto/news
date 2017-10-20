<?php

$posts = $news->getNews();

//print_r($posts);
foreach ($posts as $line) {
    $category = '';
    switch ($line['category']) {
        case 1: $category = 'Политика'; break;
        case 2: $category = 'Культура'; break;
        case 3: $category = 'Спорт'; break;
    }
    $dt = date("d-m-Y : H-i-s", $line['datetime']);
    echo 'Title: ' . $line['title'] . ' '.
        'Порядковый номер: ' . $line['id'] . ' '.
        'Category:' . $category . ' ' .
        'Description: ' . $line['description'] . ' ' .
        'Source: ' .  $line['source'] . ' ' .
        'Date: ' . $dt;
    echo PHP_EOL;
    echo '<hr>';
}
