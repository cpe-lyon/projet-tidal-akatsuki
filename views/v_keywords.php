<html lang="fr">

<head>
    <title>Pathologie</title>
    <link rel="stylesheet" href="../assets/index.css">
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Accueil<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_patho.php">Recherche Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_patho2.php">Filtre Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_keywords.php">Recherche par mot-clef</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="c_deconnexion.php">Déconexion</a>
            </li>
        </ul>
    </div>
</nav>
</br>
<h1 class="title">Recherche de pathologie par mot-clef</h1>

<body>
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
        // if(!isset($_SESSION['email'])){
        //     header('Location: c_connexion.php');
        //     exit();
        // }
    ?>
    
    <form method="GET" action="c_keywords.php">
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
</div>

</html>