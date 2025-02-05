<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(199, 229, 231);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .input-field, .select-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #538df3;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .forgot-password {
            color: rgb(235, 12, 12);
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .close-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" onsubmit="validateLogin(event)">
            <select id="userType" class="select-field" required>
                <option value="member">Member</option>
                <option value="admin">Admin</option>
            </select>
            <input type="text" id="username" class="input-field" placeholder="Username" required>
            <input type="password" id="password" class="input-field" placeholder="Password" required>
            <input type="submit" class="login-btn" value="Login">
            <div class="bottom">
                <div class="left">
                    <input type="checkbox" id="check">
                    <label for="check">Remember Me</label>
                </div>
                <div class="right">
                    <span class="forgot-password" onclick="openForgotPassword()">Forgot password?</span>
                </div>
            </div>
        </form>
    </div>

    <div id="forgotPasswordModal" class="modal">
        <div class="modal-content">
            <h3>Reset Password</h3>
            <input type="email" id="resetEmail" class="input-field" placeholder="Enter your email" required>
            <button class="login-btn" onclick="resetPassword()">Submit</button>
            <button class="close-btn" onclick="closeForgotPassword()">Close</button>
        </div>
    </div>

    <script>
        function validateLogin(event) {
            event.preventDefault();
            var userType = document.getElementById("userType").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (userType === "admin" && username === "admin" && password === "admin123") {
                alert("Login Successful!");
                window.location.href = "Admin Panel.php";
            } else if (userType === "member") {
                document.getElementById("loginForm").action = "dashboard.php";
                document.getElementById("loginForm").submit();
            } else {
                alert("Invalid Username or Password");
            }
        }

        function openForgotPassword() {
            document.getElementById("forgotPasswordModal").style.display = "flex";
        }

        function closeForgotPassword() {
            document.getElementById("forgotPasswordModal").style.display = "none";
        }

        function resetPassword() {
            var email = document.getElementById("resetEmail").value;
            if (email) {
                alert("A password reset link has been sent to " + email);
                closeForgotPassword();
            } else {
                alert("Please enter a valid email");
            }
        }
    </script>
</body>
</html>

