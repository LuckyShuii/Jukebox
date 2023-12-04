<?php
include("../Controller/inc_session.php");
// j'ai centralisé mes fonctions persos liées aux sessions
sessionInit(); // c'est une fonction perso
// session_start();
if (sessionValid() !== true) {
    sessionBye(); // c'est une fonction perso
    header("Location: login.php#sessionerror");
    exit; // sécu, exit après une redirection
}

include('../Controller/id.php');

$id_artist = htmlspecialchars(strip_tags($_GET['id']));

$sql_artist = "SELECT artist_name FROM artist WHERE artist_id = $id_artist";
$req_artist = $bdd->prepare($sql_artist);
$req_artist->execute();
$resultat_artist = $req_artist->fetch();

if (empty($resultat_artist)) {
    header('Location: admin.php#artist_not_found');
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/artist_admin.css">
    <title>Artiste ADMIN</title>
</head>

<body>

    <header>
        <nav aria-label="breadcrumb" style="text-align:center;font-weight:bold;">
            <ol class="breadcrumb" style="color:white;margin:0 1rem;">
                <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars(strip_tags($resultat_artist["artist_name"])) ?></li>
            </ol>
        </nav>

        <button class="btn btn-dark" id="BTN_reload" type="button">Recharger la page</button>

        <button class="btn btn-danger" id="BTNdeconnexion" type="button">Déconnexion</button>

    </header>

    <main>

        <section id="artist_name">

            <?php

            echo "<h2>" . secure_SQL_XSS($resultat_artist["artist_name"]) . "</h2>";

            ?>

        </section>

        <section id="global">

            <aside id="global_left">

                <div id="alert_aside">
                    <div id="alert" class="alert alert-success" role="alert">
                        Contenu
                    </div>
                </div>

                <div class="accordion" id="accordionExample">
                    <div class="card preview_card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn_preview_collapse btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Apperçu morceau
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body preview_track">


                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Ajouter un morceau
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <form class="create_form" action="" method="POST">
                                    <input id="add_track_name" value="" type="text" name="track_name" placeholder="Nom du morceau">
                                    <input value="" type="text" placeholder="URL youtube" id="add_track_url" name="track_url">
                                    <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars(strip_tags($_GET['id'])) ?>">
                                    <button id="BTN_add_track" class="btn btn-primary" type="button">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingdThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsedThree" aria-expanded="false" aria-controls="collapsedThree">
                                    Ajouter une étiquette
                                </button>
                            </h2>
                        </div>
                        <div id="collapsedThree" class="collapse" aria-labelledby="headingdThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <form class="create_form" action="" method="post">
                                    <input type="hidden" id="artist_id_attribute" name="artist_id_for_tag" value="<?php echo $id_artist ?>">
                                    <select class="btn btn-primary" name="tag_name" id="tag_name_attribute">

                                    </select>
                                    <button id="BTN_add_tag" class="btn btn-primary" type="button">Attribuer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <article id="global_right">

                <section id="right_track">

                    <table>

                        <thead>

                            <tr>

                                <th colspan="3" style="background:rgba(0,0,0,.1);text-align:center;padding:1rem">Morceaux</th>

                            </tr>

                        </thead>

                        <tbody id="body_track">

                        </tbody>

                    </table>



                </section>

                <section id="right_tag">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="3" style="background:rgba(0,0,0,.1);text-align:center;padding:1rem">Étiquettes</th>
                            </tr>
                        </thead>

                        <tbody id="body_tag">

                        </tbody>

                    </table>
                </section>

            </article>

        </section>

    </main>

    <footer>

    </footer>

    <script src="Assets/js/artist_admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>