<?php require_once(PATH_VIEWS . 'header.php'); ?>
</br>
<h1 class="title">Recherche Pathologie</h1>
<div class="card">
    <form method="POST" action="index.php?page=patho">
        <SELECT name="pat">
            <?php
            while ($a = $reponse->fetch()) { ?>
                <option value="<?php echo $a['desc']; ?>"><?php echo $a['desc']; ?></option>
            <?php } ?>
        </SELECT>
        <input type="submit" />
    </form>
    <?php
    if ($reponseSelectPatho != "") {
        while ($a = $reponseSelectPatho->fetch()) {
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
        ?>
        <p>Aucune donnée</p>
    <?php
    }
    ?>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>