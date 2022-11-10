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

    $reponse = $bdd->prepare('SELECT * FROM patho');
    $reponse->execute();

    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: connexion.php');
        exit();
    }
?>

<html lang="fr">
    <head>
        <title>Website</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
    <a href="deconnexion.php">Déconexion</a>
        <h2>recherche de pathologie par mot-clef</h2>
        
        <form method="GET" action="keywords.php">
            <input type="search" name="q" placeholder="Recherche..." />      
            <input type="submit" value="Valider"/>
        </form>

        <?php

    if(isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = htmlspecialchars($_GET['q']);
        $elem_page = 10;
        $existe = $bdd->prepare('SELECT distinct kw.name FROM keywords kw WHERE kw.name LIKE ?');
        $existe->execute([$q]); 
        $executeexiste = $existe->fetch();
        if($executeexiste){
            $requete_elem_total = $bdd->query('SELECT distinct pt.desc FROM patho pt,symptpatho sp,symptome sy,keySympt ks,keywords kw WHERE kw.name LIKE \'%'.$q.'%\' AND kw.idK=ks.idK AND ks.idS=sy.idS AND sy.idS=sp.idS AND sp.idP=pt.idP');
            $elem_total = $requete_elem_total->rowCOUNT();


            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0)
            {
                $_GET['page'] = intval ($_GET['page']);
                $pageCourante = $_GET['page'];
            }

            else
            {
                $pageCourante = 1;
            }
        
            $depart = ($pageCourante-1) * $elem_page;
            $page_total = ceil ($elem_total/ $elem_page);
            $requete = $bdd->query('SELECT distinct pt.desc FROM patho pt,symptpatho sp,symptome sy,keySympt ks,keywords kw WHERE kw.name LIKE \'%'.$q.'%\' AND kw.idK=ks.idK AND ks.idS=sy.idS AND sy.idS=sp.idS AND sp.idP=pt.idP ORDER BY pt.desc OFFSET '.$depart.' LIMIT '.$elem_page.'');
            
            

            while ($a = $requete ->fetch()){     
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
        else{
            echo 'Aucun résultat pour le mot clef saisis';
        }
    }else{
        echo 'Veuillez entrez un mot clef';
    }
        
         
 ?>

		
			<?php for ($i=1; $i<=$page_total; $i++)
		
				{
				echo '<a href="?page='.$i.'&q='.$q.' "> '.$i.' </a>';
		
				}
			?>

			
    </body>
</html>
