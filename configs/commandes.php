<?php
 

function addProj($fichierUrl, $descimage, $titleproject, $descproject, $category)
{
    if(require("../configs/connexion.php"))
    {
        $req = $bdd->prepare("INSERT INTO projects (image, desc_image, title_project, desc_project, category) VALUES ('$fichierUrl', '$descimage', '$titleproject', '$descproject', '$category')");
        
        $req->execute(array($fichierUrl, $descimage, $titleproject, $descproject, $category));

        $req->closeCursor();
    }
   
}


function deleteProd($id){
    if(require("../configs/connexion.php")){

        $req=$bdd->prepare("DELETE FROM projects WHERE id=?");

        $req->execute(array($id));
    }
}

function addAvis($textAvis, $nameClient)
{
    if(require("../configs/connexion.php"))
    {
        $req = $bdd->prepare("INSERT INTO avis_table (avis, name) VALUES (?, ?)");
        
        $req->execute(array($textAvis, $nameClient));

        $req->closeCursor();
    }
}
?>
