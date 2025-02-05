<!--Delete a player.-->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "cricket_club");
$id = $_GET['id'];

$sql = "DELETE FROM trainers WHERE id=$id";
if ($conn->query($sql)) {
    header("Location: read2.php");
} else {
    echo "Error: " . $conn->error;
}
?>