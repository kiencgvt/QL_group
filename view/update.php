<?php
include_once '../src/model/Database.php';
include_once '../src/model/Model.php';
include_once '../src/model/BookModel.php';
include_once '../src/controller/BookController.php';
include_once '../src/model/GroupModel.php';
include_once '../src/controller/GroupController.php';

use Src\Controller\BookController;
use Src\Controller\GroupController;
use Src\Model\Database;
$database = new Database();
$pdo = $database->connect();
try {
    $id = $_REQUEST['id'];
    $sql = 'SELECT uEmail, uPassword, uAddress, gName, gId
            FROM users
            JOIN groups ON users.group_id = groups.gId
            WHERE uId = ?;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $groupController = new GroupController();
    $groups = $groupController->getAllGroup();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bookController = new BookController();
        $bookController->updateBook($id);
    }
    echo '<a href="../index.php">Back</a>';
} catch (PDOException $PDOException) {
    echo 'Co loi xay ra. Sua lai';
    echo 'location.reload()';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $data['uEmail']?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="<?php echo $data['uPassword']?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $data['uAddress']?>"></td>
        </tr>
        <tr>
            <td>Group</td>
            <td><select name="group">
                    <?php foreach ($groups as $group): ?>
                        <option value="<?php echo $group['gId'] ?>" <?php if ($group['gId'] == $data['gId']) {echo 'selected';} ?>><?php echo $group['gName'] ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
    </table>
    <input type="submit" value="Gửi">
</form>
</body>
</html>
