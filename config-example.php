<?php
    // CONFIGS
    
    // *** ATENTION ***
    // THIS FILE SHOULD BE RENAMED TO config.php

    // The directory of the domain where app is running;
    // If it is running on root domain, leave it blank.
    define('APP_DIR', '/noisy-cricket');
    // The app URL
    define('APP_URL', 'http://localhost/noisy-cricket');
    // The app title used on header and <title>
    define('APP_TITLE', 'noisy-cricket');

    // The first user to register using the this email address will be setted
    // as system's root user
    define('ADMIN_EMAIL', '');

    // FILES
    // All paths in file config should have a slash at the end

    // The root URL for uploaded files
    define('FILES_URL', APP_URL.'/uploads/');
    // The root URL for uploaded files with problems
    define('FILES_URL_FAILSAFE', APP_URL.'/uploads/failsafe/');
    // The full path to the directory where files will be uploaded
    define('FILES_DIR', '/full/path/to/dir/');
    // The same, but for failsafe
    define('FILES_DIR_FAILSAFE', '/full/path/to/dir/failsafe/');

    // Maximun filesize for uploaded files
    define('MAX_FILESIZE', '50MB');
    // Defines if database will store UTF-8 encoded data
    define('UTF8ENCODED', true);

    // DB Settings
    define('DB_HOST', '');
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_NAME', '');

    // THEME DEFINITION
    define('THEME', 'default');

    // Default SQL log filename (with path, if you want).
    // ALL SQL activity is logged.
    define('SQL_LOG_FILENAME', 'sql.log');

    // Default maximum size for log files befor compact it.
    define('DEFAULT_LOG_MAX_FILESIZE', 1024000);  // 1MB in B

    // Sets default timezone.
    date_default_timezone_set("America/Sao_Paulo");

    // EMAILS
    // Default e-mail address to a real person
    define('DEFAULT_HUMAN_EMAIL', 'contact@noisy-cricket.net');

    // Default no-reply e-mail
    define('DEFAULT_EMAIL_FROM', 'noreply@noisy-cricket.net');
    // Default signature for all e-mails
    define('DEFAULT_EMAIL_SIGN', "<p>With love,<br />noisy-cricket.</p>");
    // Default greeting for all e-mails
    define('DEFAULT_EMAIL_GREETING', "<p>Hey!</p>");

    // Default e-mail subject
    define('DEFAULT_EMAIL_SUBJECT', APP_TITLE);

    // Includes custom configs
    if (file_exists("custom/configs") && is_dir("custom/configs")) {
      $configFiles = scandir("custom/configs");
      foreach ($configFiles as $configFile) {
        if (preg_match_all("~\.php$~", $configFile)) {
          include_once("custom/configs/$configFile");
        }
      }
    }
?>
