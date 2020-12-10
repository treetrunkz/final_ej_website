<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connect to DB
$database = "jfolkgre_grc";
$username = "jfolkgre_grcuser";
$password = "Q9c03tdXaFsggUe5E8Hkcv7Lwd";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname,$username,$password,$database) or die ("There was a problem");

$sql = "SELECT showform FROM Settings WHERE id = 1";

$result = mysqli_query($cnxn, $sql);

$row = mysqli_fetch_array($result);

foreach ($row as $value) {
    echo $value;
}

