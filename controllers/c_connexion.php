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

<form action="connexion.php" method="POST">
  <label for="login-email">Adresse e-mail</label>
  <input type="email" id="email" name="email" />
  <br />
  <label for="login-password">Mot de passe</label>
  <input type="password" id="password" name="password" />
  <br />
  <label>
    <input type="hidden" name="remember" value="0" />
    <input type="checkbox" name="remember" value="1" />
    Se souvenir de moi
  </label>
  <br />
  <button type="submit">Se connecter</button>
</form>-

<?php
if(isset($_POST['email']) AND !empty($_POST['email']) AND isset($_POST['password']) AND !empty($_POST['password'])){

    $mail = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $mdpbdd = $bdd->prepare('SELECT pwduser FROM "user" WHERE mailuser=?');
    $mdpbdd->execute([$mail]);
    $retourmdpbdd = $mdpbdd->fetch();
    $verify = password_verify($password, $retourmdpbdd['pwduser']);
    var_dump($verify);
    if($verify){
        //$existe = $bdd->prepare('SELECT mailuser,pwduser FROM "user" WHERE mailuser LIKE ? AND pwduser LIKE ?');
        //$existe->execute(array($mail,$password));
        //$executeexiste = $existe->fetch();
        //var_dump($execute);
        
        //$mdpbdd = $bdd->prepare('SELECT pwduser FROM "user" WHERE mailuser=?');
        //$mdpbdd->execute([$mail]);
        //$retourmdpbdd = $mdpbdd->fetch();
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header('Location: keywords.php');
        exit();
            
    }
    else{
        echo 'Votre adresse mail ou votre mot de passe est incorrect';

    }
}


?>
