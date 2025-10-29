<?php include 'includes/header.php'; ?>

<main>
    <section class="hero">
        <div class="container">
            <h1>DoorHan: 30 Years of Integrated Door and Automation Solutions</h1>
        </div>
    </section>

    <section class="country-hub">
        <div class="container">
            <h2>Choose your country or product category</h2>
            <div class="grid">
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
                <!-- Add more countries as needed -->
            </div>
        </div>
    </section>

    <section class="contact-form">
        <div class="container">
            <h2>Still have questions? Fill out the form below…</h2>
            <form action="contact.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
