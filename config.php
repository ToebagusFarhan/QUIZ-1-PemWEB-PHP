<?php
$host = 'localhost';
$db = 'cv_han';
$user = 'cv';
$pwd = 'mycv';

$conn = mysqli_connect($host, $user, $pwd, $db); // true | false

if (!$conn) {
    echo"error";
  die('Gagal terhubung ke database'. mysqli_connect_error());
}
?>