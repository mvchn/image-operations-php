<?php

namespace  App\Tests;

use App\Image;
use PHPUnit\Framework\TestCase;
use App\Editor;

class EditorTest extends TestCase
{

    public function testResizeSuccess() : void
    {

        $filename = '../var/uploads/duck.png';
        $newFilename = '../var/uploads/duck-resized.png';
        $percent = 0.5;

        $editor = new Editor();
        $image = new Image($filename);
        $editor->addImage($image);

        $width = $image->getWidth();
        $height = $image->getHeight();

        $newWidth = $width * $percent;
        $newHeight = $height * $percent;

        $background = $editor->createBackground($width, $height);

        $result = $editor->resize($image->getSource(), $background, $newWidth, $newHeight, $width, $height);

        $editor->save($newFilename, $result);

        $this->assertTrue(true);
    }
}
