<?php

class Blacklist {

	const sys_tablename = "blacklist";
	
	private $id;
	private $user_email;

	private $sys_type = array(
	    'id' => 'int',
	    'user_email' => 'str'
    );
	
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
