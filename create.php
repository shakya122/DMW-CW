<!--Form to add a new player.-->
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