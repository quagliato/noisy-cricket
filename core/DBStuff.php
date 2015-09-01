<?php

class DBStuff {

    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $sql;

    function __construct() {
        $this->set('db_host', DB_HOST);
        $this->set('db_user', DB_USER);
        $this->set('db_pass', DB_PASS);
        $this->set('db_name', DB_NAME);
    }

    public function connect() {
        $conn = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        if (!$conn) {
            $this->error(mysql_error());
        }

        return $conn;
    }

    private function selectDB() {
        $sel = mysql_select_db($this->db_name);
        if (!$sel) {
            $this->error(mysql_error());
        }

        return $sel;
    }

    public function query() {
        $query = mysql_query($this->sql);
        $logEngine = new LogEngine(LOG_FILE);
        $logEngine->log("SQL", $this->sql);

        // TODO: How to catch error in SQL Query?

        return $query;
    }

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    private function error($error) {
        $logEngine = new LogEngine(LOG_FILE);
        $logEngine->log("SQL_ERROR", $error);
    }

    public function testDB(){
        try {
            if (!$this->connect() || !$this->selectDB()) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function execute($sql) {
        $this->connect();
        $this->selectDB();
        if (UTF8ENCODED === true) {
            $sql = utf8_decode($sql);
        }
        $this->set('sql',$sql);

        $rs = $this->query();

        return $rs;
    }
}

?>
