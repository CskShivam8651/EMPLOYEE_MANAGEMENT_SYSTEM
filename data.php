<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "password", "employee");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all employee data from the 'employeedetails' table
$sql = "SELECT * FROM employeedetails";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Employee Data</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- SheetJS for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- Custom styling -->
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            font-family: 'Segoe UI', sans-serif;
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
        }
        .table-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
        }
        .table thead {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            padding: 10px;
            white-space: nowrap;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
            transition: all 0.3s ease;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }
        .export-buttons {
            background-color: white;
            z-index: 1000;
            padding: 10px 0;
            margin-top: -10px;
        }
        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007bff;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-person-badge-fill"></i> Employee Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="all_data.php"><i class="bi bi-collection"></i> Data</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="view.php"><i class="bi bi-card-list"></i> Employee Records</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_employee.php"><i class="bi bi-person-plus-fill"></i> Add New Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="table-container">
        <h2><i class="bi bi-database-fill"></i> All Employee Data</h2>

        <!-- Export Buttons: Static above scroll -->
        <div class="d-flex justify-content-end gap-2 mb-2 export-buttons">
            <button class="btn btn-success" onclick="exportTableToExcel('employeeTable', 'Employee_Data')">
                <i class="bi bi-file-earmark-excel-fill"></i> Export to Excel
            </button>
            <button class="btn btn-primary" onclick="exportTableToCSV('employeeTable', 'Employee_Data')">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to CSV
            </button>
        </div>

        <!-- Scrollable Table -->
        <div class="table-responsive">
            <table id="employeeTable" class="table table-bordered table-hover table-striped mt-3">
                <thead>
                    <tr>
                        <?php
                        if ($result->num_rows > 0) {
                            $firstRow = $result->fetch_assoc();
                            foreach ($firstRow as $col => $val) {
                                echo "<th>" . htmlspecialchars($col) . "</th>";
                            }
                            echo "</tr></thead><tbody>";
                            echo "<tr>";
                            foreach ($firstRow as $val) {
                                echo "<td>" . htmlspecialchars($val) . "</td>";
                            }
                            echo "</tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                foreach ($row as $val) {
                                    echo "<td>" . htmlspecialchars($val) . "</td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<th colspan='100%'>No employee data found</th></tr></thead><tbody>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Export Scripts -->
<script>
function exportTableToExcel(tableID, filename = '') {
    const table = document.getElementById(tableID);
    const workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
    XLSX.writeFile(workbook, filename ? filename + ".xlsx" : "data.xlsx");
}

function exportTableToCSV(tableID, filename = '') {
    const table = document.getElementById(tableID);
    let csv = [];
    for (let row of table.rows) {
        let rowData = [];
        for (let cell of row.cells) {
            let text = cell.innerText.replace(/"/g, '""');
            rowData.push(`"${text}"`);
        }
        csv.push(rowData.join(","));
    }
    const blob = new Blob([csv.join("\n")], { type: "text/csv;charset=utf-8;" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = filename ? filename + ".csv" : "data.csv";
    link.click();
}
</script>

</body>
</html>
