<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'crud application';

$connection = mysqli_connect($server, $username, $password, $db_name);
if (!$connection) {
    die ("ERROR CONNECTION:" . mysqli_connect_error());
}