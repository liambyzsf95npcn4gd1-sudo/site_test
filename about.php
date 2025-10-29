<?php include 'includes/header.php'; ?>

<main>
    <section class="hero">
        <div class="container">
            <h1>Innovating Entrance Solutions Since 1994</h1>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <?php
                $contentFile = 'data/about.txt';
                if (file_exists($contentFile)) {
                    echo nl2br(htmlspecialchars(file_get_contents($contentFile)));
                } else {
                    echo '<p>Content not available.</p>';
                }
            ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
