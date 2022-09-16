<?php
$conn = new mysqli("localhost", "spaze_blog", "Jz2j8FsZ6TyTD6P3", "spaze_blog");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$conn->query('SET foreign_key_checks = 0');
if ($result = $conn ->query("SHOW TABLEs")) {
    while($row = $result->fetch_array(MYSQLI_NUM)) {
        $conn->query('DROP TABLE IF EXISTS ' .$row[0]);
    }
}

$conn->query('SET foreign_key_checks = 1');
$conn->close();
?>