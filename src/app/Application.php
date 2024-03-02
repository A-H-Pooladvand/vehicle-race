<?php

namespace Src\app;

class Application
{
    private string $basePath;

    public function __construct(string $basePath)
    {
        $this->basePath = rtrim($basePath, '\/');
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    private function joinPath(string $basePath, string $path = ''): string
    {
        return $basePath . ($path !== '' ? DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR) : '');
    }

    public function basePath(string $path = ''): string
    {
        return $this->joinPath($this->basePath, $path);
    }
}