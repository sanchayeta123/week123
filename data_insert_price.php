<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'brms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['price'],$_POST['serial_fk_2'])) {
	exit('Please input ');
}
if (empty($_POST['price'] || $_POST['serial_fk_2'])) {
	exit('Please input ');
}
if ($stmt = $con->prepare('INSERT INTO price(price,serial_fk_2) VALUES (?,?)')) {
		$stmt->bind_param('si', $_POST['price'],$_POST['serial_fk_2']);
		$stmt->execute();
		echo 'Successful';
		} else {
		echo 'Could not prepare statement!';
		}
$con->close();
?>