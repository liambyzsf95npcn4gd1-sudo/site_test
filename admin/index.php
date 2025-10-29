<?php
// =================================================================================================
// admin/index.php
//
// Страница входа в административную панель.
// Этот скрипт отображает форму входа и обрабатывает попытку аутентификации.
// Используются сессии для отслеживания статуса входа администратора.
// =================================================================================================

// Запускаем сессию для работы с переменными сессии (например, $_SESSION['loggedin'])
session_start();

// Инициализируем переменную для хранения сообщений об ошибках
$error = '';

// Проверяем, была ли форма отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Считываем хеш пароля из файла. trim() удаляет лишние пробелы и переносы строк.
    $passwordHash = trim(file_get_contents('../private/data/password.txt'));

    // Проверяем, было ли отправлено поле 'password' и соответствует ли оно хешу
    if (isset($_POST['password']) && password_verify($_POST['password'], $passwordHash)) {
        // Если пароль верный, устанавливаем флаг 'loggedin' в сессии
        $_SESSION['loggedin'] = true;
        // Перенаправляем пользователя на главную страницу админ-панели
        header('Location: dashboard.php');
        // Прекращаем выполнение скрипта после перенаправления
        exit;
    } else {
        // Если пароль неверный, устанавливаем сообщение об ошибке
        $error = 'Invalid password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="index.php" method="post">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
