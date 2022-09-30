<?php 
    $servername = 'localhost';
    $username = 'pgtp';
    $password = 'tp';
    
    try {
        // connection à la base de données 
        $bdd = new PDO("pgsql:host=$servername;dbname=WEBSITE", $username, $password); 
    }

    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
    }

    $reponsename = $bdd->query('SELECT distinct name from keywords');
    $reponsename->execute();
    $reponsemeri = $bdd->query('SELECT distinct nom from meridien');
    $reponsemeri->execute();
    $reponsecaract = $bdd->query('SELECT distinct "desc" from patho');
    $reponsecaract->execute();
?>

<html lang="fr">
    <head>
        <title>Website</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <form method="GET" action="patho2.php">
            <SELECT name="type">
                <?php
                while ($a = $reponsename ->fetch()){ ?>
                    <option value="<?php echo $a['name']; ?>"><?php echo $a['name']; ?></option>
                <?php } ?>
            </SELECT>
            <SELECT name="meridien">
                <?php
                while ($a = $reponsemeri ->fetch()){ ?>
                    <option value="<?php echo $a['nom']; ?>"><?php echo $a['nom']; ?></option>
                <?php } ?>
            </SELECT>
            <SELECT name="caract">
                <?php
                while ($a = $reponsecaract ->fetch()){ ?>
                    <option value="<?php echo $a['desc']; ?>"><?php echo $a['desc']; ?></option>
                <?php } ?>
            </SELECT>
            <input type="submit" />
        </form>
        <?php
        if(
            isset($_GET['type']) 
            AND !empty($_GET['type']) 
            AND isset($_GET['meridien']) 
            AND !empty($_GET['meridien'])
            AND isset($_GET['caract'])
            AND !empty($_GET['caract'])
        ) {
            $type = htmlspecialchars($_GET['type']);
            $type = htmlspecialchars($_GET['meridien']);
            $type = htmlspecialchars($_GET['caract']);
            $sql = 'SELECT pt."desc" from keywords kw,keysympt ks,
            symptome s, symptPatho sp, patho pt WHERE kw.name=\''.$type.'\' OR kw.name=\''.$caract.'\'
            AND kw.idK=ks.idK AND ks.idS=s.idS AND s."desc" like \''.$caract.'\'
            AND s.idS=sp.idS AND sp.idP=pt.idP AND code=mer AND nom=\''.$meridien.'\''; 

            $reponse = $bdd->query($sql);
    
            while ($a = $reponse ->fetch()){
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
    </body>
</html>



