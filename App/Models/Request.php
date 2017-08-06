<?php

class Request
{
    protected $method;
    protected $path;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }
}