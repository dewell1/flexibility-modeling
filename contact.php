<?php
require_once 'php/controller/help-controller.php';

$pageTitle = "Contact";
include $abs_path . '/php/include/head.php';
$_SESSION['currentpage'] = 'contact';
?>

<!DOCTYPE html>
<html>

<body>
    <?php
    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] == true) {
            include 'php/include/header_loggedin.php';
        } else {
            include 'php/include/header_loggedout.php';
        }
    } else {
        $_SESSION['loggedin'] = false;
        include 'php/include/header_loggedout.php';
    } ?>
    <!-- Notification system -->
    <?php include 'php/include/notifications.php'; ?>

    <main>
        <article class="standard-article">

            <div class="content-box">
                <h1>Contact</h1>
                <p>If you have any <a target=_blank href="feedback.php">feedback</a>, ideas, or questions, we welcome you to contact us via mail.</p>

                <ul>
                    <li><strong>Dennis Weller</strong> <a href="mailto:dennis.weller@offis.de">dennis.weller at offis.de</a></li>
                    <li><strong>Emilie Frost</strong> <a href="mailto:emilie.frost@offis.de">emilie.frost at offis.de</a>
                    </li>
                </ul>

            </div>
        </article>
    </main>
    <script src="js/script.js"></script>

</body>
<?php include $abs_path . '/php/include/footer.php'; ?>

</html>