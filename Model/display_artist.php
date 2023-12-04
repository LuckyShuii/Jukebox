<?php

try {

    $sql_artist = "SELECT artist_id, artist_name FROM `artist` ORDER BY lower(artist_name)";
    $req = $bdd->prepare($sql_artist);
    $req->execute();
    $resultat = $req->fetchAll();

    foreach ($resultat as $row) { ?>
    
        <tr>
            <td class="div_artist"><a href="../View/artist_admin.php?id=<?php echo htmlspecialchars(strip_tags($row['artist_id'])); ?>"><?php echo htmlspecialchars(strip_tags($row['artist_name'])); ?></a></td>
            <form action="delete.php" method="POST">
                <input class="artist_id" type="hidden" name="id" value="<?php echo htmlspecialchars(strip_tags($row['artist_id'])); ?>">
                <td><button value="<?php echo htmlspecialchars(strip_tags($row['artist_id'])); ?>" class="btn_delete btn btn-success" id="bruh" type="button">Supprimer</button></td>
            </form>
        </tr>

    <?php } 
    
} catch (PDOException $e) {

    echo "Failed to load artists " . $e->getMessage();
    
}