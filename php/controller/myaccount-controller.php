<?php
session_start();
if (!isset($abs_path)) {
    require_once "../../path.php";
}

require_once $abs_path . "/php/model/Member.php";
require_once $abs_path . "/php/model/MemberList.php";
$memberdb = MemberList::getInstance();

$_SESSION['currentpage'] = 'meinkonto';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    // Wenn nicht angemeldet, zur Login-Seite weiterleiten
    $_SESSION['errormessage'] = "Please log in to access the My Account page.";
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['date'])) {
    // Das Datum aus der Session in ein DateTime-Objekt umwandeln
    $date = new DateTime($_SESSION['date']);

    // Das Datum in das gewünschte Format bringen
    $formattedDate = $date->format('d. F Y');

    // Monat auf Deutsch umstellen
    $germanMonths = [
        'January' => 'Januar',
        'February' => 'Februar',
        'March' => 'März',
        'April' => 'April',
        'May' => 'Mai',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'August',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Dezember'
    ];

    $formattedDate = str_replace(array_keys($germanMonths), array_values($germanMonths), $formattedDate);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['abmelden'])) {
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['date']);
    unset($_SESSION['user_id']);
    unset($_SESSION['date']);
    unset($_SESSION['member_username']);
    $_SESSION['loggedin'] = false;

    $_SESSION['successmessage'] = "You succesfully logged out";
    header("Location: index.php");
    exit(); // Beende die Ausführung des aktuellen Skripts, um sicherzustellen, dass die Weiterleitung funktioniert
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['bearbeiten'])) {
    header("Location: konto-bearbeiten.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['löschen'])) {
    $memberdb->deleteMember($_SESSION['user_id']);
    $_SESSION['successmessage'] = "You succesfully deleted your account.";
    header("Location: index.php"); // Weiterleitung zur Startseite
    exit(); // Beende die Ausführung des aktuellen Skripts, um sicherzustellen, dass die Weiterleitung funktioniert
}

$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];