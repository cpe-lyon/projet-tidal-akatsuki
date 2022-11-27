<?php $head = "patho2";
require_once(PATH_VIEWS . 'header.php'); ?>
<h1 class="title">Filtre Pathologie</h1>
<div class="card">
    <form method="POST" action="index.php?page=patho2">
        <SELECT name="input" id="input">
            <option value="" selected>Choisir un critère</option>
            <option value="affichertype">type</option>
            <option value="affichermeridien">meridien</option>
            <option value="affichercaract">caract</option>
        </SELECT>



        <SELECT name="type" id="type">
            <option value="choisir" selected>choisir le type de pathologie</option>
            <option value="m">méridien</option>
            <option value="tf">organe/viscère</option>
            <option value="l">luo</option>
            <option value="mv">merveilleux vaisseaux</option>
            <option value="j">jing jin</option>
        </SELECT>

        <SELECT name="meridien" id="meridien">
            <option value="choisir" selected>choisir le meridien</option>
            <?php
            while ($a = $reponsemeri->fetch()) { ?>
                <option value="<?php echo $a['nom']; ?>"><?php echo $a['nom']; ?></option>
            <?php } ?>
        </SELECT>

        <SELECT name="caract" id="caract">
            <option value="choisir">choisir une caractéristique</option>
            <option value="plein">plein</option>
            <option value="chaud">chaud</option>
            <option value="vide">vide</option>
            <option value="froid">froid</option>
            <option value="interne">interne</option>
            <option value="externe">externe</option>
        </SELECT>

        <input type="submit" />

    </form>


    <?php


    if (count($rows) == 0) {
        echo "Aucune pathologie n'a été trouvé pour les critères définis";
    } else {

        foreach ($rows as $a) {
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
    }
    ?>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>