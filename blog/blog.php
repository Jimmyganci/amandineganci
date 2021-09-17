<?php 
$Projects = $bdd->query('SELECT * FROM projects');

?>

<span class="arrow-left"><img src="../assets/arrow-left.svg" alt=""></span>
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
           <span class="arrow-right">
                  <img src="../assets/arrow-right.svg" alt="">
                </span>