<?php
require_once 'db_conn.php';

// Werte, die überprüft werden sollen
$adminCheck = $_POST['value'];
$userName = $_POST['user'];

// Bereiten Sie die SQL-Anweisung vor
$stmt = $conn->prepare("SELECT * FROM users WHERE admin = ? AND user_name = ?") or die($conn->error);
$stmt->bind_param("ss", $adminCheck, $userName) or die($stmt->error);

// Führen Sie die Anweisung aus
$stmt->execute() or die($stmt->error);

// Erhalten Sie das Ergebnis
$result = $stmt->get_result() or die($stmt->error);

if ($result->num_rows > 0) {
    // Der Wert existiert in der Datenbank für den derzeitigen Benutzer
    echo "VALUE_EXISTS";
} else {
    // Der Wert existiert nicht in der Datenbank für den derzeitigen Benutzer
    echo "VALUE_DOES_NOT_EXIST";
}

$conn->close();
?>