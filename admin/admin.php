<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=amandineganci', 'root', '');
require("../configs/commandes.php");
$req = $bdd->query("SELECT COUNT(*) from users_admin where id" );
$admin = $req->fetch();
$req->closeCursor();

$reqProjects = $bdd->prepare("SELECT * FROM projects");
$reqProjects->execute();
$Projects = $reqProjects->fetchAll(PDO::FETCH_OBJ);


if(isset($_SESSION['id']) && $admin[0]>0)
{ 
        $requser = $bdd->prepare("SELECT * FROM users_admin WHERE id=?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
    
        
?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <?php include('../header/header.html.php'); ?>
            <link rel="stylesheet" href="style.css">
            <title>Profil</title>
        </head>
        <body>
        <?php include('../header/header.php'); ?>
        <main>
            <article class="article1">
            <div class="login" align="center">
                <h2>Profil de <?php echo $user['pseudo'];?>
                </h2><br>
                
                <?php
                if(isset($_SESSION['id']) and $user['id'] and $_SESSION['id'])
                { 
                ?>
                <br>
                <div class="profil">
                <a href="editionprofil.php">Editer mon profil</a><br>
                <a href="deconnexion.php">Se déconnecter</a>
                </div>
                <?php
                } 
            
                ?>
            </div>
            </article>
            <article class="article2" >
                <div class="login" align="center" id="login-realisation">
                    <h2>Réalisations</h2><br>
                        <form method="post" id="cont-addProject" enctype="multipart/form-data" >
                            <table>
                                <tr>
                                    <td>
                                        <label for="image-project" class="form-label">Image</label>
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" name="image-project">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                        <button class ="addButtonPhoto">Ajouter plusieurs photos</button>
                                    </td>
                                        
                                </tr>
                                <tr>
                                    <td>   
                                        <label for="name-image" class="form-label">Description de l'image</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="name-image">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="title-project" class="form-label">Titre du projet</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="title-project">
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                        <label for="desc-project" class="form-label">Description du projet</label>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" name="desc-project"></textarea>
                                    </td>   
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cate-project" class="form-label">Catégorie</label>
                                    </td>
                                    <td>
                                        <select  class="form-control" name="cate-project">
                                            <option value="">Selectionner votre catégorie</option>
                                            <option value="pro">Pro</option>
                                            <option value="part">Part</option>
                                            <option value="even">Even</option>
                                        </select>
                                    </td>   
                                </tr>
                                </table>

                                        <input type="submit" name="submit" value="Ajouter le projet">
                        </form>
                        <section id="cont-delete">
                            <article class="gridDelete">
                                <?php foreach($Projects as $project): 
                                    ?>  
                                <div class="deleteProj">
                                    
                                    <img src="<?= $project->image; ?>" alt="<?= $project->desc_image;?>">
                                    <h6><?= $project->title_project; ?></h6>
                                    <p><?= $project->id ?></p>
                                    
                                </div>
                                <?php endforeach; ?>
                                
                            </article>
                            <div class="delButton">
                                        <form method="post">
                                        <label for="idproject" class="form-label">N° du projet</label>
                                        <input type="number" class="form-control" name="idproject">
                                        <button name="delete" type="submit">Supprimer</button>
                                        </form>
                                    </div>
                        </section>
                        <div class="addDelete">
                            <button id="addButton" class="active">Ajouter</button>
                            <button id="delButton">Supprimer</button>
                        </div>
                        </div>
                        <div class="login" align="center" id="avis">
                        <h2>Avis Client</h2><br>
                        <form method="post">
                            <table>
                                <tr>
                                    <td>
                                        <label for="text-avis" class="form-label">Avis</label>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" name="text-avis" id="text-avis"></textarea>
                                    </td>   
                                </tr>
                                <tr>
                                <td>   
                                        <label for="name-client" class="form-label">Nom du client</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="name-client">
                                    </td>  
                                </tr>
                                
                                </table>

                                        <input type="submit" name="submit-avis" value="Ajouter l'avis">
                        </form>
                    </div>
                    
                            
            </article>
        </main>
        <script src="../header/header.js"></script>
        <script src="../script.js"></script>
        </body>
        </html>
<?php
} else if ($admin[0]<1)
{
    header('Location: inscription.php');
}
else if ( !isset($_SESSION['id']))
{
    header('Location: connexion.php');
}

if(isset($_POST['submit']))
 {
     if(isset($_FILES['image-project']) AND isset($_POST['name-image']) AND isset($_POST['title-project']) AND isset($_POST['desc-project']) AND isset($_POST['cate-project']))
     {
         if(!empty($_FILES['image-project']) AND !empty($_POST['name-image']) AND !empty($_POST['title-project']) AND !empty($_POST['desc-project']) AND !empty($_POST['cate-project']))
         {
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
            { 
                $url = "https"; 
            }else 
            { 
                    $url = "http"; 
                    
                // Ajoutez // à l'URL.
                $url .= "://"; 
                    
                // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
                $url .= $_SERVER['HTTP_HOST']; 
                    
                // Ajouter l'emplacement de la ressource demandée à l'URL
                $url .= '/'.'assets'.'/';
                $url .= $_POST['cate-project'] . '/';
                
            
                $fichier = basename($_FILES['image-project']['name']);
                $fichierUrl = $url .= basename($_FILES['image-project']['name']);
                $descimage = htmlspecialchars(strip_tags($_POST['name-image']));
                $titleproject = htmlspecialchars(strip_tags($_POST['title-project']));
                $descproject = htmlspecialchars(strip_tags($_POST['desc-project']));
                $category = htmlspecialchars(strip_tags($_POST['cate-project']));
                
                
                $dossier = '../assets';
                
                $taille_maxi = 200000;
                $taille = filesize($_FILES['image-project']['tmp_name']);
                $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.JPEG', '.PNG', '.GIF');
                $extension = strrchr($_FILES['image-project']['name'], '.');
                
                
                try {
                    
                            //Début des vérifications de sécurité...
                            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                            {
                                $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
                            }
                            if($taille>$taille_maxi)
                            {
                                $erreur = 'Le fichier est trop gros...';
                            }
                            if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                            {
                                //On formate le nom du fichier ici...
                                $fichier = strtr($fichier, 
                                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                                if(move_uploaded_file($_FILES['image-project']['tmp_name'], $dossier . "/".$category."/" . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                                {
                                    addProj($fichierUrl, $descimage, $titleproject, $descproject, $category); 
                                    echo 'Upload effectué avec succès !';
                                }
                                else //Sinon (la fonction renvoie FALSE).
                                {
                                    echo 'Echec de l\'upload !';
                                }
                            }
                            else
                            {
                                echo $erreur;
                            }
                }
                catch(Exception $e) {
                    $e->getMessage();
                }
              } 
           } 
       }
    } 

  if(isset($_POST['submit-avis']))
  {
    if(isset($_POST['text-avis']) and isset($_POST['name-client']))
    {
        if(!empty($_POST['text-avis']) and !empty($_POST['name-client']))
        {
            $textAvis = htmlspecialchars(strip_tags($_POST['text-avis']));
            $nameClient = htmlspecialchars(strip_tags($_POST['name-client']));

            try 
            {
                addAvis($textAvis, $nameClient);
                echo "avis ajouté";
            }
            catch (Exception $e) 
            {
                $e ->getMessage();
            }
        }
    }
  }


if(isset($_POST['delete']))
{
    if(isset($_POST['idproject']))
    {
        if(!empty($_POST['idproject']) AND is_numeric($_POST['idproject']))
        {
           
            $idproduct = htmlspecialchars(strip_tags($_POST['idproject']));

            try 
            {
                deleteProj($idproduct);

            } catch(Exception $e) 

            {
                $e->getMessage();
            }
        }
    }
}


?>