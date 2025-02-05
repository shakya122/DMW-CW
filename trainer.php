<?php
// Initialize $trainerToUpdate to prevent undefined variable warnings
$trainerToUpdate = null;

// Database Connection
$conn = new mysqli("localhost", "root", "", "cricket_club");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Trainer Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_trainer'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $tel = $_POST['tel'];

    $stmt = $conn->prepare("INSERT INTO trainers (name, age, tel) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $tel);
    if ($stmt->execute()) {
        echo "<script>alert('Trainer added successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Update Trainer Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_trainer'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $tel = $_POST['tel'];

    $stmt = $conn->prepare("UPDATE trainers SET name=?, age=?, tel=? WHERE id=?");
    $stmt->bind_param("sisi", $name, $age, $tel, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Trainer updated successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Delete Trainer Logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM trainers WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Trainer deleted successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch Trainer Data for Update
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM trainers WHERE id=$id");
    $trainerToUpdate = $result->fetch_assoc();
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
        <h2 class="text-center"> Manage Trainers</h2>

        <!-- Add or Update Trainer Form -->
        <div class="card mt-4">
            <div class="card-header">
                <h4><?php echo $trainerToUpdate ? "Update Trainer" : "Add New Trainer"; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <?php if ($trainerToUpdate): ?>
                        <input type="hidden" name="id" value="<?php echo $trainerToUpdate['id']; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required 
                               value="<?php echo $trainerToUpdate['name'] ?? ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" name="age" id="age" class="form-control" required 
                               value="<?php echo $trainerToUpdate['age'] ?? ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">Tel Number:</label>
                        <input type="tel" name="tel" id="tel" class="form-control" required 
                               value="<?php echo $trainerToUpdate['tel'] ?? ''; ?>">
                    </div>

                    <button type="submit" name="<?php echo $trainerToUpdate ? 'update_trainer' : 'add_trainer'; ?>" 
                            class="btn btn-<?php echo $trainerToUpdate ? 'primary' : 'success'; ?>">
                        <?php echo $trainerToUpdate ? 'Update Trainer' : 'Add Trainer'; ?>
                    </button>
                </form>
            </div>
        </div>

        <!-- Display Trainers -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Trainer List</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM trainers");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['age']}</td>
                                    <td>
                                        <a href='?edit={$row['id']}' class='btn btn-warning'>Edit</a>
                                        <a href='?delete={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No trainers found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
