<?php

//Turn on error reporting -- this is critical!
/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

session_start();
if (!isset($_SESSION['loggedin'])) {

    //Store the page that I'm currently on in the session
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    //Redirect to login
    header("location: ../login/login.php");
}

?>

<?php

include ("../includes/header.html");
require ("../includes/dbcreds.php");

session_start();
if (!isset($_SESSION['loggedin'])) {

    //Store the page that I'm currently on in the session
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    //Redirect to login
    header("location: ../login/login.php");
}

?>

<?php
// Error Reporting Turned On
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

$page_title = "Requests";

/*
include("includes/header.html");
require ("dbcreds.php"); */

include "../includes/header.html";
require "../includes/dbcreds.php";

?>

<!doctype html>
<html lang="en">
  <head>

    
     <!-- Name: Joanna Folk-->
     <!-- Date: Oct-Dec 2020-->
     <!-- Purpose: Webstie for The Outreach-->
 
  
     <!--Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!--Fav Icon -->
    <link rel="icon" href="images/fav-icon.png?v=2" type="image/png" />

     <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

     <!--Datatables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.foundation.min.css"/>     

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"/>
    

     <!--Custom CSS -->
    <link rel="stylesheet" href="../styles/style.css">

    <title>The Outreach</title>
    
  </head>

    <div class="container justify-content-between">

    <div id="troubleshooter" class="mx-auto"><br></div>

    <div>
</div>
<body>
    
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
      <img src="../images/logo.png" alt="Outreach cross logo">
      <a class="navbar-brand" href="../index.html"><strong>The Outreach</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.html">Home
                  <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active"> 
            <a class="nav-link" href="../login/logout.php">Logout</a> 
          </li>
        </ul>
      </div>
      </div>
    </nav>
<?php
include ("toggle.php");
?>

<div id="website" class="mx-5">

    <h3 class="text-center mt-5">Requests</h3>
    <!--button slider-->

    <!--Table-->
    <table id="requests" class="display cell-border-compact stripe">
        <thead>
            <tr>
                <td>Date</td>
                <td>Name</td>
                <td>Email</td>
                <td>Number</td>
                <td>Zip</td>
                <td>Requests</td>
        </thead>
    
        <tbody>
    
    <?php
    
    $sql = "SELECT * FROM outreach";
    $result = mysqli_query($cnxn, $sql);
    
    foreach ($result as $row) {
    // var_dump($row);
    
        $date = date("M d, Y g:i a",strtotime($row['date']."- 3 hours"));
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $number = $row['number'];
        $zip = $row['zip'];
        $utility = $row['utility'];
        $rent = $row['rent'];
        $gas = $row['gas'];
        $thrift = $row['thrift'];
        $license = $row['license'];
        $goods = $row['goods'];
        $other = $row['other'];
    
    
        echo "<tr>";
        echo "<td>$date</td>";
        echo "<td>$fname $lname</td>";
        echo "<td>$email</td>";
        echo "<td>$number</td>";
        echo "<td>$zip</td>";
        echo "<td>$utility $rent $gas $thrift $license $goods $other</td>";
        echo "</tr>";
    
    }
    ?>

        </tbody>
    </table>

</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    <!-- Datatables -->
    <script>
    $(document).ready( function () {
    $('#requests').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
    } );

    </script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="scripts/script.js"></script>
    </div>
  </body>
</html>