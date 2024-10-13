<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $lastname = $_POST['username']; // Get the username from the form

   // Prepare the SQL query with placeholders to prevent SQL injection
   $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)";

   // Use prepared statements to securely bind parameters
   $stmt = $conn->prepare($sql);

   $firstname = 'John';
   $email = 'Masud@example.com';

   // Bind the values
   $stmt->bind_param("sss", $firstname, $lastname, $email); // "sss" means three strings

   // Execute the statement and check for success
   if ($stmt->execute()) {
      echo "Data inserted successfully.";
   } else {
      echo "Error inserting data: " . $conn->error;
   }

   // Close the statement and connection
   $stmt->close();
}
$conn->close();

