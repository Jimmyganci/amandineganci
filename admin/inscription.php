<?php

$bdd = new PDO('mysql:host=localhost; dbname=amandineganci', 'root', '');

$req = $bdd->query("SELECT COUNT(*) from users_admin where id" );

$donnees = $req->fetch();
$req->closeCursor();

if ($donnees[0]<1){







if(isset($_POST['forminscription']))
{
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
    if(!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2']))
    {
        

        $pseudolengh = strlen($pseudo);
        if($pseudolengh <= 255)
        {

            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                { 
                    $reqmail = $bdd->prepare("SELECT * FROM users_admin WHERE mail=? ");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist ==0)
                    { 
                            if($mdp == $mdp2)
                            {
                                $insertmbr = $bdd->prepare("INSERT INTO users_admin(pseudo, mail ,mdp)
                                values(?,?,?)");
                                $insertmbr -> execute(array($pseudo, $mail, $mdp));
                                header('Location: connexion.php');

                            }
                            else
                            {
                                $erreur = "Vos mots de passes ne correspondent pas!";
                            }
                    }   
                    else
                    {
                        $erreur = "adresse mail déjà utilisé";
                    }     
                }
                else 
                {
                    $erreur = "Votre adresse mail ,'est pas valide";
                }

            }
            else 
            {
                $erreur = "Vos adresses mail ne correspondent pas!";
            }
        }
        else {
            $erreur = "Max 255 charactères";
        }
    }
    else {
        $erreur = "Tous les champs doivent être remplis";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('../header/header.html.php'); ?>
    <title>Inscription admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('../header/header.php'); ?>
<main>
    <div class="login" align="center">
    <h2>Inscription</h2><br><br>
    <form action="" method="post">
    <table>
    <tr>
      <td>
         <label for="pseudo">Pseudo:</label>
         </td>
         <td>
         <input type="text" placeholder="entrez votre pseudo" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
         </td>
    </tr>
    <tr>
       <td>
          <label for="mail">Mail:</label>
          </td>
          <td>
          <input type="email" placeholder="entrez votre mail" name="mail" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
          </td>
    </tr>
    <tr>
       <td>
          <label for="mail2">Confirmation du Mail:</label>
          </td>
          <td>
          <input type="email" placeholder="confirmez votre mail" name="mail2" id="mail2"  value="<?php if(isset($mail2)) { echo $mail2; } ?>">
          </td>
    </tr>
    <tr>
       <td>
          <label for="mdp">Mot de passe:</label>
          </td>
          <td>
          <input type="password" placeholder="entrez votre mot de passe" name="mdp" id="mdp">
          </td>
    </tr>
    <tr>
       <td>
          <label for="mdp2">Confirmez mot de passe:</label>
          </td>
          <td>
          <input type="password" placeholder="confirmez votre mot de passe" name="mdp2" id="mdp2">
          </td>
    </tr>

    </table>
    <input type="submit" value="C'est parti!!" name="forminscription">
    </form>
    <?php

    if(isset($erreur))
    {
        echo $erreur;
    }

    ?>
    <?php 
    }
    else {
    header('Location: connexion.php');
    }
 ?>
    </div>
    </main>
</body>
</html>
