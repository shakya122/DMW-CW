<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SL Cricket Club</title>
    <link rel="stylesheet" href="Admin Panel.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <h1>🏏 SL Cricket Club</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#" onclick="showPanel('dashboard')">🏠 Dashboard</a></li>
                    <li><a href="#" onclick="openPage(event, 'text.php')">👨‍🎓 Student Manage</a></li>
                    <li><a href="#" onclick="openPage(event, 'trainer.php')">🏋️ Trainer Manage</a></li>
                    <li><a href="#" onclick="showPanel('manageSchedule')">📅 Manage Schedule</a></li>
                    <li><a href="#" onclick="showPanel('settings')">⚙️ Settings</a></li>
                    <li><a href="#" onclick="logout()">🚪 Logout</a></li>
                </ul>
            </nav>
            
            <script>
                function openPage(event, page) {
                    event.preventDefault(); // Prevent default link behavior
                    window.open(page, "_blank"); // Open in a new tab
                }
            </script>
            
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header>
                <h2 id="panel-title">🏠 Dashboard</h2>
            </header>

            <!-- Dashboard -->
            <section id="dashboard" class="panel active">
                <div class="stats">
                    <div class="card">
                        <h3>Total Members</h3>
                        <p>50</p>
                    </div>
                    <div class="card">
                        <h3>Total Trainers</h3>
                        <p>5</p>
                    </div>
                    <div class="card">
                        <h3>Upcoming Matches</h3>
                        <p>3</p>
                    </div>
                    <div class="card">
                        <h3>Active Memberships</h3>
                        <p>30</p>
                    </div>
                    
                </div>
            </section>

            <!-- Manage Members -->
            <section id="manageMembers" class="panel">
                <h2>👥 Manage Members</h2>
                <p>View and update member details.</p>
            </section>

            <!-- Manage Trainers -->
            <section id="manageTrainers" class="panel">
                <h2>🏋️ Manage Trainers</h2>
                <p>Add, edit, or remove trainers.</p>
            </section>

            <!-- Manage Schedule -->
            <section id="manageSchedule" class="panel">
                <h2>📅 Manage Schedule</h2>
                <p>Update training and match schedules.</p>
            </section>

            <!-- Settings -->
            <section id="settings" class="panel">
                <h2>⚙️ Settings</h2>
                <p>Update admin settings and preferences.</p>
            </section>
        </main>
    </div>

    <script>
        function showPanel(panelId) {
            document.querySelectorAll('.panel').forEach(panel => panel.classList.remove('active'));
            document.getElementById(panelId).classList.add('active');
            document.getElementById('panel-title').innerText = document.querySelector(`[onclick="showPanel('${panelId}')"]`).innerText;
        }

        function logout() {
            alert("Logging out...");
            window.location.href = 'login.html';
        }
    </script>
</body>
</html>
