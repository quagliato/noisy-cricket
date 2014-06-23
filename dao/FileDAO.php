<?php

class FileDAO extends GenericDAO {

	function __contruct() {
	}
	
	public function getFileByNameAndUser($filename, $id_user) {
		if (is_null($filename) || !isset($filename)) return false;
			
		$result = $this->selectAll("File","filename = '$filename' AND id_user = $id_user");
		
        return $result;
	}
	
}


?>
