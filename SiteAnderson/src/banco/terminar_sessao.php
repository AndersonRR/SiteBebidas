<?php
session_start();
if (isset($_SESSION['nome'])) {
	session_destroy();

header("Location: ../../index.php");
}
?>
