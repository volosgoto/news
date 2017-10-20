<?php
include_once 'INewsDB.class.php';

class NewsDB implements INewsDB {
    const DB_NAME = '../news.db'; // db path
    private $_db;
    private $sortData;

    public function __construct() {
        $this->_db = new SQLite3(self::DB_NAME);

        if (!file_exists(self::DB_NAME) && 0 == self::DB_NAME) {
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
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
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
        $dt = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime)
                  VALUES ('$title', '$category', '$description', '$source', '$dt')";
        $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
    }

    private function db2arr($data){
        $arr = [];
        while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function getNews() {
//        $sql = "SELECT id, title, category, description, source, datetime
//                  FROM msgs
//                  WHERE 1
//                  ORDER BY msgs.id DESC";
        $sql = $this->sortData;
        $result = $this->_db->query($sql);
        if (!$result) {
            return false;
        } else {
            $this->sortData = $this->db2arr($result);
            return $this->db2arr($result);
        }
    }

    public function sortNews($data){ // TODO Реализовать сортировку
        // TODO Не распознает POST id сортировки

        $sql = "SELECT * FROM msgs WHERE 1 ORDER BY msgs.id ASC";
        switch ($data) {
            // TODO Переписать запросы без *
            case 'new': $sql = "SELECT * FROM msgs WHERE 1 ORDER BY msgs.id DESC"; break;
            case 'old': $sql = "SELECT * FROM msgs WHERE 1 ORDER BY msgs.id ASC "; break;
            //case 'datetime': $sql = "SELECT * FROM msgs WHERE 1 ORDER BY msgs.datetime DESC "; break;
        }
            return $this->sortData = $sql;
    }


    public function clearStr($data) {
        $data = strip_tags(trim($data));
        return $this->_db->escapeString($data);
    }

    public function clearInt($data) {
        return abs( (int)strip_tags(trim($data)) );

    }

    public function deleteNews($id) {
        $sql = "DELETE FROM msgs WHERE msgs.id = $id";
        $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
    }
}