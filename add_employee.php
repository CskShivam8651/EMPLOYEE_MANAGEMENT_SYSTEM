<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Employee</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Page styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            background-attachment: fixed;
            color: #333;
            transition: background 0.4s ease, color 0.4s ease;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Main container -->
    <div class="container mt-5">
        <!-- Page title section -->
        <div class="text-white text-center py-3 mb-4 rounded" style="background: linear-gradient(to right, #007bff, #0056b3); font-size: 1.8rem; font-weight: bold;">
            Add New Employee
        </div>

        <!-- Employee form -->
        <form action="insert_employee.php" method="POST" class="bg-white p-4 rounded shadow-sm">
            <div class="row g-3">

                <!-- Row 1: Basic Details -->
                <div class="col-md-4">
                    <label>Emp Code</label>
                    <input type="text" name="Emp_Code" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Full Name</label>
                    <input type="text" name="Name_Of_Employee" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Gender</label>
                    <select name="Gender" class="form-select" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Row 2: Designation and Category -->
                <div class="col-md-4">
                    <label>Initially Appointed As</label>
                    <input type="text" name="Initially_Appointed_As" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Present Designation</label>
                    <input type="text" name="Present_Designation" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Category Type</label>
                    <input type="text" name="Category_Type" class="form-control">
                </div>

                <!-- Row 3: Pay Details -->
                <div class="col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="Date_Of_Birth" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Pay Band Amount</label>
                    <input type="number" step="0.01" name="Pay_Band_Amount" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Pay Band</label>
                    <input type="text" name="Pay_Band" class="form-control">
                </div>

                <!-- Row 4: Pay Grade and Group -->
                <div class="col-md-4">
                    <label>Grade Pay</label>
                    <input type="text" name="Grade_Pay" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Level (7th CPC)</label>
                    <input type="text" name="Level_7th_CPC" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Group Type</label>
                    <input type="text" name="Group_Type" class="form-control">
                </div>

                <!-- Row 5: Joining Dates -->
                <div class="col-md-4">
                    <label>Date of Joining NIELIT</label>
                    <input type="date" name="Date_Joining_NIELIT" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Date of Regularization</label>
                    <input type="date" name="Date_Regularization_NIELIT" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Date Joining Present Centre</label>
                    <input type="date" name="Date_Joining_Present_Centre" class="form-control">
                </div>

                <!-- Row 6: Caste and PWD Info -->
                <div class="col-md-4">
                    <label>Date Joining Present Post</label>
                    <input type="date" name="Date_Joining_Present_Post" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Caste Category</label>
                    <input type="text" name="Caste_Category" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Is PWD</label>
                    <select name="Is_PWD" class="form-select">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <!-- Row 7: Minority and Religion -->
                <div class="col-md-4">
                    <label>Is Minority</label>
                    <select name="Is_Minority" class="form-select">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Religion</label>
                    <input type="text" name="Religion" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Date of Superannuation</label>
                    <input type="date" name="Date_Of_Superannuation" class="form-control">
                </div>

                <!-- Row 8: Education and Contact Info -->
                <div class="col-md-6">
                    <label>Education Qualification</label>
                    <textarea name="Education_Qualification" class="form-control" rows="2"></textarea>
                </div>
                <div class="col-md-3">
                    <label>Email ID</label>
                    <input type="email" name="Email_ID" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Mobile No</label>
                    <input type="text" name="Mobile_No" class="form-control">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">Add Employee</button>
            </div>
        </form>
    </div>

</body>
</html>
