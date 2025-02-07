<?php
require_once 'php/model/Member.php';
require_once 'php/model/MemberList.php';
if (!isset($abs_path)) {
    require_once "path.php";
}
$pageTitle = "My Account";
include $abs_path . '/php/include/head.php';
require_once $abs_path . "/php/controller/myaccount-controller.php";
$_SESSION['currentpage'] = 'myaccount';


?>

<!DOCTYPE html>
<html lang="de">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMovies - Mein Konto</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
</head>

<body>
    <?php if ($_SESSION['loggedin'] == true) {
        include 'php/include/header_loggedin.php';
    } else {
        include 'php/include/header_loggedout.php';
    }
    ?>
    <!-- Benachrichtigungssystem -->
    <?php include 'php/include/notifications.php'; ?>
    <main>


        <article class="myaccount">

            <h1>My Account</h1>

            <div class="myaccount-container">

                <!-- Profilbild und Kontoinformationen -->
                <?php
                $userid = htmlspecialchars($_SESSION['user_id']);
                $imagePath = "bilder/profilbilder/{$userid}.jpg";
                ?>

                <div class="myaccount-info">
                    <p class="myaccount-label">Mail address:</p>
                    <p class="myaccount-data"> <?= htmlspecialchars($_SESSION['email']) ?></p>
                    <p class="myaccount-label">Registered since:</p>
                    <p class="myaccount-data"> <?= htmlspecialchars($formattedDate) ?></p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="myaccount-buttons" action="myaccount-controller.php" method="post">
                <!-- Konto bearbeiten -->
                <form action="myaccount.php" method="post">
                    <input class="button-default" type="submit" value="edit" name="edit">
                </form>

               

                <!-- Konto löschen -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['kontrolle'])) {
                    ?>
                    <p class="warning-message">
                        <span>Are you sure you want to delete your account?</span>
                    </p>
                    <form action="myaccount.php" method="post">

                        <input class="button-warning" type="submit" value="Cancel" name="abbrechen">
                        <input class="button-default delete" type="submit" value="Delete" name="löschen">
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="myaccount.php" method="post">
                        <input class="button-default delete" type="submit" value="Delete" name="kontrolle">
                    </form>
                    <?php
                }
                ?>
            </div>
        </article>
    </main>

    <?php include 'php/include/footer.php'; ?>
</body>

</html>