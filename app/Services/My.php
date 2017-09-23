<?php

namespace App\Services;

class My
{
    protected $message;

    public function __construct($message = "")
    {
        $this->message = $message;
    }

    public function message()
    {
        return $this->message;
    }
}