<?php
  include_once("app.php");
  include_once("config.php");
  include_once("custom/custom_urls.php");
  include_once("urls.php");

  define('REQUEST_URI', $_SERVER['REQUEST_URI']);

  $dbcon = new DBStuff;

  if (!$dbcon->testDB()) {
    include_once("view/db_problems.php");

  } else {
    if(strpos(REQUEST_URI, '?') != 0){
      $request_uri_no_param = substr(REQUEST_URI, 0, strpos(REQUEST_URI, '?'));
    }else{
      $request_uri_no_param = REQUEST_URI;
    }

    $found = false;
    foreach ($urlpatterns as $friendly => $actual) {
      $friendly = APP_DIR.$friendly;

      if ($request_uri_no_param == $friendly) {
        $found = true;
        include_once($actual);
        exit();
      }
    }
    if (!$found)
      include_once("view/404.php");
  }
?>
