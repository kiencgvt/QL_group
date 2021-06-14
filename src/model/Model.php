<?php

namespace Src\Model;

class Model
{
    public $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->connect();
    }
}