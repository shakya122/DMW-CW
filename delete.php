<!--Delete a player.-->
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