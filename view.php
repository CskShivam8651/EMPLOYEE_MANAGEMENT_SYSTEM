<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "password", "employee");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT Emp_Code, Name_Of_Employee, Gender, present_Designation, Date_Of_Birth FROM employeedetails;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif;

        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .nav-link:hover {
            color: #ffd700 !important;
        }
        .table-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.7s ease-in-out;
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: #3a3a3a;
            margin-bottom: 30px;
        }
        .table thead {
            background: linear-gradient(to right, #5b86e5, #36d1dc);
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            padding: 14px;
        }
       
        .table tbody tr:hover {
            background-color: #fce3ec;
            transition: all 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007bff;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-person-badge-fill"></i> Employee Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="data.php"><i class="bi bi-collection"></i> Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="view.php"><i class="bi bi-card-list"></i> Employee Records</a>
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

<!-- Page Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="table-container">
                <h2><i class="bi bi-card-list"></i> Employee Records</h2>
                <table id="employeeTable" class="table table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th><i class="bi bi-person-badge"></i> Emp Code</th>
                            <th><i class="bi bi-person"></i> Name</th>
                            <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                            <th><i class="bi bi-briefcase-fill"></i> Designation</th>
                            <th><i class="bi bi-calendar-event"></i> Date of Birth</th>
                        </tr>
                        <tr>
                            <th><input type="text" placeholder="Search Emp Code" class="form-control form-control-sm"></th>
                            <th><input type="text" placeholder="Search Name" class="form-control form-control-sm"></th>
                            <th><input type="text" placeholder="Search Gender" class="form-control form-control-sm"></th>
                            <th><input type="text" placeholder="Search Designation" class="form-control form-control-sm"></th>
                            <th><input type="text" placeholder="Search DOB" class="form-control form-control-sm"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td><a href='employee_details1.php?Emp_Code={$row['Emp_Code']}' class='btn btn-link'>{$row['Emp_Code']}</a></td>
                                        <td>{$row['Name_Of_Employee']}</td>
                                        <td>{$row['Gender']}</td>
                                        <td>{$row['present_Designation']}</td>
                                        <td>{$row['Date_Of_Birth']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    let table = $('#employeeTable').DataTable({
        orderCellsTop: true,
        fixedHeader: true
    });

    $('#employeeTable thead tr:eq(1) th').each(function(i) {
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table.column(i).search(this.value).draw();
            }
        });
    });
});
</script>

</body>
</html>
