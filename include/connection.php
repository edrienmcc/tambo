<?php
    error_reporting(0);
    session_start();
    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "edu_manga";

    $conn = mysqli_connect($host, $user, $pass, $db);
    
    //get data setting
    $query="SELECT * FROM tbl_setting where id='1'";
    $mysqli_query=mysqli_query($conn, $query);
    $mysqli_fetch_assoc=mysqli_fetch_assoc($mysqli_query);

    define("SLIDER", $mysqli_fetch_assoc['slider']);
    define("ads", $mysqli_fetch_assoc['ads']);
    define("startappaccountid", $mysqli_fetch_assoc['startappaccountid']);
    define("androidappid", $mysqli_fetch_assoc['androidappid']);
    define("iosappid", $mysqli_fetch_assoc['iosappid']);

?>