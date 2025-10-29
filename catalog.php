<?php
// =================================================================================================
// catalog.php
//
// Страница "Каталог".
// На этой странице представлен обзор категорий продукции в виде сетки.
// Каждая категория отображается как карточка с изображением, названием и кратким описанием.
// В данный момент контент является статичным (placeholder).
// =================================================================================================

// Подключение общего заголовка сайта
include 'includes/header.php';
?>

<!-- Основное содержимое страницы -->
<main>
    <!-- Секция "Hero" с заголовком каталога -->
    <section class="hero">
        <div class="container">
            <h1>Our Product Catalog</h1>
        </div>
    </section>

    <!-- Секция с каталогом продукции -->
    <section class="catalog">
        <div class="container">
            <!-- Сетка для отображения карточек категорий -->
            <div class="grid">
                <?php
                    // Путь к JSON-файлу с данными каталога
                    $catalogFile = 'private/data/catalog.json';
                    if (file_exists($catalogFile)) {
                        // Читаем содержимое файла
                        $catalogData = json_decode(file_get_contents($catalogFile), true);
                        // Проверяем, что данные корректно декодированы и являются массивом
                        if (is_array($catalogData)) {
                            // Проходим по каждому элементу каталога и выводим его в виде карточки
                            foreach ($catalogData as $item) {
                                echo '<div class="card">';
                                echo '<img src="' . htmlspecialchars($item['image']) . '" alt="' . htmlspecialchars($item['title']) . '">';
                                echo '<h3>' . htmlspecialchars($item['title']) . '</h3>';
                                echo '<p>' . htmlspecialchars($item['description']) . '</p>';
                                echo '<a href="#" class="btn">Learn More</a>';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo '<p>Catalog data is not available.</p>';
                    }
                ?>
            </div>
        </div>
    </section>
</main>

<?php
// Подключение общего подвала сайта
include 'includes/footer.php';
?>
