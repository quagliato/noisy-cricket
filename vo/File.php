<?php

class File {

	const sys_tablename = "file";

	private $id;
    private $filename;
    private $id_user;
    private $dt_upload;
	
	private $sys_type = array(
		'id' => 'int',
        'filename' => 'str',
        'id_user' => 'int',
        'dt_upload' => 'int'
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
