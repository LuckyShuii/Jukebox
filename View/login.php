<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/login.css">
    <title>Connexion</title>
</head>

<body>
    <header>
        <nav aria-label="breadcrumb" style="text-align:center;font-weight:bold;">
            <ol class="breadcrumb" style="color:white;margin:0 1rem;">
                <li class="breadcrumb-item"><a href="login.php">Connexion</a></li>
            </ol>
        </nav>
    </header>
    <main>
        <section class="gros">
            <div id="emptyMail" style="color: white">Email non renseigné</div>
            <div id="emptyPassword" style="color: white">Mot de passe non renseigné</div>
            <div id="empty" style="color: white">Aucun champ renseigné</div>
            <div id="notFound" style="color: white">Les identifiants sont incorrects</div>
            <div id="sessionerror" style="color: white">La session est incorrecte ou expirée</div>

            <article id="form">
                <section class="bloc">
                    <form action="../Controller/verif_login.php" class="form" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input id="input_email" placeholder="Adresse mail" class="form-control" aria-label="Username" aria-describedby="basic-addon1" type="email" value="" name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </span>
                            </div>
                            <input value="" id="input_password" class="form-control" aria-label="Username" aria-describedby="basic-addon1" placeholder="Mot de passe" type="password" name="password" required>
                        </div>
                        <br>
                        <button type="submit" id="BTN_connexion" class="btn btn-primary">Connexion</button>
                    </form>
                </section>
            </article>
        </section>
    </main>

    <footer>

    </footer>
</body>

</html>