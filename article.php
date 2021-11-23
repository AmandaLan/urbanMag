<?php
$json = file_get_contents("articles.json");
$articles = json_decode($json, true);

$article = true;

$find = false;
$data = array("title" => "Article introuvable");
if (isset($_GET["id"])) {
    foreach ($articles as $article) {
        if ($article["id"] == $_GET["id"]) {
            $find = true;
            $data = $article;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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

    <?php
    include("navbar.php");
    ?>

    <main>
        <div class="article-detail">
            <?php
            if ($find) {
            ?>
                <div class="article-wrapper">

                    <img src="<?= $data["img"] ?>" alt="<?= $data["title"] ?>">


                    <div class="articles-titles-wrapper">
                        <div class="article-title">
                            <h1><?= $data["title"] ?></h1>
                            <h3><?= $data["subtitle"] ?></h3>
                            <p><?= $data["description"] ?></p>
                            <button>Home</button>
                        </div>
                    </div>
                </div>

                <h1>Astuce :</h1>
                <div class="subtitleArticleDetails">

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci!</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci!</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci!</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minus quas sint fugiat nostrum iste? Iure neque molestias alias adipisci!</p>

                </div>

            <?php
            }
            ?>
        </div>
    </main>
    <script src="assets/js/main.js"></script>
</body>

</html>