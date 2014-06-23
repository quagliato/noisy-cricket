<?php

class Request {

	const sys_tablename = "request";
	
	private $code;
	private $id_user;
	private $email_sent;
	private $sent_time;
	private $status;
	
	private $sys_type = array(
	'code' => 'str',
	'id_user' => 'int',
	'email_sent' => 'str',
	'sent_time' => 'str',
	'status' => 'int');
	
	public function set($prop, $value) {
		$this->$prop = $value;
	}
	
	public function get($prop) {
		return $this->$prop;
	}
	
	public function type($prop) {
		if (array_key_exists($prop, $this->sys_type))
			return $this->sys_type[$prop];
		return 'none';
	}
	
	public function props() {
		return get_object_vars($this);
	}
	
	public static function tablename() {
		return self::sys_tablename;
	}
	
}

?>
