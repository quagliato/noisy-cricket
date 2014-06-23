<?php

    include_once("config.php");
    include_once("app.php");

	define('REQUEST_URI', $_SERVER['REQUEST_URI']);

	function url_response($urlpatterns) {
        $dbcon = new DBStuff;

        if (!$dbcon->testDB()) {
            include_once("theme/db_problems.php");

        } else {
            if(strpos(REQUEST_URI, '?') != 0){
                $request_uri_no_param = substr(REQUEST_URI, 0, strpos(REQUEST_URI, '?'));
            }else{
                $request_uri_no_param = REQUEST_URI;
            }

            $found = false;
            foreach ($urlpatterns as $friendly => $actual) {
                $friendly = APP_DIR.$friendly;
                /*
                echo "a) ".APPLICATION_DIR."<br />";
                echo "b) ".REQUEST_URI."<br />";
                echo "c) ".$request_uri_no_param."<br />";
                echo "d) ".$friendly."<br />";
                echo "e) ".$actual."<br />";
                */

                // if (preg_match("@^{$friendly}$@", REQUEST_URI, $_GET)) {
                if ($request_uri_no_param == $friendly) {
                    $found = true;
                    include_once($actual);
                    exit();
                }
            }
            if (!$found)
                include_once("theme/404.php");
        }
		
		return;		
	}
?>
