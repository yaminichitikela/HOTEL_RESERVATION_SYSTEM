<?php
    include "model.php";

    if(isset($_POST['save']))
    {
        $type = $_POST['room_type'];
        $children = $_POST['children_space'];
        $adult = $_POST['adult_space'];
        $price = $_POST['price_per_night'];
        $availability = $_POST['availability_status'];
        $id = $_POST['id'];
        
        $database = new Database();
        $database->update_room($type,$children,$adult,$price,$availability,$id);

    }
?>