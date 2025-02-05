<!--Form to add a new trainer.-->
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
    $tel = $_POST['tel'];

    $sql = "INSERT INTO players (name, age, tel, ) VALUES ('$name', '$age', '$tel')";
    if ($conn->query($sql)) {
        echo "trainer added successfully.";
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
    <label>tel number:</label>
    <input type="tel" name="tel" required>
    <button type="submit">Add trainer</button>
</form>