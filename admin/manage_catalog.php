<?php
// =================================================================================================
// admin/manage_catalog.php
//
// Страница для управления каталогом продукции.
// Скрипт читает данные из JSON-файла, позволяет редактировать существующие записи
// и добавлять новые. Также есть возможность загружать изображения для категорий.
// =================================================================================================

session_start();

// Проверка авторизации пользователя
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

// Путь к файлу каталога
$catalogFile = '../private/data/catalog.json';
// Директория для загрузки изображений
$uploadDir = '../images/';

// Загрузка данных каталога
$catalogData = file_exists($catalogFile) ? json_decode(file_get_contents($catalogFile), true) : [];

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обновление существующих записей
    if (isset($_POST['items'])) {
        foreach ($_POST['items'] as $index => $item) {
            if (isset($catalogData[$index])) {
                $catalogData[$index]['title'] = htmlspecialchars($item['title']);
                $catalogData[$index]['description'] = htmlspecialchars($item['description']);

                // Обработка загрузки нового изображения
                if (isset($_FILES['items']['name'][$index]['image']) && $_FILES['items']['error'][$index]['image'] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['items']['name'][$index]['image']);
                    $targetPath = $uploadDir . $fileName;
                    if (move_uploaded_file($_FILES['items']['tmp_name'][$index]['image'], $targetPath)) {
                        $catalogData[$index]['image'] = 'images/' . $fileName;
                    }
                }
            }
        }
    }

    // Добавление новой записи
    if (isset($_POST['new_item']) && !empty($_POST['new_item']['title'])) {
        $newItem = [
            'title' => htmlspecialchars($_POST['new_item']['title']),
            'description' => htmlspecialchars($_POST['new_item']['description']),
            'image' => 'images/placeholder.svg' // Изображение по умолчанию
        ];
        // Обработка изображения для новой записи
        if (isset($_FILES['new_item']['name']['image']) && $_FILES['new_item']['error']['image'] === UPLOAD_ERR_OK) {
            $fileName = basename($_FILES['new_item']['name']['image']);
            $targetPath = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['new_item']['tmp_name']['image'], $targetPath)) {
                $newItem['image'] = 'images/' . $fileName;
            }
        }
        $catalogData[] = $newItem;
    }

    // Сохранение данных обратно в JSON-файл
    file_put_contents($catalogFile, json_encode($catalogData, JSON_PRETTY_PRINT));
    // Перезагружаем страницу, чтобы увидеть изменения
    header('Location: manage_catalog.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Catalog</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .catalog-item { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .catalog-item input, .catalog-item textarea { width: 100%; margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="container" style="padding-top: 50px;">
        <h2>Manage Catalog</h2>
        <a href="dashboard.php">Back to Dashboard</a>

        <form action="manage_catalog.php" method="post" enctype="multipart/form-data">
            <h3>Edit Existing Items</h3>
            <?php foreach ($catalogData as $index => $item): ?>
                <div class="catalog-item">
                    <input type="text" name="items[<?php echo $index; ?>][title]" value="<?php echo htmlspecialchars($item['title']); ?>" required>
                    <textarea name="items[<?php echo $index; ?>][description]" rows="3" required><?php echo htmlspecialchars($item['description']); ?></textarea>
                    <p>Current image: <?php echo htmlspecialchars($item['image']); ?></p>
                    <input type="file" name="items[<?php echo $index; ?>][image]">
                </div>
            <?php endforeach; ?>

            <hr>

            <h3>Add New Item</h3>
            <div class="catalog-item">
                <input type="text" name="new_item[title]" placeholder="Title">
                <textarea name="new_item[description]" rows="3" placeholder="Description"></textarea>
                <input type="file" name="new_item[image]">
            </div>

            <br>
            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>
</body>
</html>
