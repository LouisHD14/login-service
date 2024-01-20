<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Home | Coding AG</title>
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h1>Hallo,
                <?php echo $_SESSION['user_name']; ?>
            </h1>
            <a id="anwesendLink" class="anwesend" href="#">Ich war heute den <p id="dateElement"></p> anwesend</a>
            <a class="background-button" href="../background/edit.html">edit background</a>

            <a class="logout-button" href="logout.php">Logout</a>
        </div>

    </body>
    <script>
        // Funktion, um den Wochentag zu überprüfen
        var heute = new Date();
        var datetime = heute.toLocaleDateString();
        function istMittwoch() {
            var heute = new Date();
            var wochentag = heute.getDay(); // 0 = Sonntag, 1 = Montag, ..., 6 = Samstag
            return wochentag === 3; // 3 steht für Mittwoch
        }

        // Funktion zum Aktualisieren der Klasse
        function aktualisiereKlasse() {
            var anwesendLink = document.getElementById('anwesendLink');

            if (!istMittwoch()) {
                var check_admin = 1;
                var userName = "<?php echo $_SESSION['user_name']; ?>"; // Derzeitiger Benutzername

                // Wenn es nicht Mittwoch ist, entferne die Klasse 'anwesend' und füge 'nichtMittwoch' hinzu
                document.getElementsByClassName('anwesend')[0].innerHTML = "Heute ist leider keine Coding AG";
                document.getElementsByClassName('anwesend')[0].classList.add('gesperrt');
                document.getElementsByClassName('anwesend')[0].removeAttribute('href');
                document.getElementsByClassName('anwesend')[0].classList.remove('anwesend');

                $.post("check_admin.php", { value: check_admin, user: userName }, function (response) {
                    if (response.trim() === "VALUE_EXISTS") {
                        console.log("Du bist Admin");
                        var anwesendLink = document.getElementById('anwesendLink');
                        var adminElement = '<a href="admin.php" class="anwesend admin-button">admin page</a>';
                        anwesendLink.insertAdjacentHTML('afterend', adminElement);

                    } else {
                        // Führen Sie den Code aus, den Sie ausführen möchten, wenn der Wert nicht in der Datenbank vorhanden ist
                        console.log("Du bist kein Admin");
                    }
                });

            }
            else {
                document.getElementById("dateElement").innerHTML = datetime;
                var valueToCheck = "<?php echo date('Y-m-d'); ?>";
                var check_admin = 1;
                var userName = "<?php echo $_SESSION['user_name']; ?>"; // Derzeitiger Benutzername

                $.post("check_database.php", { value: valueToCheck, user: userName }, function (response) {
                    if (response.trim() === "VALUE_EXISTS") {
                        // Führen Sie den Code aus, den Sie ausführen möchten, wenn der Wert in der Datenbank vorhanden ist
                        document.getElementsByClassName('anwesend')[0].innerHTML = "Du hast dich bereits als anwesend eingetragen";
                        document.getElementsByClassName('anwesend')[0].classList.add('gesperrt');
                        document.getElementsByClassName('anwesend')[0].removeAttribute('href');
                        document.getElementsByClassName('anwesend')[0].classList.remove('anwesend');
                    }
                });

                $.post("check_admin.php", { value: check_admin, user: userName }, function (response) {
                    if (response.trim() === "VALUE_EXISTS") {
                        console.log("Du bist Admin");
                        var anwesendLink = document.getElementById('anwesendLink');
                        var adminElement = '<a href="admin.php" class="anwesend admin-button">admin page</a>';
                        anwesendLink.insertAdjacentHTML('afterend', adminElement);

                    } else {
                        // Führen Sie den Code aus, den Sie ausführen möchten, wenn der Wert nicht in der Datenbank vorhanden ist
                        console.log("Du bist kein Admin");
                    }
                });
            }


        }

        $(document).ready(function () {
            $('#anwesendLink').click(function (e) {
                e.preventDefault(); // Verhindert, dass der Link die Seite neu lädt
                if ($(this).hasClass('gesperrt')) {
                    return;
                }
                var heute = new Date();
                var datetime = heute.toLocaleDateString();

                $.ajax({
                    url: 'anwesend.php', // Der Pfad zu Ihrem PHP-Skript
                    type: 'post',
                    data: { date: datetime }, // Sendet das aktuelle Datum an das PHP-Skript
                    success: function (response) {
                        // Sie können hier Code hinzufügen, um etwas zu tun, wenn die Anforderung erfolgreich war
                        document.getElementsByClassName('anwesend')[0].innerHTML = "Du hast dich bereits als anwesend eingetragen";
                        document.getElementsByClassName('anwesend')[0].classList.add('gesperrt');
                        document.getElementsByClassName('anwesend')[0].removeAttribute('href');
                        document.getElementsByClassName('anwesend')[0].classList.remove('anwesend');
                        console.log(response);
                    }
                });
                $.ajax({
                    url: 'sendDates.php', // Der Pfad zu Ihrem PHP-Skript
                    type: 'post',
                    data: { date: datetime }, // Sendet das aktuelle Datum an das PHP-Skript
                    success: function (response) {
                        // Sie können hier Code hinzufügen, um etwas zu tun, wenn die Anforderung erfolgreich war
                        console.log(response);
                    }
                });
            });
        });

        // Aufruf der Funktion beim Laden der Seite
        window.onload = aktualisiereKlasse;
    </script>

    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>