In Framework - File
====================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kpicaza/file/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/file/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/kpicaza/file/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/file/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/kpicaza/file/badges/build.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/file/build-status/master)


File is a useful object used as base file at "In Framework" [FileManager](https://github.com/kpicaza/file-manager).

It can be very useful to validate file uploads.

Package contains two generic file types `GenericFile` and `Base64File`.
 

## Installation

````
composer require infw/file
````

## Usage

````php
<?php

use InFw\File\BaseMimeTypeFactory;
use InFw\Size\BaseSizeFactory;
use InFw\File\MimeTypes;
use InFw\File\GenericFileFactory;

$config = [
    'min_size' => 20,
    'max_size' => 140000
];

$mime = new BaseMimeTypeFactory(
    MimeTypes::IMAGES
);

$size = new BaseSizeFactory(
    $config['min_size'],
    $config['max_size']
);

// Assuming your form has an input type=file field named "upload" and an input type=name named "file_name".
$fileFactory = new GenericFileFactory($mime, $size);

/** @var \InFw\File\FileInterface $file */
$file = $fileFactory->make($_FILES['upload'][0]['tmp_name'], $_POST['file_name']);

$file->getName();
$file->getMimeType();
$file->getSize();
$file->getTmpName();

````
