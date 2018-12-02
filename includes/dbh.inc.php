<?php
// ==========TIEK IZVEIDOTI MAINĪGIE PRIEKŠ PIESLĒGŠANĀS PIE DB==========
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "root";
$dBName = "produkti";

// ==========TIEK IZVEIDOTS SAVIENOJUMS AR DB==========
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
// ==========LAI ATPAZITU GARUMZĪMES UN MĪKSTINIĀJUMA ZĪMES=========
mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8',
    character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
// ==========TIEK PĀRBAUDĪTS SAVIENOJUMS AR DB==========
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
