<?php

/**
 * This file is part of InFw\File package.
 */

namespace InFw\File;

use InFw\Size\SizeFactoryInterface;

/**
 * Class GenericFileFactory.
 */
class GenericFileFactory implements FileFactoryInterface
{
    /**
     * Mime type Factory.
     *
     * @var MimeTypeFactory
     */
    private $mimeType;

    /**
     * Size Factory.
     *
     * @var SizeFactoryInterface
     */
    private $size;

    /**
     * GenericFileFactory constructor.
     *
     * @param MimeTypeFactory $mimeTypeFactory
     * @param SizeFactoryInterface     $sizeFactory
     */
    public function __construct(
        MimeTypeFactory $mimeTypeFactory,
        SizeFactoryInterface $sizeFactory
    ) {
        $this->mimeType = $mimeTypeFactory;
        $this->size = $sizeFactory;
    }

    /**
     * Make instances of GenericFile.
     *
     * @param string $name
     * @param string $filePath
     *
     * @return FileInterface
     */
    public function make($name, $filePath)
    {
        return new GenericFile(
            $name,
            $this->mimeType->make(
                mime_content_type($filePath)
            ),
            $this->size->make(
                filesize($filePath)
            ),
            $filePath
        );
    }
}
