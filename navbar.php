<section class="navbar">
    <div class="logo">
        <i class="icon-paper-plane <?= $article ? "white" : "" ?>"></i>
        <a class="<?= $article ? "white" : "" ?>" href="/urban">Urban Mag.</a>
    </div>
    <div class="connection">
        <a class="<?= $article ? "white" : "" ?>" href="#article">Articles</a>
        <a class="<?= $article ? "white" : "" ?>" href="#about">A propos</a>
        <a class="<?= $article ? "white" : "" ?>" href="/urban/contact.php">Contact</a>
        <?php
        if (isset($_SESSION["user"])) {
        ?>
            <a class="<?= $article ? "white" : "" ?>" href="my_account.php">Mon compte</a>
            <a class="<?= $article ? "white" : "" ?>" href="logout.php">Se déconnecter</a>
        <?php
        } else {
        ?>
            <a class="<?= $article ? "white" : "" ?>" href="create_account.php" class="btn btn-secondary">S'abonner</a>
            <a class="<?= $article ? "white" : "" ?>" href="login.php" class="btn btn-primary">Se connecter</a>
        <?php
        }
        ?>
    </div>
</section>