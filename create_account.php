<?php
session_start();

$message = "";
if (!empty($_POST)) {
    // Le formulaire a été soumis
    $errors = [];
    $firstname = trim(strip_tags($_POST["firstname"]));
    $email = trim(strip_tags($_POST["email"]));
    $password = trim(strip_tags($_POST["password"]));
    $retypePassword = trim(strip_tags($_POST["retypePassword"]));


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "L'email n'est pas valide";
    }


    if ($password != $retypePassword) {
        $errors["retypePassword"] = "Les deux mots de passe ne correspondent pas";
    }


    $uppercase = preg_match("/[A-Z]/", $password);
    $lowercase = preg_match("/[a-z]/", $password);
    $number = preg_match("/[0-9]/", $password);

    $specialChar = preg_match("/[^a-zA-Z0-9]/", $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChar || strlen($password) < 6) {
        $errors["password"] = "Le mot de passe doit contenir 6 caractères minimum, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial";
    }

    // Si pas d'erreur
    if (empty($errors)) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = new PDO("mysql:host=localhost;dbname=urban", "root", "");
        $query = $db->prepare("INSERT INTO users (firstname, email, password) VALUES (:firstname, :email, :password)");
        $query->bindParam(":firstname", $firstname);
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);

        if ($query->execute()) {
            header("Location: index.php");
        } else {
            $message = "<p class=\"error\">Un problème est survenu lors de la création du compte, veuillez réessayer !</p>";
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

<?= $message ?>

<body class="signUp">

    <div class="signUp_form">

        <form action="" method="post">

            <h1>un visiteur, venu d'ailleurs </h1>

            <div class="signUp_input">

                <div class="form-group">
                    <label for="inputFirstname">*Prénom :</label>
                    <input type="text" name="firstname" id="inputFirstname">
                </div>
                <div class="form-group">
                    <label for="inputEmail">*Email :</label>
                    <input type="email" name="email" id="inputEmail" value="<?= isset($email) ? $email : "" ?>">
                    <?php echo isset($errors["email"]) ? "<p class=\"error\">{$errors["email"]}</p>" : "" ?>
                </div>

                <div class="form-group">
                    <label for="inputPassword">*Mot de passe :</label>
                    <input type="password" name="password" id="inputPassword" value="<?= isset($password) ? $password : "" ?>">
                    <?php echo isset($errors["password"]) ? "<p class=\"error\">{$errors["password"]}</p>" : "" ?>
                </div>
                <div class="form-group">
                    <label for="inputRetypePassword">*Confirmation du mot de passe :</label>
                    <input type="password" name="retypePassword" id="inputRetypePassword" value="<?= isset($retypePassword) ? $retypePassword : "" ?>">
                    <?php echo isset($errors["retypePassword"]) ? "<p class=\"error\">{$errors["retypePassword"]}</p>" : "" ?>
                </div>

            </div>

            <p>*Champs obligatoire</p>
            <div class="signUp_submit">
                <a href="/urban">Accueil</a>
                <input type="submit" value="Envoyer">
            </div>

        </form>
    </div>
    <script src="assets/js/three.min.js"></script>
    <script src="assets/js/postprocessing.min.js"></script>
    <script>
        let scene, camera, cloudParticles = [],
            composer;

        function init() {
            scene = new THREE.Scene();
            camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
            camera.position.z = 1;
            camera.rotation.x = 1.16;
            camera.rotation.y = -0.12;
            camera.rotation.z = 0.27;

            let ambient = new THREE.AmbientLight(0x555555);
            scene.add(ambient);

            let directionalLight = new THREE.DirectionalLight(0x703800);
            directionalLight.position.set(0, 0, 1);
            scene.add(directionalLight);


            let orangeLight = new THREE.PointLight(0xcc6600, 50, 450, 1.7);
            orangeLight.position.set(200, 300, 100);
            scene.add(orangeLight);
            let redLight = new THREE.PointLight(0xd8547e, 50, 450, 1.7);
            redLight.position.set(100, 300, 100);
            scene.add(redLight);

            renderer = new THREE.WebGLRenderer();
            renderer.setSize(window.innerWidth, window.innerHeight);
            scene.fog = new THREE.FogExp2(0x2e2424, 0.001);
            renderer.setClearColor(scene.fog.color);
            document.body.appendChild(renderer.domElement);

            let loader = new THREE.TextureLoader();
            loader.load("assets/img/smoke.png", function(texture) {
                cloudGeo = new THREE.PlaneBufferGeometry(500, 500);
                cloudMaterial = new THREE.MeshLambertMaterial({
                    map: texture,
                    transparent: true
                });
                for (let p = 0; p < 50; p++) {
                    let cloud = new THREE.Mesh(cloudGeo, cloudMaterial);
                    cloud.position.set(
                        Math.random() * 800 - 400,
                        500,
                        Math.random() * 500 - 500
                    );
                    cloud.rotation.x = 1.16;
                    cloud.rotation.y = -0.12;
                    cloud.rotation.z = Math.random() * 2 * Math.PI;
                    cloud.material.opacity = 0.55;
                    cloudParticles.push(cloud);
                    scene.add(cloud);
                }
            });
            loader.load('assets/img/stars.jpg', function(texture) {

                const textureEffect = new POSTPROCESSING.TextureEffect({
                    blendFunction: POSTPROCESSING.BlendFunction.COLOR_DODGE,
                    texture: texture
                });
                textureEffect.blendMode.opacity.value = 0.2;
                const bloomEffect = new POSTPROCESSING.BloomEffect({
                    blendFunction: POSTPROCESSING.BlendFunction.COLOR_DODGE,
                    kernelSize: POSTPROCESSING.KernelSize.SMALL,
                    useLuminanceFilter: true,
                    luminanceThreshold: 0.3,
                    luminanceSmoothing: 0.75
                });
                bloomEffect.blendMode.opacity.value = 1.5;

                const effectPass = new POSTPROCESSING.EffectPass(
                    camera,
                    bloomEffect,
                    textureEffect
                );
                effectPass.renderToScreen = true;

                composer = new POSTPROCESSING.EffectComposer(renderer);
                composer.addPass(new POSTPROCESSING.RenderPass(scene, camera));
                composer.addPass(effectPass);
                window.addEventListener("resize", onWindowResize, false);
                render();
            });
        }

        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        function render() {
            cloudParticles.forEach(p => {
                p.rotation.z -= 0.001;
            });
            composer.render(0.1);
            requestAnimationFrame(render);
        }
        init();
    </script>
</body>