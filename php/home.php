<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html>

        <head>
            <title>Home</title>
            <link rel="stylesheet" type="text/css" href="../css/home.css">
        </head>

        <body>
            <div class="container">
                <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
                <a class="logout-button" href="logout.php">Logout</a>
            </div>

        </body>
        </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>