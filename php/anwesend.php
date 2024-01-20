<?php
session_start();

if (isset($_POST['date']) && isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    $date = $_POST['date'];
    $dateObj = DateTime::createFromFormat('d.m.Y', $date);
    $formattedDate = $dateObj->format('Y-m-d');

    $userId = $_SESSION['id'];
    $userName = $_SESSION['user_name'];

    // Einbinden der db_conn.php-Datei
    require 'db_conn.php';

    // Datum für den Benutzer in der Datenbank aktualisieren
    $stmt = $conn->prepare("UPDATE users SET date = ? WHERE id = ? AND user_name = ?") or die("Error: " . $stmt->error);
    $stmt->bind_param("sis", $formattedDate, $userId, $userName) or die("Error: " . $stmt->error);
    $stmt->execute() or die("Error: " . $stmt->error);


    if ($stmt->affected_rows > 0) {
        echo "Datum erfolgreich aktualisiert";
    }

    $stmt->close();
    $conn->close();
}
?>