<?php require_once(PATH_VIEWS . 'header.php'); ?>
</br>
<h1 class="title">Recherche de pathologie par mot-clef</h1>
<div class="card">



    <form method="POST" action="index.php?page=keywords">
        <input type="search" name="q" placeholder="Recherche..." />
        <button type="submit">Valider</button>
    </form>

    <?php

    if (isset($q) and !empty($q)) {
        if ($elem_total > 0) {

            foreach ($lignes as $a) {


    ?>
                <ul>
                    <li>
                        <?php
                        echo $a['desc'];
                        ?>
                    </li>
                </ul>
    <?php
            }
        } else {
            echo 'Aucun résultat pour le mot clé saisi';
        }
    } else {
        echo 'Veuillez saisir un mot clé';
    }


    ?>


    <?php
    if (isset($page_total)) {


        for ($i = 1; $i <= $page_total; $i++) {
            echo '<a href="index.php?page=keywords&pagination=' . $i . '&q=' . $q . ' "> ' . $i . ' </a>';
        }
    }
    ?>

</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>