
<div id="accroche">Decouvrez les meilleurs restaurants avec resto.fr</div>

<h1>Top 4 des meilleurs restaurants</h1>

<?php
for ($i = 0; $i < count($listeRestos); $i++) {
    ?>


    <?php
    $lesTypesCuisine = getTypesCuisineByIdR($listeRestos[$i]['idR']);
    $lesPhotos = getPhotosByIdR($listeRestos[$i]['idR']);
    ?>

    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" alt="photo du restaurant" />
            <?php } ?>

        </div>
        <div class="descrCard"><?php echo "<a href='./?action=detail&idR=" . $listeRestos[$i]['idR'] . "'>" . $listeRestos[$i]['nomR'] . "</a>"; ?>
            <br />
            <?= $listeRestos[$i]["numAdrR"] ?>
            <?= $listeRestos[$i]["voieAdrR"] ?>
            <br />
            <?= $listeRestos[$i]["cpR"] ?>
            <?= $listeRestos[$i]["villeR"] ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">		
                <?php for ($j = 0; $j < count($lesTypesCuisine); $j++) { ?>
                    <li class="tag"><span class="tag">#</span><?= $lesTypesCuisine[$j]["libelleTC"] ?></li>
                    <?php } ?>
            </ul>


        </div>

    </div>





    <?php
}
?>

Classement basé sur les critiques de nos utilisateurs.

