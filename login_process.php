<?php
session_start(); // Start a new session or resume the existing session

$host = "localhost";         // Hostname for MySQL server
$db_user = "root";           // MySQL username
$db_pass = "password";       // MySQL password
$db_name = "employee";       // Name of the database

// Create a new connection to the MySQL database
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check if the connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Output error and stop script
}

// Retrieve form data sent via POST
$username = $_POST['username']; // Get username from POST request
$password = $_POST['password']; // Get password from POST request

// Prepare a SQL query to fetch user with the given username
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql); // Prepare the SQL statement to prevent SQL injection
$stmt->bind_param("s", $username); // Bind the username parameter to the query
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result of the query

// Check if a user with the given username exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc(); // Fetch user data as an associative array

    // Verify the entered password with the hashed password from the database
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username; // Store username in session
        header("Location: welcome.php"); // Redirect to welcome page
        exit; // Stop further script execution
    } else {
        echo "Invalid password."; // Password is incorrect
    }
} else {
    echo "User not found."; // No user with the given username
}

$conn->close(); // Close the database connection
?>
