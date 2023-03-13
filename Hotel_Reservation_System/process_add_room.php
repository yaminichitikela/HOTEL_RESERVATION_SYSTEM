<?php
    include "model.php";
    
    
    // If file upload form is submitted 
    $statusMsg = '';  


    if(isset($_POST['add_room_button']))
    {

        $type = $_POST['room-type'];
        $children = $_POST['children-space'];
        $adult = $_POST['adult-space'];
        $price = $_POST['price-per-night'];
        $availability = "Free";
        
        if(!empty($_FILES["image"]["name"])) 
        { 
             // Get file info 
             $fileName = basename($_FILES["image"]["name"]); 
             $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

             $allowTypes = array('jpg','png','jpeg','gif'); 
             
            if(in_array($fileType, $allowTypes))
            {
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 


                $database = new Database();
                $database->insertRoom($type,$children,$adult,$price,$imgContent,$availability);
            }
            else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            }
        }
        else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 

        echo $statusMsg; 
        
    }
?>