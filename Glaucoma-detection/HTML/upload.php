<?php
	include_once 'config.php';
 ?>
 
<?php

// Step 2: Create a connection to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Terminate if there's an error
}

// Step 4: Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    
    // Step 5: Get the temporary path of the uploaded image
    $image = $_FILES['image']['tmp_name'];

    // Step 6: Ensure the file exists before processing
    if (file_exists($image)) {
        
        // Step 7: Get the binary data of the image
        $imageData = file_get_contents($image);

        // Step 8: Prepare SQL statement to insert image data into the database
        $sql = "INSERT INTO images (image_data) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("b", $imageData); // "b" indicates the type is binary
        
        // Step 9: Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error: " . $stmt->error; // Display error if the insertion fails
        }

        // Step 10: Close the statement
        $stmt->close();
    } else {
        echo "File does not exist."; // Handle the case where the file does not exist
    }
}

// Step 11: Close the database connection
$conn->close();
?>
