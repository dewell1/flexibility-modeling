<!-- Header, der angezeigt wird, wenn man angemeldet ist -->

<header>
    <nav>
        <div class="nav-links">
            <img class="logo" src="images/flex.png" alt="Flex Logo" width="50" height="50">
            <a class="<?= (isset($_SESSION['currentpage']) && $_SESSION['currentpage'] == 'recommender') ? 'glow' : '' ?>"
                href="index.php">Recommender</a>
            <a class="<?= (isset($_SESSION['currentpage']) && $_SESSION['currentpage'] == 'models') ? 'glow' : '' ?>"
                href="models.php">Models</a>
            <a class="<?= (isset($_SESSION['currentpage']) && $_SESSION['currentpage'] == 'help') ? 'glow' : '' ?>"
                href="help.php">Help</a>
        </div>
        <div class="login-register">
            <a class="<?= (isset($_SESSION['currentpage']) && $_SESSION['currentpage'] == 'stats') ? 'glow' : '' ?>"
                href="stats.php">Statistics</a>
            <a class="<?= (isset($_SESSION['currentpage']) && $_SESSION['currentpage'] == 'myaccount') ? 'glow' : '' ?>"
                href="myaccount.php">My Account</a>
            <form action="myaccount.php" method="post">
                <input id="logout-button" class="button-warning" type="submit" value="logout" name="logout">
            </form>
        </div>
    </nav>
</header>