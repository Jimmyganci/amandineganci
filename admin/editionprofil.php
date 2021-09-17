<?php
session_start();

$bdd = new PDO('mysql:host=localhost; dbname=amandineganci', 'root', '');

if(isset($_SESSION['id']))
{
        $requser = $bdd->prepare("SELECT * FROM users_admin WHERE id=?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();

        if(isset($_POST['newpseudo']) and !empty($_POST['newpseudo']) and $_POST['newpseudo'] != $user['pseudo'])
        {
            $newpseudo = htmlspecialchars($_POST['newpseudo']);
            $insertpseudo = $bdd->prepare("UPDATE users_admin SET pseudo = ? WHERE id = ?");
            $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
            header('Location: admin.php?id='.$_SESSION['id']);
        }

        if(isset($_POST['newmail']) and !empty($_POST['newmail']) and $_POST['newmail'] != $user['mail'])
        {
            $newmail = htmlspecialchars($_POST['newmail']);
            $insertmail = $bdd->prepare("UPDATE users_admin SET mail = ? WHERE id = ?");
            $insertmail->execute(array($newmail, $_SESSION['id']));
            header('Location: admin.php?id='.$_SESSION['id']);
        }

        if(isset($_POST['newmdp1']) and !empty($_POST['newmdp1']) and isset($_POST['newmdp2']) and !empty($_POST['newmdp2']))
        {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);

            if($mdp1 == $mdp2)
            {
                $insertmdp = $bdd->prepare("UPDATE users_admin SET mdp = ? WHERE id = ? ");
                $insertmdp->execute(array($mdp1, $_SESSION['id']));
                header('Location: admin.php?id='.$_SESSION['id']);
            }
            else
            {
                $msg = "Vos deux mots de passe ne correspondent pas";
            }
           
        }

       if(isset($_POST['newpseudo']) and $_POST['newpseudo'] == $user['pseudo'])
       {
        header('Location: admin.php?id='.$_SESSION['id']);
       }

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <?php include('../header/header.html.php'); ?>
    <link rel="stylesheet" href="style.css">
        <title>Profil</title>
    </head>
    <body>
    <?php include('../header/header.php'); ?>
        <div class="login" align="center">
            <h2>Edition de mon profil</h2><br><br>
            <form action="" method="post">
                <label>Pseudo</label><br>
                <input type="text" name="newpseudo" placeholder="pseudo" value="<?php echo $user['pseudo'];?>"><br><br>
                <label>Mail</label><br>
                <input type="email" name="newmail" placeholder="mail" value="<?php echo $user['mail'];?>"><br><br>
                <label>Mot de passe</label><br>
                <input type="password" name="newmdp1" placeholder="mot de passe"><br><br>
                <label>Confirmation mot de passe</label><br>
                <input type="password" name="newmdp2" placeholder="confirmez mot de passe"><br><br>
                <input type="submit" value="Mettre à jour mon profil">
            </form>
            
            <?php if(isset($msg))
            {
                 echo $msg;
            }
            ?>
            
        </div>
    </body>
    </html>
<?php
}
else
{
    header ("Location: connexion.php");
}
?>