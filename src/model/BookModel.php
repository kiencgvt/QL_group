<?php


namespace Src\Model;


class BookModel extends Model
{
    function getAll()
    {
        $sql = 'SELECT uId, uEmail, uPassword, uAddress, gName
                FROM users
                JOIN groups ON users.group_id = groups.gId
                ORDER BY uID;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function add($email, $password, $address, $group_id)
    {
        $sql = 'INSERT INTO users (uEmail, uPassword, uAddress, group_id)
                VALUES (?, ?, ?, ?);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $address);
        $stmt->bindParam(4, $group_id);
        $stmt->execute();
    }
    function update($id, $email, $password, $address, $group_id) {
        $sql = 'UPDATE users
                SET uEmail = ?, uPassword = ?, uAddress = ?, group_id = ?
                WHERE uId = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $address);
        $stmt->bindParam(4, $group_id);
        $stmt->bindParam(5, $id);
        $stmt->execute();
    }
    function delete($id) {
        $sql = 'DELETE FROM users WHERE uId = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }
}