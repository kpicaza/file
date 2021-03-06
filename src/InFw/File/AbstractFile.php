<?php

/**
 * This file is part of InFw\File package.
 */

namespace InFw\File;

use InFw\Size\SizeInterface;
use InvalidArgumentException;

/**
 * Class AbstractFile.
 */
abstract class AbstractFile implements FileInterface
{
    /**
     * File name.
     *
     * @var string
     */
    protected $name;

    /**
     * File mime type.
     *
     * @var MimeTypeInterface
     */
    protected $mimeType;

    /**
     * File size.
     *
     * @var SizeInterface
     */
    protected $size;

    /**
     * File tmp path name.
     *
     * @var string
     */
    protected $tmpName;

    /**
     * AbstractFile constructor.
     *
     * @param string $name
     * @param MimeTypeInterface $mimeType
     * @param SizeInterface $size
     * @param string $tmpName
     */
    public function __construct($name, MimeTypeInterface $mimeType, SizeInterface $size, $tmpName)
    {
        $this->name = $name;
        $this->mimeType = $mimeType;
        $this->size = $size;

        if (false === file_exists($tmpName)) {
            throw new InvalidArgumentException(
                'File ' . $tmpName . ' does not exists.'
            );
        }

        if (false === $this->mimeType->isValid($tmpName, [$this->mimeType->get()])) {
            throw new InvalidArgumentException(
                'File ' . $tmpName . ' and given mime type don\'t match.'
            );
        }

        $this->tmpName = $tmpName;
    }

    /**
     * Obtain File name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Obtain File mime type.
     *
     * @return string
     */
    public function getMimeType()
    {
        return (string) $this->mimeType;
    }

    /**
     * Obtain File size in kb.
     *
     * @return int
     */
    public function getSize()
    {
        return (int) $this->size;
    }

    /**
     * Obtain File tmp path name.
     *
     * @return string
     */
    public function getTmpName()
    {
        return $this->tmpName;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource.
     *
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'mimeType' => $this->mimeType->get(),
            'size' => $this->size->get(),
        ];
    }
}
