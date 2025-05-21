<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f4f8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h2 {
            color: #333;
        }

        .card {
            background: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            margin-top: 20px;
        }

        label, select {
            font-weight: 500;
        }

        select, input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-container {
            display: none;
        }

        .back-link {
            margin-top: 20px;
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function showForm() {
            const userType = document.getElementById("usertype").value;
            document.getElementById("employeeForm").style.display = userType === "employee" ? "block" : "none";
            document.getElementById("customerForm").style.display = userType === "customer" ? "block" : "none";
        }
    </script>
</head>
<body>

    <h2>Create Your Account</h2>

    <div class="card">
        <label for="usertype">Register as:</label>
        <select id="usertype" onchange="showForm()" required>
            <option value="">-- Select --</option>
            <option value="customer">Customer</option>
            <option value="employee">Employee</option>
        </select>

        <!-- Customer Registration Form -->
        <div id="customerForm" class="form-container">
            <form action="process_register.php" method="POST">
                <input type="hidden" name="usertype" value="customer">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="mobile" placeholder="Mobile Number" required>
                <input type="email" name="email" placeholder="Email ID" required>
                <button type="submit">Register as Customer</button>
            </form>
        </div>

        <!-- Employee Registration Form -->
        <div id="employeeForm" class="form-container">
            <form action="process_register.php" method="POST">
                <input type="hidden" name="usertype" value="employee">
                <input type="text" name="employee_id" placeholder="Employee ID" required>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="role" placeholder="Role" required>
                <input type="text" name="contact_no" placeholder="Contact Number" required>
                <button type="submit">Register as Employee</button>
            </form>
        </div>

        <div class="back-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>
