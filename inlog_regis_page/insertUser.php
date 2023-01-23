<?php
require_once "../pdo.php";
var_dump($_POST);
if (isset($_POST['submit'])) {
	$email 	= $_POST['email'];
	$artist = $_POST['artist'];
	$pass 	= $_POST['password'];
	$check 	= $_POST['check_password'];
if ($pass === $check) {
$sql = "INSERT INTO `user` (
	`email`,
  	`password`,
	`artist`
	) VALUES (
	'$email',
  	'$pass',
	'$artist'
)";

$stmt = $pdo->prepare($sql);
$stmt->execute();
		header("location:../inlog_page/inlog.php");
} else {
	echo "somting went rong";
}
}
?>
