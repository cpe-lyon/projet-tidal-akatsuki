<script src="script.js"> </script>
<link rel="stylesheet" href="path.css" />
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

    $reponsename = $bdd->prepare('SELECT distinct "type" from patho');
    $reponsename->execute();
    $reponsemeri = $bdd->prepare('SELECT distinct nom from meridien');
    $reponsemeri->execute();
?>

<html lang="fr">
    <head>
        <title>Website</title>
        <link rel="stylesheet" href="../Vues/path.css">
    </head>

    <body onload="afficher()">
    
            
        <form method="GET" action="patho2.php">
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
                    while ($a = $reponsemeri ->fetch()){ ?>
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
        if(isset($_GET['input'])AND !empty($_GET['input']))
        {
            $input = htmlspecialchars($_GET['input']);
            if($input=="affichertype"){
                
                if((isset($_GET['type'])AND !empty($_GET['type'])) AND (isset($_GET['caract'])AND !empty($_GET['caract']))){
                    $type = htmlspecialchars($_GET['type']);
                    $caract = htmlspecialchars($_GET['caract']);
                    if($caract=="choisir"){

                        if($type=='m'){
                            $sql='SELECT pt."desc" FROM patho pt where "type" LIKE \'m%\' AND "type" NOT LIKE \'mv%\'';
                        }else{
                            $sql='SELECT pt."desc" FROM patho pt WHERE "type" LIKE \''.$type.'%\'';
                        }
                        
                    }else{ 
                        
                        $sql='SELECT pt."desc" FROM patho pt where "type" like CONCAT(\'%\',\''.$type.'\',LEFT(\''.$caract.'\',1),\'%\')';
                        
                    }  
                
                }
            }else if($input=="affichermeridien"){

                if(isset($_GET['meridien'])AND !empty($_GET['meridien'])){

                    $meridien = htmlspecialchars($_GET['meridien']);
                    $sql='SELECT pt."desc" FROM patho pt,meridien md WHERE pt.mer=md.code AND md.nom=\''.$meridien.'\'';
                    
                }
                
            }else{
                if(isset($_GET['caract'])AND !empty($_GET['caract'])){

                    $caract = htmlspecialchars($_GET['caract']);
                    $sql='SELECT pt."desc" FROM patho pt WHERE pt.desc LIKE \'%'.$caract.'%\'';
                    
                }

            }
            
            $reponse = $bdd->query($sql);
            if((empty($reponse ->fetch()))){
                echo "Aucune pathologie n'a été trouvé pour les critères définis";
            }else{
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
        }

 ?>
