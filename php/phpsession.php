<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connect to DB
$database = "jfolkgre_grc";
$username = "jfolkgre_grcuser";
$password = "Q9c03tdXaFsggUe5E8Hkcv7Lwd";
$hostname = "localhost";


$cnxn = @mysqli_connect($hostname,$username,$password,$database) or die ("There was a problem");

if($_POST['rad'] == "on") {
        $sql = "UPDATE Settings
        Set showform = 1
        WHERE id = 1";
} else {
        $sql = "UPDATE Settings
        Set showform = 0
        WHERE id = 1";
}

$result = mysqli_query($cnxn, $sql);


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
    <li class="breadcrumb-item"><a href="./admin.php">Admin</a></li>
  </ol>
</nav>


<h1><span class="badge badge-secondary">Success! The assistance form has been disabled for all users.</span></h1>

