<?php
require_once('functions.php');
// データ受け取り
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql =
    'SELECT * FROM users_table WHERE username=:username AND password=:password AND deleted_at IS NULL';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
try {
    $status = $stmt->execute();

} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// ユーザ有無で条件分岐
if ($user) {
    $_SESSION = [];
    $_SESSION['id'] = session_id();
    $_SESSION['is_admin'] = $user['is_admin'];
    $_SESSION['username'] = $user['username'];
    header('Location:todo_read.php');
    exit();
}
