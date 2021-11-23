<!DOCTYPE html>
<html lang="en">

<head>
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
    <main>

        <div class="map_contact">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14841.804668834759!2d2.345101629423289!3d48.88327777640767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e4334868de3%3A0xcfc3870abe2b8519!2zU2FjcsOpLUPFk3Vy!5e0!3m2!1sfr!2sfr!4v1616749846184!5m2!1sfr!2sfr" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            <form action="">
                <h1>Contactez-nous !</h1>
                <div class="form">
                    <div class="name">
                        <div>
                            <label for="name">Nom : </label>
                            <input type="text" id="name" name="user_name">
                        </div>
                        <div>
                            <label for="firstname">Prénom : </label>
                            <input type="text" id="name" name="user_firstname">
                        </div>
                    </div>
                    <div class="mail">
                        <div>
                            <label for="name">E-mail : </label>
                            <input type="text" id="name" name="user_mail"/>
                        </div>
                        <div>
                            <label for="msg">Message : </label>
                            <textarea id="msg" name="user_message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="btn">
                    
                    <a class="backHome" href="/urban">Accueil</a>
                    <button class="contact_submit">Envoyez</button>
                    
                </div>
            </form>
        </div>
    </main>

</body>

</html>