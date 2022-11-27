<?php $head = "patho";
require_once(PATH_VIEWS . 'header.php'); ?>
</br>
<h1 class="title">Recherche Pathologie</h1>
<div class="card">
    <form method="POST" action="index.php?page=recherchePathologie">
        <div class="row">
            <div class="col-4">
                <?php
                if ($requete != "") {
                    while ($a = $requete->fetch()) { ?>
                        <div class="list-group" id="list-tab" role="tablist">
                            <input name="pat" id="pat" type="submit" class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" role="tab" aria-controls="home" value="<?php echo $a['desc']; ?>">
                        </div>
                <?php }
                }

                ?>


                <?php for ($i = 1; $i <= $page_total; $i++) {
                    echo '<a href="index.php?page=patho&pagination=' . $i . ' "> ' . $i . ' </a>';
                }

                ?>
            </div>
        </div>
    </form>
    <?php

    if (count($rows) > 0) {
        foreach ($rows as $a) {
    ?>

            <ul>
                <li>
                    <?php
                    echo $a['descp'];
                    ?>
                </li>
            </ul>
    <?php
        }
    } else {
        echo "aucun symptôme n'a été trouvé par la pathologie sélectionner";
    }


    ?>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>