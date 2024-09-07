<?php
require 'db_connect.php'; // Memasukkan file koneksi database

// Query untuk mengambil data dari tabel posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Personal Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    color: #49243E;
    margin: 0;
    padding: 0;
}

header {
    background-color: #704264;
    color: white;
    padding: 15px 0;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
}

nav ul {
    display: flex;
    justify-content: center;
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin: 0 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #BB8493;
}

main {
    padding-top: 80px; /* Space for fixed header */
}

footer {
    background-color: #704264;
    color: white;
    text-align: center;
    padding: 15px 0;
    position: fixed;
    width: 100%;
    bottom: 0;
    left: 0;
}

.home-section, .login-section, .contact-section, .about-section {
    padding: 60px 20px;
    text-align: center;
}

.home-section h1, .login-section h2, .contact-section h2, .about-section h2 {
    color: #704264;
    margin-bottom: 20px;
}

.contact-form, .login-form {
    background-color: #BB8493;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
}

.contact-form label, .login-form label {
    color: white;
    font-size: 16px;
    display: block;
    margin-bottom: 10px;
}

.contact-form input, .contact-form textarea, .login-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.contact-form textarea {
    height: 150px;
    resize: vertical;
}

button {
    padding: 10px 20px;
    background-color: #704264;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.3s;
}

button:hover {
    background-color: #49243E;
    transform: scale(1.05);
}


</style>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.php">Blog</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="home-section">
            <h1>Blog Posts</h1>
            <?php
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while($row = $result->fetch_assoc()) {
                    echo '<article>';
                    echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                    echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                    echo '<small>Posted on ' . $row['created_at'] . '</small>';
                    echo '</article>';
                }
            } else {
                echo '<p>No posts found.</p>';
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Personal Blog. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close(); // Menutup koneksi database
?>
