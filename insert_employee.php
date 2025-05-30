<?php
// Database connection
$conn = new mysqli("localhost", "root", "password", "employee");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize inputs
function sanitize($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

// Collect and sanitize POST data
$Emp_Code = sanitize($_POST['Emp_Code'], $conn);
$Name_Of_Employee = sanitize($_POST['Name_Of_Employee'], $conn);
$Gender = sanitize($_POST['Gender'], $conn);
$Initially_Appointed_As = sanitize($_POST['Initially_Appointed_As'], $conn);
$Present_Designation = sanitize($_POST['Present_Designation'], $conn);
$Category_Type = sanitize($_POST['Category_Type'], $conn);
$Date_Of_Birth = sanitize($_POST['Date_Of_Birth'], $conn);
$Pay_Band_Amount = floatval($_POST['Pay_Band_Amount']);
$Pay_Band = sanitize($_POST['Pay_Band'], $conn);
$Grade_Pay = sanitize($_POST['Grade_Pay'], $conn);
$Level_7th_CPC = sanitize($_POST['Level_7th_CPC'], $conn);
$Group_Type = sanitize($_POST['Group_Type'], $conn);
$Date_Joining_NIELIT = sanitize($_POST['Date_Joining_NIELIT'], $conn);
$Date_Regularization_NIELIT = sanitize($_POST['Date_Regularization_NIELIT'], $conn);
$Date_Joining_Present_Centre = sanitize($_POST['Date_Joining_Present_Centre'], $conn);
$Date_Joining_Present_Post = sanitize($_POST['Date_Joining_Present_Post'], $conn);
$Caste_Category = sanitize($_POST['Caste_Category'], $conn);
$Is_PWD = intval($_POST['Is_PWD']);
$Is_Minority = intval($_POST['Is_Minority']);
$Religion = sanitize($_POST['Religion'], $conn);
$Date_Of_Superannuation = sanitize($_POST['Date_Of_Superannuation'], $conn);
$Education_Qualification = sanitize($_POST['Education_Qualification'], $conn);
$Email_ID = sanitize($_POST['Email_ID'], $conn);
$Mobile_No = sanitize($_POST['Mobile_No'], $conn);

// Insert query
$sql = "INSERT INTO employeedetails (
    Emp_Code, Name_Of_Employee, Gender, Initially_Appointed_As, Present_Designation,
    Category_Type, Date_Of_Birth, Pay_Band_Amount, Pay_Band, Grade_Pay,
    Level_7th_CPC, Group_Type, Date_Joining_NIELIT, Date_Regularization_NIELIT,
    Date_Joining_Present_Centre, Date_Joining_Present_Post, Caste_Category,
    Is_PWD, Is_Minority, Religion, Date_Of_Superannuation, Education_Qualification,
    Email_ID, Mobile_No
) VALUES (
    '$Emp_Code', '$Name_Of_Employee', '$Gender', '$Initially_Appointed_As', '$Present_Designation',
    '$Category_Type', '$Date_Of_Birth', '$Pay_Band_Amount', '$Pay_Band', '$Grade_Pay',
    '$Level_7th_CPC', '$Group_Type', '$Date_Joining_NIELIT', '$Date_Regularization_NIELIT',
    '$Date_Joining_Present_Centre', '$Date_Joining_Present_Post', '$Caste_Category',
    '$Is_PWD', '$Is_Minority', '$Religion', '$Date_Of_Superannuation', '$Education_Qualification',
    '$Email_ID', '$Mobile_No'
)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Employee added successfully!'); window.location.href='welcome.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

