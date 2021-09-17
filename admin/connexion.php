<?php
session_start();

$bdd = new PDO('mysql:host=localhost; dbname=amandineganci', 'root', '');
if(!empty($_SESSION['id'])){
    header("Location: admin.php?id=".$_SESSION['id']);
} else {



if(isset($_POST['formconnexion']))
{
    $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($pseudoconnect) and !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM users_admin WHERE pseudo = ? and mdp = ?");
        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist==1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: admin.php?id=".$_SESSION['id']);
        }
        else
        {
            $erreur = "Mauvais mail ou mauvais mdp";
        }

    }
    else
    {
        $erreur = "Tout les champs doivent être complétés!";
    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('../header/header.html.php'); ?>
<link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
<?php include('../header/header.php'); ?>
    <div class="login" align="center">
        <h2>Connexion</h2><br><br>
        <form action="" method="post">

        <input type="text" name="pseudoconnect" placeholder="Pseudo">
        <input type="password" name="mdpconnect" placeholder="Mot de Passe">
        <input type="submit" name="formconnexion" value="Se connecter">

        </form>
        <?php

        if(isset($erreur))
        {
            echo $erreur;
        }
    }
?>
    </div>
</body>
</html>
