----Read Me----

CRUD system for the admin, login and management of Cricket Training Club
1.Cricket Training Club Database
2.Admin Login System
3.CRUD Operations for Cricket Training Club (Create, Read, Update, Delete)

-----
(1) .Database Name = cricket_club
       Tables = admin (id - pk[int] , username[varchar 50], password [varchar 255])
                 players(id - pk[int] , name[varchar 100], age[int], position[varchar 50], team[varchar 50])

-----
(2).Admin Login System

<?php
session_start();
$conn = new mysqli("localhost", "root", "", "cricket_club");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Use MD5 for simplicity; prefer more secure hashing in production.

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid Username or Password";
    }
}
?>

<html>
    <head>
        <title>cricket_club</title>
    </head>
    <body>
        <form method="POST" action="">
        <fieldset style="width: 20%;" font-family="bold">
        <h1><b><center>Login Form</center></b></h1><pre>
        <Pre>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
        <Pre>
        <a href="#" style="color: blue;">Forgot Password?</a><br>
        <hr>
        <p><center>Don't have an account? <a href="#" style="color: blue;">Create One</center></a></p>
        </pre> 
        </fieldset>
        </form>
    </body>
</html>




-----
(3).CRUD Operations for Cricket Training Club (Create, Read, Update, Delete)

(a) Dashboard - dashboard.php

Display the CRUD options after successful login.

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<h1>Welcome, Admin!</h1>
<a href="create.php">Add New Player</a> | 
<a href="read.php">View Players</a> | 
<a href="logout.php">Logout</a>

(b) Create - create.php

Form to add a new player.

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "cricket_club");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $team = $_POST['team'];

    $sql = "INSERT INTO players (name, age, position, team) VALUES ('$name', '$age', '$position', '$team')";
    if ($conn->query($sql)) {
        echo "Player added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Age:</label>
    <input type="number" name="age" required>
    <label>Position:</label>
    <input type="text" name="position" required>
    <label>Team:</label>
    <input type="text" name="team" required>
    <button type="submit">Add Player</button>
</form>

(c) Read - read.php

View all players.

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "cricket_club");

$sql = "SELECT * FROM players";
$result = $conn->query($sql);
?>

<h1>Player List</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Position</th>
        <th>Team</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['position']; ?></td>
        <td><?php echo $row['team']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> | 
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

(d) Update - update.php

Edit player details.

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "cricket_club");
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $team = $_POST['team'];

    $sql = "UPDATE players SET name='$name', age='$age', position='$position', team='$team' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: read.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM players WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <label>Age:</label>
    <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
    <label>Position:</label>
    <input type="text" name="position" value="<?php echo $row['position']; ?>" required>
    <label>Team:</label>
    <input type="text" name="team" value="<?php echo $row['team']; ?>" required>
    <button type="submit">Update Player</button>
</form>

(e) Delete - delete.php

Delete a player.

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "cricket_club");
$id = $_GET['id'];

$sql = "DELETE FROM players WHERE id=$id";
if ($conn->query($sql)) {
    header("Location: read.php");
} else {
    echo "Error: " . $conn->error;
}
?>

(f) Logout - loginout.php

Destroy the session.

<?php
session_start();
session_destroy();
header("Location: login.php");
?>


