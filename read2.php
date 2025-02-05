<!--View all players.-->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "cricket_club");

$sql = "SELECT * FROM trainers";
$result = $conn->query($sql);
?>

<h1>trainer List</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Tel</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['tel']; ?></td>
        
        <td>
            <a href="update2.php?id=<?php echo $row['id']; ?>">Edit</a> | 
            <a href="delete2.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>