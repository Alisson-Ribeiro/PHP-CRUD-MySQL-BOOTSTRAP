<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_github";

$conn = mysqli_connect($servername, $username, $password, $password);

if(!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
echo "Connected sucessfully";