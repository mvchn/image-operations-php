<?php

namespace App;

use \GdImage;

class Image
{
    private string $path;

    private int $width;

    private int $height;

    private GdImage $image;

    public function __construct(string $path)
    {
        $this->path = $path;
        list($this->width,  $this->height) = getimagesize($this->path);

        $this->image = imagecreatefrompng($this->path);
    }

    public function getWidth() : int
    {
        return $this->width;
    }

    public function getHeight() : int
    {
        return $this->height;
    }

    public function getSource() : GdImage
    {
        return $this->image;
    }
}
