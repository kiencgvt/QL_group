<?php


namespace Src\Model;


class GroupModel extends Model
{
    function getAll() {
        $sql = 'SELECT *
                FROM groups;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}