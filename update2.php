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
    $tel = $_POST['tel'];

    $sql = "UPDATE trainers SET name='$name', age='$age', tel='$tel' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: read.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM trainers WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <label>Age:</label>
    <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
    <label>Tel no:</label>
    <input type="tel" name="tel" value="<?php echo $row['tel']; ?>" required>
    <button type="submit">Update trainer</button>
</form>