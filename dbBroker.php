<?php
$host = "localhost";
$db = "iteh-baza";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_errno) {
    exit("Neuspesna konekcija: $conn->connect_error err kod $conn->connect_errno");
}
