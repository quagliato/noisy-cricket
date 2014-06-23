<?php

    session_start();
	
	if (!isset($_SESSION['user_id'])) {
        Structure::redir("Erro p1.11 - Por favor, efetue login novamente.",'/');
    }
    
    $userDAO = new UsuarioDAO;
    $user = $userDAO->getUserById($_SESSION['user_id']);
	if (!$user) {
		Structure::redir("Erro p1.12 - Por favor, efetue login novamente.".'/');
	}

	Structure::header();

	$file['filename'] = $_POST['filename'];

    $datetime = new DateTime;
    
	$file_obj = new File;
    $file_obj->set('filename', $file['filename']);
    $file_obj->set('id_user', $_SESSION['user_id']);
    $file_obj->set('dt_upload', time());

    $dao = new FileDAO;

    $result = $dao->insert($file_obj);
    if (!$result) {
        Structure::redirWithMessage('Problemas internos, arquivo não enviado.', '/');
    } else {
        $file = $dao->getFileByNameAndUser($file_obj->get('filename'), $file_obj->get('id_user'));
        if (is_array($file)) {
            $file = $file[sizeof($file) - 1];
        }

        $info = pathinfo($_FILES['user_file']['name']);
        $ext = $info['extension'];

        $newname = $file->get('id')."-".$file->get('filename');

        $path = FILES_DIR;

        $target = $path.$newname;
        move_uploaded_file($_FILES['user_file']['tmp_name'], $target);

        $link = FILES_URL.$newname;
    
        echo '<h1>Arquivo Enviado!</h1>';
        echo '<a href="'.$link.'">'.$link.'</a>';

    }
	

?>
