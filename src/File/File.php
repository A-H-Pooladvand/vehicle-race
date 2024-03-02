<?php

namespace Src\File;

class File
{
    public static function getContents(string $filename): ?string
    {
       if (!is_file($filename)) {
           return null;
       }

        return file_get_contents($filename);
    }
}