<?php
include_once 'src/model/Database.php';
include_once 'src/model/Model.php';
include_once 'src/model/BookModel.php';
include_once 'src/controller/BookController.php';

use Src\Controller\BookController;

$bookController = new BookController();
$data = $bookController->getAllBook();

?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a href="view/add.php">Add</a>
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Email</td>
            <td>Password</td>
            <td>Address</td>
            <td>Group Name</td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($data as $key => $item): ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $item['uEmail'] ?></td>
                <td><?php echo $item['uPassword'] ?></td>
                <td><?php echo $item['uAddress'] ?></td>
                <td><?php echo $item['gName'] ?></td>
                <td><a onclick="return confirm('Chắc chưa?')" href="action/delete.php?id= <?php echo $item['uId'] ?>"
                       class="btn btn-danger">Delete</a></td>
                <td><a href="view/update.php?id= <?php echo $item['uId'] ?>" class="btn btn-primary">Update</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
