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

    $reponse = $bdd->query('SELECT * FROM patho');
    $reponse->execute();
?>

<html lang="fr">
    <head>
        <title>Website</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <form method="GET" action="patho.php">
            <SELECT name="pat">
                <?php
                while ($a = $reponse ->fetch()){ ?>
                    <option value="<?php echo $a['desc']; ?>"><?php echo $a['desc']; ?></option>
                <?php } ?>
            </SELECT>
            <input type="submit" />
        </form>
        <?php
        if(isset($_GET['pat']) AND !empty($_GET['pat'])) {
            $pat = htmlspecialchars($_GET['pat']);
    
            $sql = 'SELECT symptome."desc" as descp FROM symptome,patho,symptPatho WHERE patho."desc"=\''.$pat.'\'and patho.idP=symptPatho.idP and symptPatho.idS=symptome.idS';
            
            
            $reponse = $bdd->query($sql);
    
            while ($a = $reponse ->fetch()){      
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
         }
         
 ?>
    </body>
</html>
