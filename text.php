<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "cricket_club");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Player Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_player'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $team = $_POST['team'];

    $sql = "INSERT INTO players (name, age, position, team) VALUES ('$name', $age, '$position', '$team')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Player added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update Player Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_player'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $team = $_POST['team'];

    $sql = "UPDATE players SET name='$name', age=$age, position='$position', team='$team' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Player updated successfully!');</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Player Logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM players WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Player deleted successfully!');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch Player Data for Update
$playerToUpdate = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM players WHERE id=$id");
    $playerToUpdate = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cricket Club Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"> Manage members</h2>

        <!-- Add or Update Player Form -->
        <div class="card mt-4">
            <div class="card-header">
                <h4><?php echo $playerToUpdate ? "Update Player" : "Add New Player"; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <?php if ($playerToUpdate): ?>
                        <input type="hidden" name="id" value="<?php echo $playerToUpdate['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required 
                               value="<?php echo $playerToUpdate['name'] ?? ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" name="age" id="age" class="form-control" required 
                               value="<?php echo $playerToUpdate['age'] ?? ''; ?>">
                               <div class="mb-3">

                    <label for="position" class="form-label">Position:</label>
                            <select name="position" id="position" class="form-control" required value="<?php echo $playerToUpdate['position'] ?? ''; ?>
                            <option value="">Select Position</option>
                            <option value="Batsman" <?= (isset($playerToUpdate['position']) && $playerToUpdate['position'] == 'Batsman') ? 'selected' : ''; ?>>Batsman</option>
                            <option value="Bowler" <?= (isset($playerToUpdate['position']) && $playerToUpdate['position'] == 'Bowler') ? 'selected' : ''; ?>>Bowler</option>
                            <option value="All-rounder" <?= (isset($playerToUpdate['position']) && $playerToUpdate['position'] == 'All-rounder') ? 'selected' : ''; ?>>All-rounder</option>
                            <option value="Wicketkeeper" <?= (isset($playerToUpdate['position']) && $playerToUpdate['position'] == 'Wicketkeeper') ? 'selected' : ''; ?>>Wicketkeeper</option>
                            
                        </select>
                    </div>

                    <div class="mb-3">
    <label for="team" class="form-label">Team:</label>
    <select name="team" id="team" class="form-control" required="<?php echo $playerToUpdate['team'] ?? ''; ?>
        <option value="">Select Team</option>
        <option value="Team A" <?= (isset($playerToUpdate['team']) && $playerToUpdate['team'] == 'Team A') ? 'selected' : ''; ?>>Team A</option>
        <option value="Team B" <?= (isset($playerToUpdate['team']) && $playerToUpdate['team'] == 'Team B') ? 'selected' : ''; ?>>Team B</option>
        <option value="Team C" <?= (isset($playerToUpdate['team']) && $playerToUpdate['team'] == 'Team C') ? 'selected' : ''; ?>>Team C</option>
        <option value="Team D" <?= (isset($playerToUpdate['team']) && $playerToUpdate['team'] == 'Team D') ? 'selected' : ''; ?>>Team D</option>
    </select>
</div>

                    <button type="submit" name="<?php echo $playerToUpdate ? 'update_player' : 'add_player'; ?>" 
                            class="btn btn-<?php echo $playerToUpdate ? 'primary' : 'success'; ?>">
                        <?php echo $playerToUpdate ? 'Update Player' : 'Add Player'; ?>
                    </button>
                </form>
            </div>
        </div>

        <!-- Display Players -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Player List</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Position</th>
                            <th>Team</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM players");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['age']}</td>
                                    <td>{$row['position']}</td>
                                    <td>{$row['team']}</td>
                                    <td>
                                        <a href='?edit={$row['id']}' class='btn btn-warning'>Edit</a>
                                        <a href='?delete={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No players found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>