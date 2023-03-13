<?php
include 'model.php';

$room_id = $_GET['id'];
    
$database = new Database();
$database->deleteRoom($room_id);
?>
