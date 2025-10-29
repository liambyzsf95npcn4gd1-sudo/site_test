<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .dashboard-container a {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>
        <p>Welcome, Admin!</p>
        <ul>
            <li><a href="edit_about.php">Edit About Page</a></li>
            <li><a href="edit_contact.php">Edit Contact Info</a></li>
            <li><a href="manage_catalog.php">Manage Catalog</a></li>
        </ul>
        <a href="dashboard.php?logout=true">Logout</a>
    </div>
</body>
</html>
