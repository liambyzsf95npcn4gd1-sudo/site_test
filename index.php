<?php
// =================================================================================================
// index.php
//
// Главная страница сайта (Homepage).
// Эта страница служит хабом для выбора страны и содержит основные элементы:
// - Приветственный заголовок в "hero" секции.
// - Сетка с карточками стран для навигации по региональным сайтам.
// - Контактная форма для быстрой связи.
// =================================================================================================

// Подключение общего заголовка сайта
include 'includes/header.php';
?>

<!-- Основное содержимое страницы -->
<main>
    <!-- Секция "Hero" с главным заголовком -->
    <section class="hero">
        <div class="container">
            <h1>DoorHan: 30 Years of Integrated Door and Automation Solutions</h1>
        </div>
    </section>

    <!-- Секция хаба стран -->
    <section class="country-hub">
        <div class="container">
            <h2>Choose your country or product category</h2>
            <!-- Сетка для отображения карточек стран -->
            <div class="grid">
                <!-- Пример карточки страны -->
                <div class="card">
                    <img src="images/placeholder.svg" alt="Czech Republic">
                    <h3>Czech Republic</h3>
                    <ul>
                        <li>Sectional doors</li>
                        <li>Roller shutters</li>
                        <li>Automation</li>
                    </ul>
                    <a href="#" class="btn">Go to website</a>
                </div>
                <!-- Пример второй карточки страны -->
                <div class="card">
                    <img src="images/placeholder.svg" alt="China">
                    <h3>China</h3>
                    <ul>
                        <li>Industrial doors</li>
                        <li>Docking equipment</li>
                        <li>Fire protection systems</li>
                    </ul>
                    <a href="#" class="btn">Go to website</a>
                </div>
                <!-- Комментарий-заглушка для добавления других стран -->
                <!-- Add more countries as needed -->
            </div>
        </div>
    </section>

    <!-- Секция с контактной формой -->
    <section class="contact-form">
        <div class="container">
            <h2>Still have questions? Fill out the form below…</h2>
            <!-- Форма отправляет данные на обработчик contact.php методом POST -->
            <form action="contact.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>
</main>

<?php
// Подключение общего подвала сайта
include 'includes/footer.php';
?>
