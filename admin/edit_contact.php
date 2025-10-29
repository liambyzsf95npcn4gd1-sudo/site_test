<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

$contentFile = '../data/contact.txt';
$content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content'])) {
        file_put_contents($contentFile, $_POST['content']);
        $content = $_POST['content'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Contact Info</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container" style="padding-top: 50px;">
        <h2>Edit Contact Info</h2>
        <form action="edit_contact.php" method="post">
            <textarea name="content" rows="10" style="width: 100%;"><?php echo htmlspecialchars($content); ?></textarea>
            <br><br>
            <button type="submit" class="btn">Save</button>
            <a href="dashboard.php">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>
