<?php
session_start(); // Start the session to store user info for login persistence
include 'conf.php'; // Include your database connection file (ensure it works correctly)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    // SQL Query to get user details based on username
    $sql = "SELECT * FROM register WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    // Check if username exists in the database
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Compare password with the stored hashed password
        // You should hash your password before storing it (password_hash() when registering)
        if ($row['password'] === $password) {
            // Set session variables for successful login
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect to the home page
            header('Location: login page.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
}
?>
