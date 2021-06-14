<?php


namespace Src\Controller;


use Src\Model\GroupModel;

class GroupController
{
    public $groupModel;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
    }

    public function getAllGroup()
    {
        return $this->groupModel->getAll();
    }
}