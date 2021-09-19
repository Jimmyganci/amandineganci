<!DOCTYPE html>
<html lang="en">
<head>
<?php include('header/header.html.php');   
 include('configs/header.class.php'); ?>   
<?php 
$Projects = $bdd->query('SELECT * FROM projects');
$CategoryPart = $bdd->query("SELECT * FROM projects where category = 'part' ORDER BY id DESC LIMIT 6");
$CategoryPro = $bdd->query("SELECT * FROM projects where category = 'pro' ORDER BY id DESC LIMIT 6");
$CategoryEvent = $bdd->query("SELECT * FROM projects where category = 'even' ORDER BY id DESC LIMIT 6");

?>
    <title> Amandine Ganci | Réalisations | Architecte d'intérieur - Décorateur | Landes - Pays Basque - Isère</title>
    <link href="/project/project.css" rel="stylesheet" type="text/css" />
    <link href="/project/realisations.css" rel="stylesheet" type="text/css" />
    <meta
            name="description"
            content="D&eacute;couvrez toutes les r&eacute;alisation d'Amandine Ganci, designer d'int&eacute;rieure dans les landes, à Capbreton. Professionnel, particulier, evenementiels."
          />
          <meta
            property="og:image"
            content="https://www.amandineganci.com/assets/logo.png"
          />
          <meta
            property="og:title"
            content="Amandine Ganci Designer d'int&eacute;rieur"
          />
          <meta
            property="og:description"
            content="Votre architecte et d&eacute;coratrice d'int&eacute;rieur situ&eacute;e sur la commune de Capbreton dans les Landes."
          />
          <meta property="og:url" content="https://www.amandineganci.com" />
</head>
<body> 
<?php include('header/header.php'); ?>
<main>
<div class="hero-header-portefolio" id="hero-header-portefolio">
    <div class="title-portefolio">
    <h1>PORTEFOLIO</h1>
    <h4>by Amandine Ganci</h4>
    <p>Designer Interior</p>
    </div>
    
</div>
<article class="portefolio" id="portefolio1">
<div class="text-portefolio" id="text-portefolio">
        <h2>Nos projets particuliers</h2>
        <p>Incidunt et soluta repudiandae quidem vel itaque exercitationem, non ipsum. Fuga doloremque, repellendus beatae culpa fugiat eaque!</p>
        <button id="button-transl-portefolio"><p>Découvrir</P></button>
    </div>
    <div class="cont-pf1">
    <div class="carre-nude"></div>
<?php foreach($CategoryPart as $project): ?>
    
              <div class="project">
                  <a href="#">
                    <img src="<?= $project->image; ?>" alt="<?= $project->desc_image;?>">
                    <button class="title"><h2><?= $project->title_project; ?></h2>
                      <p><?= $project->desc_project; ?></p>
                    </button>
                  </a>   
               </div>
              <?php endforeach; ?>
      </div>
</article>
<article class="portefolio" id="portefolio2">
<div class="cont-pf1" id="cont-pf1-left">
<div class="carre-nude" id="carre-nude-left"></div>
<?php foreach($CategoryPro as $project): ?>
    
              <div class="project">
                <a href="#">
                <img src="<?= $project->image; ?>" alt="<?= $project->desc_image;?>">
                <button class="title"><h2><?= $project->title_project; ?></h2>
                <p><?= $project->desc_project; ?></p>
              </button>
                </a>   
               </div>
              <?php endforeach; ?>
              </div>
<div class="text-portefolio" id="text-portefolio2">
        <h2>Nos projets professionels</h2>
        <p>Incidunt et soluta repudiandae quidem vel itaque exercitationem, non ipsum. Fuga doloremque, repellendus beatae culpa fugiat eaque!</p>
        <button id="button-transl-portefolio"><p>Découvrir</P></button>
    </div>
    
</article>
<article class="portefolio" id="portefolio3">

<div class="text-portefolio" id="text-portefolio3">
        <h2>Nos projets évènementiels</h2>
        <p>Incidunt et soluta repudiandae quidem vel itaque exercitationem, non ipsum. Fuga doloremque, repellendus beatae culpa fugiat eaque!</p>
        <button id="button-transl-portefolio"><p>Découvrir</P></button>
    </div>
    <div class="cont-pf1">
    <div class="carre-nude"></div>
<?php foreach($CategoryEvent as $project): ?>
    
              <div class="project" >
                <a href="#">
                <img src="<?= $project->image; ?>" alt="<?= $project->desc_image;?>">
                <button class="title"><h2><?= $project->title_project; ?></h2>
                <p><?= $project->desc_project; ?></p>
              </button>
                </a>   
               </div>
              <?php endforeach; ?>
              </div>
</article>
</main>
<footer>
  <?php include("footer/footer.php"); ?>
</footer>
<script src="header/header.js"></script>
<script src="/script.js"></script>

</body>
</html>