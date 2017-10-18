<?php
include_once 'INewsDB.class.php';

class NewsDB implements INewsDB {
    const DB_NAME = '../news.db'; // db path
    private $_db;

    public function __construct() {
        $this->_db = new SQLite3(self::DB_NAME);

        if ( is_file(self::DB_NAME) && (0 == self::DB_NAME) ) {
            $sql = 'CREATE TABLE msgs(
                        id INTEGER PRIMARY KEY AUTOINCREMENT,	title TEXT,
                        category INTEGER,
                        description TEXT,
                        source TEXT,
                        datetime INTEGER)
                        ';
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());

            $sql = 'CREATE TABLE category(
                        id INTEGER,
                        name TEXT
                    )
                    ';
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());

            $sql = 'INSERT INTO category(id, name)
                        SELECT 1 AS id, \'Политика\' AS name
                        UNION SELECT 2 AS id, \'Культура\' AS name
                        UNION SELECT 3 AS id, \'Спорт\' AS name 
                        ';
            $this->_db->exec($sql)or die($this->_db->lastErrorMsg());
        }
    }

    public function __destruct() {
        unset($this->_db);
    }

    public function __get($name) {
        if ('db' == $name) {
            return $this->_db;
        } else {
            throw new Exception('Unknown property db');
        }
    }

    public function saveNews($title, $category, $description, $source) {
        // TODO: Implement saveNews() method.
    }

    public function getNews() {
        // TODO: Implement getNews() method.
    }

    public function deleteNews($id) {
        // TODO: Implement deleteNews() method.
    }
}

//$news = new NewsDB();
//var_dump($news);