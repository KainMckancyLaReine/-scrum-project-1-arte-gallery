<?php
require_once "../pdo.php";

if (isset($_POST['submit'])){

$email = $_POST['email'];
$pass = $_POST['password'];
$sql = "SELECT * FROM `user` WHERE email = '$email'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$rowcount = $stmt->rowCount();
if (($rowcount) > 0) {
    if ($pass === $user["password"]) {
        $_SESSION['User'] = $user['id'];
        echo "<script>alert('geluckt')</script>";
            header('location:../arte_coen_page');
    } else {
        echo "<script>alert('check your usename/password');</script>";
        exit();
    }
} else {
    echo "<script>alert('check your username');</script>";
    exit();
    }
}
?>