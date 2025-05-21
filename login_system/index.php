<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Portal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: rgba(12, 231, 217, 0.5); /* 50% transparent black */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 100px;
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
            max-width: 400px;
            margin-top: 20px;
        }

        label, select {
            font-weight: 500;
        }

        select, input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .form-container {
            display: none;
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

    <h2>Welcome to the Login Portal</h2>

    <div class="card">
        <label for="usertype">Login as:</label>
        <select id="usertype" onchange="showForm()">
            <option value="">-- Select --</option>
            <option value="employee">Employee</option>
            <option value="customer">Customer</option>
        </select>

        <!-- Customer Login Form -->
        <div id="customerForm" class="form-container">
            <form action="process_login.php" method="POST">
                <input type="hidden" name="usertype" value="customer" />
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Login as Customer</button>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php#customer">Register here</a></p>
            </div>
        </div>

        <!-- Employee Login Form -->
        <div id="employeeForm" class="form-container">
            <form action="process_login.php" method="POST">
                <input type="hidden" name="usertype" value="employee" />
                <input type="text" name="employee_id" placeholder="Employee ID" required />
                <input type="text" name="name" placeholder="Full Name" required />
                <input type="text" name="role" placeholder="Role" required />
                <input type="text" name="contact_no" placeholder="Contact Number" required />
                <button type="submit">Login as Employee</button>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php#employee">Register here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
