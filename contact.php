<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // In a real application, you would send an email here.
    // For this example, we'll just display a thank you message.

    $response = "<h2>Thank you, $name!</h2>";
    $response .= "<p>Your message has been received. We'll get back to you at $email as soon as possible.</p>";
    $response .= "<p><strong>Your message:</strong><br>" . nl2br($message) . "</p>";
    $response .= "<a href='index.php'>Back to Home</a>";

    echo $response;
    exit;
}
?>
