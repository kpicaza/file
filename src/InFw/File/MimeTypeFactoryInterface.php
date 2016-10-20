<?php

/**
 * This file is part of InFw\File package.
 */

namespace InFw\File;

/**
 * Interface MimeTypeFactory.
 */
interface MimeTypeFactoryInterface
{
    /**
     * Create new instances of MimeType object.
     *
     * @param string $mimeType
     *
     * @return MimeTypeInterface
     */
    public function make($mimeType);
}
