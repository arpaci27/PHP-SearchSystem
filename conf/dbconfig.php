<?php
// Configuration for database connection
$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "search"; // replace with your database name
$port       = 3306; // default port for mysql

// Create connection
$baglanti = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($baglanti->connect_error) {
    die("Connection failed: " . $baglanti->connect_error);
}
echo "Database connection successful!";
?>