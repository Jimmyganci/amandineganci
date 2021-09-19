<?php 
$Avis = $bdd->query('SELECT * FROM avis_table');
?>

<article class="article5">
           <div class="block" id="block6">
                   <h2>Avis client</h2>
                 </div>
                 <div class="intro-avis">
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus aliquam tempore doloribus! Et, nisi minus quod voluptatibus consequatur autem iure tempore amet, velit ut a officia modi aspernatur porro perspiciatis eos saepe.</p>
                 </div>
</article>
<div class="cont-avis">
<span class="arrow-left"><img src="../assets/arrow-left.svg" alt=""></span>

    <div id="cont-avis">
    <?php foreach($Avis as $avis): ?>
        <div class="avis">
        <p><?= $avis->avis; ?></p>
        <p id="nameAvis"><?= $avis->name; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
   
    <span class="arrow-right">
                  <img src="../assets/arrow-right.svg" alt="">
                </span>
</div>
<div class="cont-footer">
    <nav class="footer">
        <ul class="cont-logo">
            <li class="logo-footer">
                <img src="assets/logo.png" alt="logo_agence" class="mini-logo">
            </li>
            <li class="social">
                <div><a href="https://www.facebook.com/agancinterior"><img src="assets/iconfb.png" target="_blank" rel="noopener" alt="logo_facebook"></a></div>
                <div><a href="https://www.instagram.com/agancinteriordesign/"><img src="assets/iconinsta.png" target="_blank" rel="noopener" alt="logo_instagram"></a></div>
                <div><a href="https://www.pinterest.fr/agancinteriordesign/_saved/"><img src="assets/iconpint.png" target="_blank" rel="noopener" alt="logo_pinterest"></a></div>
                
            </li>
        </ul>
        <div class="cont-sitemap">
        <ul>
            <li><a href="#"><h4>Le studio</h4></a></li>
        </ul>
        <ul>
            <li><a href="#"><h4>Nos Réalisations</h4></a></li>
            <li><a href="#">Part</a></li>
            <li><a href="#">Pro</a></li>
            <li><a href="#">Evenemnt</a></li>
        </ul>
        <ul>
            <li><a href="#"><h4>Nos services</h4></a></li>
        </ul>
        <ul>
            <li><a href="#"><h4>Le blog</h4></a></li>
            <li><a href="#">Article1</a</li>
            <li><a href="#">Article2</a</li>
            <li><a href="#">Article3</a</li>
         </ul>
        <ul>
            <li><a href="#"><h4>FAQ</h4></a></li>
        </ul>
        <ul>
            <li><a href="#"><h4>Nous Contacter</h4></a></li>
            <li><a href="#">Devis</a></li>
            <li><a href="#">Prestations en ligne</a></li>
        </ul>
        </div>
        <ul class="subscribe">
            <li><p><h4>Souscrire à la newsletter</h4></p></li>
            <li>            
                <form method="GET" class="form-subscribe" id="form-subscribe">
                    <label for="subscribe"></label>
                    <input type="mail" name="mail" placeholder="Entrez votre email">
                    <input id="submitNewsletter" type="submit" name="submit" value=" > ">
                    <p id="responseNewsletter"></p>
                </form> 
            </li>
        </ul>
    </nav>
    <div class="cont-copy">
        <div class="copy">
            <ul>
                <li><a href="#">Mentions Legales</a></li>
                <li><a href="#">CGV</a></li>
                <li><a href="#">Politiques Confidentialitées</a></li>
            </ul>
        </div>
    </div>
</div>