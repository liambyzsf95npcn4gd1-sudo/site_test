    <footer>
        <div class="container">
            <div>
                <p>&copy; 2025 DoorHan. All rights reserved.</p>
                <?php
                    $contactFile = 'data/contact.txt';
                    if (file_exists($contactFile)) {
                        echo nl2br(htmlspecialchars(file_get_contents($contactFile)));
                    }
                ?>
            </div>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>