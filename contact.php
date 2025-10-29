<?php
// =================================================================================================
// contact.php
//
// Обработчик контактной формы.
// Этот скрипт принимает данные, отправленные методом POST из формы на главной странице.
// Он выполняет базовую обработку данных и выводит сообщение об успешной отправке.
//
// Важно: В текущей реализации отправка email не производится.
// Это сделано для упрощения, так как для отправки почты требуется настройка почтового сервера.
// =================================================================================================

// Проверяем, был ли запрос отправлен методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем и экранируем данные из формы для предотвращения XSS-атак
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Комментарий для разработчика: здесь должна быть логика отправки email.
    // Например, с использованием функции mail() или сторонней библиотеки типа PHPMailer.
    // In a real application, you would send an email here.
    // For this example, we'll just display a thank you message.

    // Формируем HTML-ответ для пользователя
    $response = "<h2>Thank you, $name!</h2>";
    $response .= "<p>Your message has been received. We'll get back to you at $email as soon as possible.</p>";
    $response .= "<p><strong>Your message:</strong><br>" . nl2br($message) . "</p>";
    $response .= "<a href='index.php'>Back to Home</a>";

    // Выводим ответ на страницу
    echo $response;
    // Завершаем выполнение скрипта, чтобы не отображалось ничего лишнего
    exit;
}
?>
