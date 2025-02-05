<!--Edit player details.-->
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