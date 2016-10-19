<?php

/**
 * This file is part of InFw\File package.
 */

namespace InFw\File;

/**
 * Interface FileFactory.
 */
interface FileFactoryInterface
{
    /**
     * Make instances of GenericFile.
     *
     * @param string $name
     * @param string $filePath
     *
     * @return FileInterface
     */
    public function make($name, $filePath);
}
