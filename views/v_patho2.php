<?php require_once(PATH_VIEWS . 'header.php'); ?>
</br>

<h1 class="title">Pathologie n°2</h1>

<div onload="afficher()">
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
    if($reponsePatho2 != ""){
        if ((empty($reponsePatho2->fetch()))) {
            echo "Aucune pathologie n'a été trouvé pour les critères définis";
        } else {
            while ($a = $reponsePatho2->fetch()) {
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
    }
    ?>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>
