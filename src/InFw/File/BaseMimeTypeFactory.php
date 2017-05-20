<?php

/**
 * This file is part of InFw\File package.
 */

namespace InFw\File;

/**
 * Class BaseMimeTypeFactory.
 */
class BaseMimeTypeFactory implements MimeTypeFactoryInterface
{
    /**
     * Allowed mime types.
     *
     * @var array
     */
    protected $validMimeTypes;

    /**
     * BaseMimeTypeFactory constructor
     * .
     *
     * @param array $validMimeTypes
     */
    public function __construct(array $validMimeTypes)
    {
        $this->validMimeTypes = $validMimeTypes;
    }

    /**
     * Create new instances of MimeType object.
     *
     * @param string $mimeType
     *
     * @return MimeTypeInterface
     */
    public function make($mimeType)
    {
        return new BaseMimeType(
            $mimeType,
            $this->validMimeTypes
        );
    }
}
