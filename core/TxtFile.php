    <?php

    class TxtFile {

    private $filename;
    private $content;
    private $loadedContent;

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

    public function getContent() {
        if ((!isset($this->content) || 
            is_null($this->content) || 
            sizeof($this->content) == 0) &&
            $this->fileExists()) {
            $this->loadContent();
        }
        
        return $this->content;
    }

    private function loadContent() {
        if (!is_array($this->loadedContent)) {
            $this->loadedContent = array();
        }

        $handle = fopen($this->filename, "r");
        if ($handle) {
            while (($line = fgets($handle)) != false) {
                $this->loadedContent[] = $line;        
            }
        } else {
            throw new Exception("TxtFile could not load file content.");
        }
        fclose($handle);
    }

    public function appendNewLine($string) {
        if (!is_array($this->content) || is_null($this->content)) {
            $this->content = array();
        }

        $this->content[] = $string;
    }

    public function loadlessAppendNewLine($string) {
        if ($this->fileExists()) {
            file_put_contents($this->filename, $string."\n", FILE_APPEND);
        }
    }

    public function write($flag) {
        $return = true;
        
        switch ($flag) {
            case 1:
                $return = mergeContent();
            case 0: 
                $return = writeContent();
                break;
        }

        return $return;
    }

    private function writeContent() {
        if (!is_array($this->content) || is_null($this->content) || sizeof($this->content) == 0) {
            return false;
        }

        unline($this->filename);

        foreach ($this->content as $line) {
            file_put_contents($this->filename, $line."\n", FILE_APPEND);
        }

        return true;
    }

    private function mergeContent() {
        if (!is_array($this->loadedContent) || is_null($this->loadedContent) || sizeof($this->loadedContent) == 0) {
            return false;
        }

        $aux = $this->content;
        $this->content = array();

        foreach ($this->loadedContent as $line) {
            $this->content[] = $line;
        }

        foreach ($aux as $line) {
            $this->content[] = $line;
        }

        return true;
    }
}

?>
