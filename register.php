<?php
include 'db_connection.php';

$db = new DbConnect();
$db->open();
$db->insertUserData($_POST["name"], $_POST["email"], $_POST["tel"], 0, $_POST["skill"]);
$db->close();
?>