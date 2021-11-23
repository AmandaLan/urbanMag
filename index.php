<?php
$json = file_get_contents("articles.json");
$articles = json_decode($json, true);
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <title>Urban Mag</title>
</head>

<body>
    <header>
        <div class="headerBg">
            <img src="assets/img/urban-bg.jpg" alt="">
            <div class="headerTitle">
            <div class="text-top">
                <span>Urban Mag.</span>
            </div>
            <div class="text-middle">
                <span>Votre nouveau</span>
            </div>
            <div class="text-bottom">
                <span>lieu de rendez-vous</span>
            </div>
        </div>
        </div>

        <?php 
        include("navbar.php");
        ?>

        

    </header>

    <main>

        <div class="container">
            <div class="titleArticle" id="article">
                <h2>Bienvenue dans le monde de l'urbain !</h2>
            </div>
            <div class="subtitleArticle">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci, minima perspiciatis aliquam accusamus unde temporibus voluptatibus necessitatibus aspernatur quia! Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci, minima perspiciatis aliquam accusamus unde temporibus voluptatibus necessitatibus aspernatur quia!</p>
            </div>


            <div class="articles">

                <?php
                foreach ($articles as $article) {
                ?>

                    <div class="article">
                        <a href="article.php?id=<?= $article["id"] ?>">
                        <img src="<?= $article["img"] ?>" alt="<?= $article["title"] ?>">
                        </a>

                        <div class="articles-titles-wrapper">
                            <div class="article-titles">
                                <span><?= $article["title"] ?></span>
                            </div>

                            <span><?= $article["subtitle"] ?></span>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>

        <div class="about" id="about">
            <div class="logo-about">
                <i class="icon-paper-plane"></i>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci, minima perspiciatis aliquam accusamus unde temporibus voluptatibus necessitatibus aspernatur quia! </p>
            </div>

            <hr>

            <div class="about-top">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente ipsa deleniti unde explicabo temporibus ad laboriosam natus quas blanditiis cupiditate.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
            </div>
            <div class="about-bottom">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente ipsa deleniti unde explicabo temporibus ad laboriosam natus quas blanditiis cupiditate.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>

        </div>

        <div class="middleBg">
            <h1>Entrez dans les profondeurs</h1>
        </div>

    </main>

    <footer id="contact">

        <div class="icon">
            <a href="#">
                <i class="icon icon-facebook-circled"></i>
            </a>
            <a href="#">
                <i class="icon icon-twitter-circled"></i>
            </a>
            <a href="#">
                <i class="icon icon-snapchat"></i>
            </a>
            <a href="#"><i class="icon icon-instagram"></i>
            </a>

        </div>

        <p class="copyright">Company Name © 2018</p>

        <div class="links">
            <div class="list1">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Development</a></li>
                    <li><a href="#">Hosting</a></li>
                </ul>
            </div>
            <hr>
            <div class="list2">
                <h3>About</h3>
                <ul>
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Legacy</a></li>
                </ul>
            </div>
            <hr>
            <div class="list3">
                <h3>Careers</h3>
                <ul>
                    <li><a href="#">Job openings</a></li>
                    <li><a href="#">Employee success</a></li>
                    <li><a href="#">Benefits</a></li>
                </ul>
            </div>


    </footer>

    <script src="assets/js/main.js"></script>

</body>

</html>