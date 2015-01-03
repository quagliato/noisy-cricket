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
        file_put_contents(SQL_LOG_FILENAME, "[".date('Ymd H:i:s')."] SQL: ".$this->sql."\n", FILE_APPEND);

        return $query;
    }

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    private function error($error) {
        file_put_contents(SQL_LOG_FILENAME, "[".date('Ymd H:i:s')."] ERROR: ".$error."\n", FILE_APPEND);
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
        $this->set('sql',$sql);

        $rs = $this->query();

        return $rs;
    }
}
?>
