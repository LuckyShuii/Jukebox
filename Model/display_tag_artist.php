<?php

try {

    $artist_id = secure_SQL_XSS($_GET['id_artist']);

    $sql_tag = "SELECT DISTINCT tag.tag_name, tag.tag_id
                FROM assoc_tag_artist 
                INNER JOIN tag
                ON assoc_tag_artist.tag_id = tag.tag_id
                INNER JOIN artist
                ON assoc_tag_artist.artist_id = artist.artist_id
                WHERE artist.artist_id = :artist_id
                ORDER BY lower(tag_name)";

    $req_tag = $bdd->prepare($sql_tag);
    $req_tag->execute([
        ':artist_id' => $artist_id
    ]);
    $resultat_tag = $req_tag->fetchAll();

    foreach ($resultat_tag as $row) { ?>
        <tr>
            <td class="div_tag"><?php echo htmlspecialchars(strip_tags($row['tag_name'])); ?></td>
            <form action="" method="POST">
                <input class="tag_id" type="hidden" name="id" value="<?php echo htmlspecialchars(strip_tags($row['tag_id'])); ?>">
                <td><button value="<?php echo htmlspecialchars(strip_tags($row['tag_id'])); ?>" class="BTN_delete btn btn-success" type="button">Supprimer</button></td>
            </form>
        </tr>
    <?php } 
    
} catch (PDOException $e) {

    echo "Failed to load artists " . $e->getMessage();
    
}