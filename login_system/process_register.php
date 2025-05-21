<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usertype = $_POST['usertype'];

    if ($usertype == "customer") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO customers (username, password, mobile, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $mobile, $email);

        if ($stmt->execute()) {
            echo "Customer registered successfully. <a href='login.php'>Login now</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

    } elseif ($usertype == "employee") {
        $emp_id = $_POST['employee_id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact = $_POST['contact_no'];

        $stmt = $conn->prepare("INSERT INTO employees (employee_id, name, role, contact_no) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $emp_id, $name, $role, $contact);

        if ($stmt->execute()) {
            echo "Employee registered successfully. <a href='login.php'>Login now</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

$conn->close();
?>
