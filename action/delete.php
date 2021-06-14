<?php
include_once '../src/model/Database.php';
include_once '../src/model/Model.php';
include_once '../src/model/BookModel.php';
include_once '../src/controller/BookController.php';
include_once '../src/model/GroupModel.php';
include_once '../src/controller/GroupController.php';

use Src\Controller\BookController;

try {
    $bookController = new BookController();
    $bookController->deleteBook();
} catch (PDOException $PDOException) {
    echo 'Co loi xay ra';
    echo '<a href="../index.php">Back</a>';
    die();
}