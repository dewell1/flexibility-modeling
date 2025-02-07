<?php
session_start();
require_once 'php/model/Member.php';
require_once 'php/model/MemberList.php';
if (!isset($abs_path)) {
    require_once "path.php";
}

$_SESSION['currentpage'] = 'login';

function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Überprüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF-Token-Überprüfung
    if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
        
        $_SESSION['errormessage'] = "Your session has expired. Please reload the page and try again.";
        header("Location: login.php");
        exit();
    }

    // Benutzerdefinierte Überprüfung der E-Mail und des Passworts

    // Daten aus dem Formular erhalten
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwort = isset($_POST['passwort']) ? $_POST['passwort'] : '';

    // E-Mail-Adresse validieren
    if (empty($email)) {
        $_SESSION['errormessage'] = "Please enter an email address.";
        header("Location: login.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errormessage'] = "The entered email address is invalid. Please enter a valid email address.";
        header("Location: login.php");
        exit();
    }

    // Passwort validieren
    if (empty($passwort)) {
        $_SESSION['errormessage'] = "Please enter a password.";
        header("Location: login.php");
        exit();
    }

    try {
        // Kontaktierung des Models (Geschäftslogik)
        $memberlist = MemberList::getInstance();
        $members = $memberlist->getMembers();

        foreach ($members as $member) {
            if ($member->getEmail() === $email && $member->verifyPassword($passwort)) {
                // Anmeldung erfolgreich, leite zur Mein Konto-Seite weiter
                $_SESSION['loggedin'] = true; // Setze Session als angemeldet
                $_SESSION['username'] = $member->getUsername();
                $_SESSION['email'] = $member->getEmail();
                $_SESSION['user_id'] = $member->getId();
                $_SESSION['date'] = $member->getDate();
                $_SESSION['successmessage'] = "You logged in succesfully.";

                // Lösche die temporäre E-Mail aus der Session
                unset($_SESSION['email_input']);

                header("Location: myaccount.php");
                exit();
            }
        }

        // Wenn keine Übereinstimmung gefunden wurde
        $_SESSION['errormessage'] = "The entered email address or password is incorrect.";
        header("Location: login.php");
        exit();

    } catch (MissingEntryException $exc) {
        $_SESSION["errormessage"] = "An error due to a missing entry has occurred.";
        header("Location: login.php");
        exit();
    } catch (InternalErrorException $exc) {
        $_SESSION["errormessage"] = "An internal error has occurred.";
        header("Location: login.php");
        exit();
    }
}
?>