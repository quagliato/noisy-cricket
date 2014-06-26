    <?php

    class TxtFile {

    private $filename;
    private $buffer;
    private $writtenContent;

    public function __construct($filename) {
        if (!isset($filename) || is_null($filename) || $filename == "") {
            throw new Exception("TxtFile cannot be initialized without a filename.");
        }
        $this->filename = $filename;
    }
    
    public function fileExists() {
        if (!isset($this->filename) || is_null($this->filename) || $this->filename == "") {
            return false;
        }

        return file_exists($this->filename);
    }

    public function getFileSize() {
        if ($this->fileExists()) {
            return filesize($this->filename);
        }
        
        return -1;
    }

    public function getBufferContent() {
        return $this->buffer;
    }

    public function getWrittenContent() {
        return $this->loadContent();
    }

    public function getContent() {
        $aux = $this->buffer;
        if ($this->fileExists() && $this->getFileSize() > -1) {
            $this->loadContent();
            $aux = array_merge($this->writtenContent, $this->buffer);
        }

        return $aux;
    }

    private function loadContent() {
        $this->writtenContent = array();

        if ($this->fileExists()) {
            $handle = fopen($this->filename, "r");
            if ($handle) {
                while (($line = fgets($handle)) != false) {
                    $this->writtenContent[] = $line;        
                }
            } else {
                throw new Exception("TxtFile could not load file content.");
            }
            fclose($handle);
        }
            
        return $this->writtenContent;
    }

    public function appendNewLine($string) {
        if (sizeof($this->buffer) > 0) {
            $string = "\n".$string;
        }
        $this->appendNewString($string);
    }

    public function appendNewString($string) {
        if (!is_array($this->buffer) || is_null($this->buffer)) {
            $this->buffer = array();
        }
        
        $this->buffer[] = $string;
    }

    public function loadlessAppendNewLine($string) {
        if ($this->fileExists() && $this->getFileSize() > -1) {
            $string = "\n".$string;
        }

        file_put_contents($this->filename, $string, FILE_APPEND);
    }

    public function write($flag) {
        return $this->writeBuffer($flag);
    }

    private function writeBuffer($flag) {
        if (!is_array($this->buffer) || is_null($this->buffer) || sizeof($this->buffer) == 0) {
            return false;
        }

        if ($flag == 0) {
            unlink($this->filename);
        }

        foreach ($this->buffer as $line) {
            file_put_contents($this->filename, $line, FILE_APPEND);
        }

        $this->buffer = array();

        return true;
    }
}

?>
