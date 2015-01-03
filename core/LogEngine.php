<?php

class LogEngine {

    private static $logFilename = "error.log";
    private static $maxLogFilesize = 10485760; // 10MB in B

    /*
    public function __construct($logFilename) {
        if (!isset($logFilename) || is_null($logFilename) || $logFilename == "") {
            throw new Exception("Cannot log whithout the log's filename.");
        }

        $this->logFilename;
    }
    */

    public function logIt($string) {
        $file = new TxtFile(self::$logFilename);
        $file->loadlessAppendNewLine($string);

        $file = $this->compactLogFile($file);
        if (!$file) {
            throw new Exception("LogEngine: Could not compact file.");
        }
    }

    private function compactLogFile($file) {
        if ($file->getFileSize() > self::$maxLogFilesize) {
            $timestamp = new DateTime('now');
            $timestamp = $timestamp->format("YmdHis");
            $newFilename = $timestamp."_".self::$logFilename;

            $file = $file->moveFile($newFilename);
        }
        return $file;
    }
}

?>
