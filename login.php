<?php
$message = "";
if (!empty($_POST)) {
    $email = trim(strip_tags($_POST["email"]));
    $password = trim(strip_tags($_POST["password"]));

    $db = new PDO("mysql:host=localhost;dbname=urban", "root", "");
    $query = $db->prepare("SELECT firstname, email, password FROM users WHERE email = :email");
    $query->bindParam(":email", $email);
    $query->execute();
    $result = $query->fetch();


    if (!empty($result) && password_verify($password, $result["password"])) {

        session_start();

        $_SESSION["user"] = $result["firstname"];
        $_SESSION["user_ip"] = $_SERVER["REMOTE_ADDR"];
        header("Location: index.php");
    } else {
        $message = "<p class=\"error\">Impossible de se connecter avec les informations saisies, veuillez réessayer</p>";
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

<?= $message ?>

<body class="login">

    <div class="login_form">
        <h1>Il y a bien longtemps, dans une galaxie lointaine, très lointaine...</h1>
        <div class="login_input">
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" id="inputEmail" placeholder="Email :">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="inputPassword" placeholder="Mot de passe :">
                </div>
                <div class="login_submit">
                    <a class="backHome" href="/urban">Accueil</a>
                    <input type="submit" value="Se connecter">
                </div>
            </form>

            <a href="reset_password.php">Vous avez oublié votre mot de passe ?</a>

            <div class="create">
                <p>Vous ne possédez toujours pas de compte ?</p>
                <a href="create_account.php">Création d'un compte</a>
            </div>
        </div>
    </div>
    <script src="assets/js/three.min.js"></script>
    <script>
        let scene, camera, renderer;

        function init() {
            //create scene object
            scene = new THREE.Scene();

            //setup camera with facing upward
            camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
            camera.position.z = 1;
            camera.rotation.x = Math.PI / 2;

            //setup renderer
            renderer = new THREE.WebGLRenderer();
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.body.appendChild(renderer.domElement);

            starGeo = new THREE.Geometry();
            for (let i = 0; i < 6000; i++) {
                let star = new THREE.Vector3(
                    Math.random() * 600 - 300,
                    Math.random() * 600 - 300,
                    Math.random() * 600 - 300
                );
                star.velocity = 0;
                star.acceleration = 0.001;
                starGeo.vertices.push(star);
            }
            let sprite = new THREE.TextureLoader().load('assets/img/star.png');
            let starMaterial = new THREE.PointsMaterial({
                color: 0xaaaaaa,
                size: 0.7,
                map: sprite
            });
            stars = new THREE.Points(starGeo, starMaterial);
            scene.add(stars);
            animate();
        }
        //rendering loop
        function animate() {
            starGeo.vertices.forEach(p => {
                p.velocity += p.acceleration
                p.y -= p.velocity;

                if (p.y < -200) {
                    p.y = 200;
                    p.velocity = 0;
                }
            });
            starGeo.verticesNeedUpdate = true;
            stars.rotation.y += 0.002;
            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        }
        init();
    </script>
</body>