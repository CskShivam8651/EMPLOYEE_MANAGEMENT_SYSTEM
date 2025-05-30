<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "password", "employee");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get Emp_Code from URL
if (isset($_GET['Emp_Code'])) {
    $empCode = $_GET['Emp_Code'];

    // Prepare and execute SQL statement securely
    $sql = "SELECT * FROM employeedetails WHERE Emp_Code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $empCode);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch result
    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "<h3>Employee not found.</h3>";
        exit;
    }
} else {
    echo "<h3>No employee code provided.</h3>";
    exit;
}

// Delete record (if delete parameter is set)
if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
    $deleteSql = "DELETE FROM employeedetails WHERE Emp_Code = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("s", $empCode);
    if ($deleteStmt->execute()) {
        echo "<h3>Employee record deleted successfully.</h3>";
        header("Location: view.php"); // Redirect to the records page after deletion
        exit;
    } else {
        echo "<h3>Error deleting record.</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #83a4d4, #b6fbff);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 1rem;
            text-align: center;
        }

        .table th {
            background-color: #f8f9fa;
            width: 30%;
        }

        .table td {
            background-color: #ffffff;
        }

        .btn-back, .btn-edit, .btn-delete {
            border-radius: 30px;
            padding: 10px 25px;
            transition: 0.3s ease;
        }

        .btn-back:hover, .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }

        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 700px;">
        <div class="card-header">
            Employee Details
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <?php
                foreach ($employee as $key => $value) {
                    echo "<tr><th>" . htmlspecialchars($key) . "</th><td>" . htmlspecialchars($value) . "</td></tr>";
                }
                ?>
            </table>
            <div class="text-center">
                <a href="edit_employee.php?Emp_Code=<?php echo $employee['Emp_Code']; ?>" class="btn btn-edit btn-primary mt-3">Edit</a>
                <a href="?Emp_Code=<?php echo $employee['Emp_Code']; ?>&delete=true" class="btn btn-delete btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                <a href="view.php" class="btn btn-back mt-3">← Back to Records</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
