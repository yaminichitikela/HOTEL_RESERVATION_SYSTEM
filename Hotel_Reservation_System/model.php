<?php
    class Database
    {
        private $host;
        private $username;
        private $password;
        private $dbname;
        private $conn;

        public function __construct()
        {
            $this->host = "localhost";
            $this->username = "yaminisravanthiasowmya";
            $this->password = "yaminisravanthiasowmyapass";
            $this->dbname = "yaminisravanthiasowmyadatabase";

            // Connect to database
            try {
                $this->conn = new PDO("mysql:host=$this->host", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }

            // Create database if it doesn't exist
            $this->conn->exec("CREATE DATABASE IF NOT EXISTS $this->dbname");
            $this->conn->exec("USE $this->dbname");

        }


        public function createRoomsTable()
        {
            try {
                $query = "CREATE TABLE IF NOT EXISTS rooms (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    room_type VARCHAR(20) NOT NULL,
                    children_space INT(11) NOT NULL,
                    adult_space INT(11) NOT NULL,
                    price_per_night INT(11) NOT NULL,
                    room_image LONGBLOB,
                    availability_status VARCHAR(10) NOT NULL
                )";

                $this->conn->exec($query);
            } catch(PDOException $e) {
                die("Error creating table: " . $e->getMessage());
            }
        }
        public function insertRoom($room_type, $children_space, $adult_space, $price_per_night, $image, $availability_status)
        {
            $this->createRoomsTable();
            
            // Database configuration  
            $dbHost     = "localhost";  
            $dbUsername = "yaminisravanthiasowmya";  
            $dbPassword = "yaminisravanthiasowmyapass";  
            $dbName     = "yaminisravanthiasowmyadatabase";  
            
            // Create database connection  
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
            
            // Check connection  
            if ($db->connect_error) {  
                die("Connection failed: " . $db->connect_error);  
            }
                
            $insert = $db->query("INSERT INTO rooms (room_type, children_space, adult_space, price_per_night, room_image, availability_status) 
            VALUES ('$room_type', '$children_space', '$adult_space', '$price_per_night', '$image', '$availability_status')"); 
            
            if($insert){ 
                header("Location: admin_dashboard.php");
            }else{ 
                echo "File upload failed, please try again.";
            }

        }

        public function deleteRoom($room_id)
        {
            try {
                $query = "DELETE FROM rooms WHERE id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $room_id);
                $stmt->execute();
                header('Location: admin_dashboard.php');
                exit();
            } catch(PDOException $e) {
                die("Error deleting room: " . $e->getMessage());
            }
        }

        public function display_rooms()
        {
            $stmt = $this->conn->prepare("SELECT * FROM rooms");
			$stmt->execute();
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }

        public function display_available_rooms()
        {
            $stmt = $this->conn->prepare("SELECT * FROM rooms where availability_status = 'Free'");

			$stmt->execute();
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }


        public function get_room_by_id($id)
        {
            $stmt = $this->conn->prepare("SELECT * FROM rooms WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }



        public function update_room($room_type,$children_space,$adult_space,$price_per_night,$availability,$id)
        {
            // prepare and execute the update query
            $stmt = $this->conn->prepare("UPDATE rooms SET room_type = :room_type, children_space = :children_space, adult_space = :adult_space, price_per_night = :price_per_night, availability_status = :availability_status WHERE id = :id");
            $stmt->bindParam(':room_type', $room_type);
            $stmt->bindParam(':children_space', $children_space);
            $stmt->bindParam(':adult_space', $adult_space);
            $stmt->bindParam(':price_per_night', $price_per_night);
            $stmt->bindParam(':availability_status', $availability);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            // check if any rows were affected
            if ($stmt->rowCount() > 0) {
                header('Location: admin_dashboard.php');
            } else {
                echo "Failed to update room information.";
            }

        }


        public function create_user()
        {
            try {
                $query = "CREATE TABLE IF NOT EXISTS users (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL,
                    address VARCHAR(255) NOT NULL,
                    street_name VARCHAR(255) NOT NULL,
                    city VARCHAR(50) NOT NULL,
                    state VARCHAR(50) NOT NULL,
                    phone_number VARCHAR(20) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    confirmation_number VARCHAR(50) NOT NULL,
                    check_in_date DATE NOT NULL,
                    check_out_date DATE NOT NULL,
                    room_id INT(11) NOT NULL
                  );";

                $this->conn->exec($query);
            } catch(PDOException $e) {
                die("Error creating table: " . $e->getMessage());
            }
            
        }

        public function insertUser($username, $address, $street_name, $city, $state, $phone_number, $email, $confirmation_number, $check_in_date, $check_out_date, $room_id)
        {
            $this->create_user();
            
            $stmt = $this->conn->prepare("INSERT INTO users (username, address, street_name, city, state, phone_number, email, confirmation_number, check_in_date, check_out_date, room_id) 
            VALUES (:username, :address, :street_name, :city, :state, :phone_number, :email, :confirmation_number, :check_in_date, :check_out_date, :room_id)");

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':street_name', $street_name);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':confirmation_number', $confirmation_number);
            $stmt->bindParam(':check_in_date', $check_in_date);
            $stmt->bindParam(':check_out_date', $check_out_date);
            $stmt->bindParam(':room_id', $room_id);

            $stmt->execute();
        }

        public function room_status($room_id)
        {
            // prepare and execute the update query
            $stmt = $this->conn->prepare("UPDATE rooms SET availability_status = 'Used' WHERE id = :id");
            $stmt->bindParam(':id', $room_id);

            $stmt->execute();

            // check if any rows were affected
            if ($stmt->rowCount() <= 0) {
                echo "Failed to update room information.";
            }
        }
        public function getConnection()
        {
            return $this->conn;
        }
    }
    
?>