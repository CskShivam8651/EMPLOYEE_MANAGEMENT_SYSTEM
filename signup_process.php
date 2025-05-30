<?php
// Database connection credentials
$host = "localhost";
$db_user = "root";
$db_pass = "password";
$db_name = "employee";

// Create a new MySQLi connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check if connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Output error and stop script
}

// Get submitted username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare SQL to check if username already exists
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql); // Prepare the query
$stmt->bind_param("s", $username); // Bind username parameter as string
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result set

// Check if any record with same username exists
if ($result->num_rows > 0) {
    echo "Username already taken. <a href='signup.php'>Try again</a>"; // Display message if username is taken
} else {
    // Hash the password securely using bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL to insert new user
    $insert_sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql); // Prepare insert statement
    $insert_stmt->bind_param("ss", $username, $hashed_password); // Bind username and hashed password

    // Execute the insert and check if successful
    if ($insert_stmt->execute()) {
        echo "Signup successful! <a href='login.php'>Login now</a>"; // Success message
    } else {
        echo "Error: " . $insert_stmt->error; // Show error message if insert fails
    }
}

// Close the database connection
$conn->close();
?>
