<header>
  
  
  <nav class="menu" id="menu">
<?php   
$menu1='
    <ul class="sub-menu" id="sub-menu" >
        <li><a id="stud" href="index.php#block2">Le studio</a></li>
        <li><a id="rea" href="/realisations.php">Nos réalisations</a></li>
        <li><a id="serv" href="#">Nos services</a></li>
    </ul>'
    ?>
     <?php $logo =' 
    <div class="logo">
  <a href="../index.php">
          <img src="/assets/logo.png" alt="logomini" class="mini-logo"
        /></a>
  </div>'
?>
  <?php
    $menu2='
    <ul class="sub-menu" id="sub-menu">
        <li><a id="blog" href="#">Le Blog</a></li>
        <li><a id="faq" href="#">FAQ</a></li>
        <li><a id="contact" href="#">Nous contacter</a></li>
     </ul>'
?>
<?php echo $menu1;
      echo $logo;
      echo $menu2;
?>
</nav>

<div class="logo-mobil">
<div class="toggle-button">
  <span></span>
  <span></span>
  <span></span>
</div>
<?php echo $logo;  ?>
 </div>
 

  <div class="sidebar">
 
    <nav class="menu" id="menu-mobil">
  <?php echo $logo;
        echo $menu1;
        echo $menu2;
  ?>
  
</nav>
</div>

</header>






