<?php

/**
 * This file is part of InFw\File package.
 */

namespace InFw\File;

use InFw\Size\SizeInterface;

/**
 * Class Base64File
 */
class Base64File extends AbstractFile
{
    const BASE64_FILE_STRING = 'data:%s;base64,%s';

    /**
     * Base 64 encoded version of file.
     *
     * @var string
     */
    private $encoded;

    /**
     * Base64File constructor.
     *
     * @param string $name
     * @param MimeTypeInterface $mimeType
     * @param SizeInterface $size
     * @param string $tmpName
     * @see AbstractFile;
     */
    public function __construct($name, MimeTypeInterface $mimeType, SizeInterface $size, $tmpName)
    {
        parent::__construct($name, $mimeType, $size, $tmpName);
        $this->encoded = sprintf(
            self::BASE64_FILE_STRING,
            $this->getMimeType(),
            base64_encode(
                file_get_contents($this->getTmpName())
            )
        );
    }

    /**
     * Get Base64 encoded file.
     *
     * @return string
     */
    public function get()
    {
        return $this->encoded;
    }
}
