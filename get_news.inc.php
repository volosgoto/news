<?php

$posts = $news->getNews();

//print_r($posts);
foreach ($posts as $line) {
    $category = '';
    switch ($line['category']) {
        case 1:
            $category = 'Политика';
            break;
        case 2:
            $category = 'Культура';
            break;
        case 3:
            $category = 'Спорт';
            break;
    }
    $dt = date("d-m-Y : H-i-s", $line['datetime']);
    echo '<p>' . 'Категория: ' . '<span class="font-italic">' . $category . '<span/>' . '</p>'. ' ' .
        '<p class="font-weight-bold">' . $line['title'] . '</p>' . ' ' .
        '<p>' . 'Новость №: ' . $line['id'] . ' ' . '</p>' .
        '<p class="font-weight-light">' . $line['description'] . '</p> ' . '' .
        'Источник: ' . $line['source'] . ' ' .
        '<p class="font-italic">' . 'Добвлено: ' . $dt . '</p>';
    echo PHP_EOL;
    echo '<hr>';
}
