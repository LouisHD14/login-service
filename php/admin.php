<?php

require 'db_conn.php';
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Coding AG</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
</head>

<body>
    <div class="button-container">
        <a class="go-back" href="home.php">Go Back</a>
        <a id="downloadLink" class="download-button" href="#">Download</a>
    </div>
    <h1>Admin page</h1>
    <div class="container">
        <table>
            <tr>
                <td class="category"> User ID</td>
                <td class="category"> User name</td>
                <td class="category"> User Dates</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $UserID = $row['id'];
                $UserName = $row['user_name'];
                $UserDates = $row['dates'];
                ?>
                <tr>
                    <td class="userID">
                        <?php echo $UserID ?>
                    </td>
                    <td class="userName">
                        <?php echo $UserName ?>
                    </td>
                    <td class="userDates">
                        <?php echo $UserDates ?>
                    </td>
                    <td>
                        <a href="delete.php?Del=<?php echo $UserID ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
<script>
        document.getElementById('downloadLink').addEventListener('click', (event) => {
            // Verhindere den Standardlink-Klick, um die Seite nicht neu zu laden
            event.preventDefault();

            // Erstelle einen unsichtbaren iFrame, um die Excel-Datei herunterzuladen
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            document.body.appendChild(iframe);

            // Setze die Quelle des iFrames auf deine PHP-Datei
            iframe.src = 'download.php';
        });
    </script>

</html>