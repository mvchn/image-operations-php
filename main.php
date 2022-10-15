<?php

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

CONST UPLOAD_RIR = __DIR__ . '/var/uploads/';

$filename = UPLOAD_RIR . 'duck.png';
$newFilename = UPLOAD_RIR . 'duck-resized.png';
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
