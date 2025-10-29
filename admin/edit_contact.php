<?php
// =================================================================================================
// admin/edit_contact.php
//
// Страница для редактирования контактной информации.
// Логика работы аналогична 'edit_about.php'. Скрипт управляет текстовым контентом,
// который отображается в подвале сайта.
// =================================================================================================

session_start();

// Проверка авторизации пользователя
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

// Путь к файлу с контактными данными
$contentFile = '../private/data/contact.txt';

// Загрузка текущего содержимого файла
$content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content'])) {
        // Сохранение нового содержимого в файл
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
