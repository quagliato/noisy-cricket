<?php
    define('APP_DIR', '/noisy-cricket');
    define('APP_URL', 'http://localhost/noisy-cricket');
    define('APP_TITLE', 'noisy-cricket');

    define('ADMIN_EMAIL', 'eduardo@quagliato.me');

    define('FILES_URL', APP_URL.'/uploads/');
    define('FILES_URL_FAILSAFE', APP_URL.'/uploads/failsafe/');
    //define('FILES_DIR', APP_DIR.'/uploads/');
    define('FILES_DIR', '/home/quagliato/Dropbox/Sandbox/noisy-cricket/uploads/');
    define('FILES_DIR_FAILSAFE', '/home/quagliato/Dropbox/Sandbox/n_goiania/uploads/failsafe/');
    define('MAX_FILESIZE', '50MB');

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '9u4gl14t0');
    define('DB_NAME', 'noisy-cricket');

    define('SQL_LOG_FILENAME', 'sql.log');

    date_default_timezone_set("America/Sao_Paulo");

    // COLORS
    /*
    $bgcolor = '#EEEDED';
    $bgcolor_old = '#FFFFFF';
    
    $color1 = '#003E50';
    $color1_old = '#D6233B';
    
    $color2 = '#007987'
    $color2_old = '#312D44';  
    */

    // EMAILS
    define('DEFAULT_HUMAN_EMAIL', 'contato@noisy-cricket.net');
    
    define('DEFAULT_EMAIL_FROM', 'noreply@noisy-cricket.net');
    define('DEFAULT_EMAIL_SIGN', "<p>With love,<br />noisy-cricket.</p>");
    define('DEFAULT_EMAIL_GREETING', "<p>Hey!</p>");

    define('DEFAULT_EMAIL_SUBJECT', APP_TITLE);

    include_once("custom/custom_config.php");
?>
