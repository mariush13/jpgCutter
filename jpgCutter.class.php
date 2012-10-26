<?php

class jpgCutter {
    
    protected $files;
    protected $fromX;
    protected $fromY;
    protected $width;
    protected $height;
    protected $quality;
    protected $newFolder;
    
    public function __construct($fromX, $fromY, $width, $height, $quality, $files, $srcFolder, $newFolder) {
        $this->fromX = $fromX;
        $this->fromY = $fromY;
        $this->width = $width;
        $this->height = $height;
        $this->quality = $quality;
        $this->files = $files;
        $this->srcFolder = $srcFolder;
        $this->newFolder = $newFolder;
    }
    
    public function cut() {
        foreach ($this->files as $file) {
            $src = imagecreatefromjpeg($this->srcFolder.'/'.$file);
            $dst = imagecreatetruecolor($this->width, $this->height);
            echo $file.' ... ';
            echo (imagecopyresampled($dst, $src, 0, 0, $this->fromX, $this->fromY, $this->width, $this->height, $this->width, $this->height))? '[Copy OK]' : '[Copy Fail]';
            echo (imagejpeg($dst,$this->newFolder.'/'.$file,$this->quality))? '[Save OK]' : '[Save Fail]';
            echo '[Done]<br>'."\n";
        }
    }
    
}

?>