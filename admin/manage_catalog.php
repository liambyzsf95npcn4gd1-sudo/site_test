<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Catalog</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container" style="padding-top: 50px;">
        <h2>Manage Catalog</h2>
        <p>This feature is coming soon.</p>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
