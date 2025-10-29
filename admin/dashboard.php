<?php
// =================================================================================================
// admin/dashboard.php
//
// Главная страница административной панели.
// Этот скрипт проверяет, авторизован ли пользователь. Если нет, он перенаправляет
// на страницу входа. Также здесь реализована функция выхода из системы.
// =================================================================================================

// Запускаем сессию
session_start();

// Проверяем, установлен ли флаг 'loggedin' в сессии.
// Если флага нет или он не равен true, пользователь не авторизован.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Перенаправляем неавторизованного пользователя на страницу входа
    header('Location: index.php');
    exit;
}

// Реализация функции выхода
// Если в URL есть параметр 'logout' (например, dashboard.php?logout=true)
if (isset($_GET['logout'])) {
    // Уничтожаем все данные сессии
    session_destroy();
    // Перенаправляем пользователя на страницу входа
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
