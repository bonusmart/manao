<?php
	require "/include/db_connect.php";
?>
<?php
	unset($_SESSION['logged_user']);
    header('location:/');
?>
