<?php
include("../Controller/inc_session.php");
sessionInit();

if (sessionValid() !== true) {
    sessionBye();
    header("Location: login.php#sessionerror");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Assets/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <header>

        <nav aria-label="breadcrumb" style="text-align:center;font-weight:bold;">
            <ol class="breadcrumb" style="color:white;margin:0 1rem;">
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
        </nav>

        <button class="btn btn-dark" id="BTN_reload" type="button">Recharger la page</button>

        <button class="btn btn-danger" id="BTNdeconnexion" type="button">Déconnexion</button>

    </header>

    <main>

        <div id="loading" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>

        <p id="loading_error"></p>

        <section id="global">
            <article class="formGlobal">
                <aside id="alert_aside">
                    <div id="alert" class="alert alert-success" role="alert">

                    </div>

                </aside>
                <aside id="accordion_aside">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Créer un artiste
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="create_form" action="" method="post">
                                        <input type="text" placeholder="Nom d'artiste" name="artist_name" id="artist_name" class="create_input" required>
                                        <input type="text" placeholder="Nom du morceau" class="create_input" id="track_name" name="track_name" required>
                                        <input type="text" name="url_ytb" placeholder="URL youtube" id="track_url" class="create_input">
                                        <select class="create_input btn btn-primary" id="create_select" name="tag_name">

                                        </select>
                                        <button class="create_input btn btn-primary" type="button" id="BTN_artist_admin_create">Créer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Créer une étiquette
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="create_form" action="" method="post">
                                        <input value="" id="tag_name" type="text" placeholder="Nom étiquette" name="tag_name" class="create_input" required>
                                        <button id="BTN_tag_admin_create" name="tag_admin_create" class="create_input btn btn-primary" type="button">Créer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Supprimer une étiquette
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="create_form" action="" method="post">
                                        <select class="create_input btn btn-primary" id="delete_select" name="tag_name">

                                        </select>
                                        <button id="BTN_tag_admin_delete" class="create_input btn btn-primary" type="button">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Éditer une étiquette
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="create_form" action="" method="post">
                                        <select class="create_input btn btn-primary" id="update_select" name="tag_name">

                                        </select>
                                        <input type="text" placeholder="Nouveau nom" id="update_input" name="tag_update_name" class="create_input" required>
                                        <button id="BTN_tag_admin_update" class="create_input btn btn-primary" type="button">Éditer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </article>
            <article id="artist">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="background:rgba(0,0,0,.1);text-align:center;padding:1rem">Artistes</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_artist">

                    </tbody>
                </table>
            </article>
        </section>
    </main>
    <footer>

    </footer>
    <script src="Assets/js/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>