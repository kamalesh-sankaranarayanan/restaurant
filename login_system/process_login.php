<?php
session_start(); // ✅ Start session to use $_SESSION

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usertype = $_POST['usertype'];

    if ($usertype == "customer") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM login_info WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = 'customer'; // ✅ Store usertype in session
            header("Location: welcome.php");
            exit();
        } else {
            echo "Invalid customer username or password.";
        }

    } elseif ($usertype == "employee") {
        $emp_id = $_POST['employee_id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact = $_POST['contact_no'];

        $stmt = $conn->prepare("SELECT * FROM employees WHERE employee_id = ? AND name = ? AND role = ? AND contact_no = ?");
        $stmt->bind_param("ssss", $emp_id, $name, $role, $contact);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['employee_id'] = $emp_id;
            $_SESSION['name'] = $name;
            $_SESSION['usertype'] = 'employee'; // ✅ Store usertype in session
            header("Location: add_dish.php");
            exit();
        } else {
            echo "Invalid employee credentials.";
        }
    }
}

$conn->close();
?>

