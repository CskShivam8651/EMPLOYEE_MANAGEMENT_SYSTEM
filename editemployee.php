<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "password", "employee");

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Emp_Code = $_POST['Emp_Code'];
    $Emp_Name = $_POST['Emp_Name'];
    $Emp_Department = $_POST['Emp_Department'];
    $Emp_Salary = $_POST['Emp_Salary'];

    // Update employee details
    $updateSql = "UPDATE employeedetails SET Emp_Name = ?, Emp_Department = ?, Emp_Salary = ? WHERE Emp_Code = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssss", $Emp_Name, $Emp_Department, $Emp_Salary, $Emp_Code);
    if ($updateStmt->execute()) {
        echo "<h3>Employee details updated successfully.</h3>";
        header("Location: view.php");
        exit;
    } else {
        echo "<h3>Error updating record.</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 700px;">
        <div class="card-header">
            Edit Employee Details
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <input type="hidden" name="Emp_Code" value="<?php echo $employee['Emp_Code']; ?>">
                <div class="mb-3">
                    <label for="Emp_Name" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" name="Emp_Name" value="<?php echo $employee['Emp_Name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Emp_Department" class="form-label">Department</label>
                    <input type="text" class="form-control" name="Emp_Department" value="<?php echo $employee['Emp_Department']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Emp_Salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" name="Emp_Salary" value="<?php echo $employee['Emp_Salary']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="view.php" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
