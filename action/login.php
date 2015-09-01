<?php
    $user = DataBinder::bind($_POST, 'User');
    $password = md5($user->get('password'));

    $userDAO = new UserDAO;

    $user = $userDAO->getUserByEmail(trim($user->get('email')));

    $return = array();
    if (!$user) {
        $return[] = array(
            'Action' => 'Error',
            'Error' => 'Seu e-mail não está cadastrado em nosso sistema.'
        );
    } else {
        if ($user->get('password') == $password) {

            session_start();
            $_SESSION['user_id'] = $user->get('id');

            $strdate = date('Y-m-d H:i:s');
            $user->set('dt_last_login', $strdate);
            $userDAO->updateWithFields($user, array('dt_last_login'), ("id = ".$user->get('id')));

            $return[] = array(
                'Action' => 'Redir',
                'Redir' => '/dashboard'
            );

        } else {
            $return[] = array(
                'Action' => 'Error',
                'Error' => 'Senha inválida.'
            );
        }
    }

    echo json_encode($return);
?>
