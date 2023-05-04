<?php
 $conn = mysqli_connect("localhost","projet2022-25","fN2vt4U6","bdd2022_25");
 $conn->query("SET CHARACTER SET utf8");

session_start();

if (isset($_SESSION["identite"]) == false)
{
    $_SESSION["identite"] = null;
}
?>