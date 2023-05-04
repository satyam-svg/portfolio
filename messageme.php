<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Check if required fields are set
    if(isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $subject = mysqli_real_escape_string($conn,$_POST['subject']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);

        // Create SQL Query with Prepared Statement
        $stmt = $conn->prepare("INSERT INTO `me` (`name`,  `subject`, `message`, `date`) VALUES (?, ?, ?, current_timestamp())");
        $stmt->bind_param("ssss", $name,  $subject, $message);

        if($stmt->execute()){
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data! " . $stmt->error;
        }

        $stmt->close();
    } 
}
?>