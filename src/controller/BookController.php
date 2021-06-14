<?php

namespace Src\Controller;
use Src\Model\BookModel;

class BookController
{
    public $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function getAllBook()
    {
        return $this->bookModel->getAll();
    }
    public function addBook() {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $address = $_REQUEST['address'];
        $group = $_REQUEST['group'];
        $this->bookModel->add($email, $password, $address, $group);
        header('location:../index.php');
    }

    public function updateBook($id)
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $address = $_REQUEST['address'];
        $group = $_REQUEST['group'];
        $this->bookModel->update($id, $email, $password, $address, $group);
        header('location:../index.php');
    }

    public function deleteBook()
    {
        $id = $_REQUEST['id'];
        $this->bookModel->delete($id);
        header('location: ../index.php');
    }
}