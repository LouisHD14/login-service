<?php
require_once 'db_conn.php';

// Werte, die überprüft werden sollen
$valueToCheck = $_POST['value'];
$userName = $_POST['user'];

// Bereiten Sie die SQL-Anweisung vor
$stmt = $conn->prepare("SELECT * FROM users WHERE date = ? AND user_name = ?");
$stmt->bind_param("ss", $valueToCheck, $userName);

// Führen Sie die Anweisung aus
$stmt->execute();

// Erhalten Sie das Ergebnis
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Der Wert existiert in der Datenbank für den derzeitigen Benutzer
    echo "VALUE_EXISTS";
} else {
    // Der Wert existiert nicht in der Datenbank für den derzeitigen Benutzer
    echo "VALUE_DOES_NOT_EXIST";
}

$conn->close();
?>