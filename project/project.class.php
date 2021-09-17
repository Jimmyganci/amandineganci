<?php 
$bdd = new PDO('mysql:host=localhost; dbname=amandineganci', 'root', '');
require("configs/db.class.php");
$bdd = new DB();
$Projects = $bdd->query("(SELECT * FROM projects where category='part' LIMIT 1) 
UNION 
(SELECT * FROM projects where category='pro' LIMIT 1)
UNION
(SELECT * FROM projects where category='even' LIMIT 1)");

?>
           <div class="cont-project" id="cont-project">
               <?php foreach($Projects as $project): ?>
              <div class="project">
                <a href="#">
                <img src="<?= $project->image; ?>" alt="<?= $project->desc_image; ?>">
                <button class="title"><h2><?= $project->title_project; ?></h2>
                <p><?= $project->desc_project; ?></p>
              </button>
                </a>   
               </div>
              <?php endforeach; ?>
              
             
           </div>