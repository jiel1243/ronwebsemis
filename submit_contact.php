<?php
// Database connection settings
$servername = "localhost"; // Your database host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "titan"; // The database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare the SQL query
    $sql = "INSERT INTO users (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect with a success message
        echo "<script>
            alert('Thank you for pre-ordering!');
            window.location.href = 'preorder.html'; // Change this to redirect to the desired page
        </script>";
    } else {
        // If an error occurred
        echo "<script>
            alert('Error: " . $conn->error . "');
        </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
