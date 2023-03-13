<?php
include 'model.php';

$database = new Database();
$conn = $database->getConnection();

// Get image data from database 
$stmt = $conn->prepare("SELECT room_image FROM rooms ORDER BY id DESC");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if(!empty($results)){ ?> 
    <div class="gallery"> 
        <?php foreach($results as $row){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['room_image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
