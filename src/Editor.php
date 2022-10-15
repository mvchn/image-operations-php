<?php

namespace App;

use \GdImage;

class Editor
{
    private Image $image;

    private $white = [255, 255, 255];

    public function addImage(Image $image) : self
    {
        $this->image = $image;

        return $this;
    }

    public function createBackground(int $width, int $height) : GdImage
    {
        $background = imagecreatetruecolor($width, $height);
        $background_color = imagecolorallocate($background, ...$this->white);
        imagefill($background, 0, 0, $background_color);

        return $background;
    }

    public function resize($source, $background, $newwidth, $newheight, $width, $height) : GdImage
    {
        // center coordinates
        $dstX = ($width - $newwidth) / 2;
        $dstY = ($height - $newheight) / 2;

        imagecopyresized($background, $source, $dstX, $dstY, 0, 0, $newwidth, $newheight, $width, $height);

        return $background;
    }

    public function save(string $path, $source) : void
    {
        imagepng($source, $path);
        imagedestroy($source);
    }
}
