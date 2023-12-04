<?php

try {
    $id_artist = secure_SQL_XSS($_GET['id_artist']);

    $sql_track = "SELECT DISTINCT track_name, artist_name, track.track_id
    FROM assoc_tag_artist 
    INNER JOIN artist
    ON assoc_tag_artist.artist_id = artist.artist_id
    INNER JOIN track
    ON track.artist_id = artist.artist_id
    WHERE artist.artist_id = :id_artist
    ORDER BY lower(track_name)";


    $req_track = $bdd->prepare($sql_track);
    $req_track->execute([
        ':id_artist' => $id_artist
    ]);
    $resultat_track = $req_track->fetchAll();

     foreach ($resultat_track as $row) { ?>
        
        <tr>
            <td class="div_tag"><?php echo htmlspecialchars(strip_tags($row['track_name'])); ?></td>
            <td><button type="button" value="<?php echo htmlspecialchars(strip_tags($row['track_id'])); ?>" class="btn btn-info BTN_preview">Aperçu</button></td>

            <form action="" method="POST">
                <input class="track_id" type="hidden" name="id" value="<?php echo htmlspecialchars(strip_tags($row['track_id'])); ?>">
                <td><button value="<?php echo htmlspecialchars(strip_tags($row['track_id'])); ?>" class="BTN_delete_track btn btn-success" id="bruh" type="button">Supprimer</button></td>
            </form>
        </tr>

    <?php } 

    
} catch (PDOException $e) {

    echo "Failed to load artists " . $e->getMessage();
    
}