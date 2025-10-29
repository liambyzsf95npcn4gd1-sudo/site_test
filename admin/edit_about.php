<?php
// =================================================================================================
// admin/edit_about.php
//
// Страница для редактирования содержимого страницы "О компании".
// Скрипт проверяет авторизацию, загружает текущий контент из файла,
// отображает его в форме и сохраняет изменения обратно в файл при отправке формы.
// =================================================================================================

session_start();

// Проверка авторизации пользователя
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

// Путь к файлу, в котором хранится контент
$contentFile = '../private/data/about.txt';

// Загрузка текущего содержимого файла.
// Если файл существует, читаем его. В противном случае, переменная $content будет пустой.
$content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

// Проверяем, была ли отправлена форма методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, было ли отправлено поле 'content'
    if (isset($_POST['content'])) {
        // Записываем новое содержимое в файл. file_put_contents перезаписывает файл.
        file_put_contents($contentFile, $_POST['content']);
        // Обновляем переменную $content, чтобы в форме отобразились новые данные
        $content = $_POST['content'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit About Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container" style="padding-top: 50px;">
        <h2>Edit About Page</h2>
        <form action="edit_about.php" method="post">
            <textarea name="content" rows="10" style="width: 100%;"><?php echo htmlspecialchars($content); ?></textarea>
            <br><br>
            <button type="submit" class="btn">Save</button>
            <a href="dashboard.php">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>
