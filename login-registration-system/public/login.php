<?php
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if($user->login()) {
        echo "User logged in successfully.";
    } else {
        echo "User login failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
