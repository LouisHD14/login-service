<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataUrl = $_POST['dataUrl'];

    // Konvertiere das Daten-URL in ein binäres Bild
    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataUrl));

    // Speichere das Bild auf dem Server
    $fileName = '../img/img.jpg';
    file_put_contents($fileName, $imageData);

    // Gib den Dateinamen zurück (optional, je nach Bedarf)
    echo $fileName;
} else {
    // Wenn keine POST-Anfrage, gebe einen Fehler zurück
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
}
?>
