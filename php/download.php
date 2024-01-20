<?php
// Verbindung zur Datenbank herstellen (nutzt die db_conn.php-Datei)
include_once('db_conn.php');

// Überprüfen Sie die Verbindung
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-Abfrage, um Benutzernamen und Datumsangaben abzurufen (Filter für gültige Datumsangaben)
$sql = "SELECT user_name, dates FROM users WHERE dates != '0000-00-00'";
$result = $conn->query($sql);

// Array zum Speichern der Daten erstellen
$dataArray = array();

// Daten aus der MySQL-Abfrage verarbeiten
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $user_name = $row["user_name"];
        $dates = explode(",", $row["dates"]);
        
        // Eindeutige Datumsangaben pro Benutzer erstellen
        foreach ($dates as $date) {
            $date = trim($date);
            if (!empty($date) && $date != '0000-00-00') {
                $dataArray[$date][$user_name] = $user_name;
            }
        }
    }
}

// HTTP-Header setzen, um den Download der Datei auszulösen
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="output.csv"');

// CSV-Daten im gewünschten Format ausgeben
foreach ($dataArray as $date => $userNames) {
    echo $date . ";" . implode(";", array_keys($userNames)) . "\n";
}

// Das Skript beenden, um zu verhindern, dass zusätzlicher Text ausgegeben wird
exit();
?>
