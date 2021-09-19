<?php 
$bddNews = new PDO('mysql:host=localhost; dbname=amandineganci', 'root', '');
// echo json_encode($_POST);

$success = 0;
$msg = "Une erreur est survenue (response.php)";
$mail = htmlspecialchars(strip_tags($_POST['mail']));

    if(!empty($_POST['mail']))
    {
       
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bddNews->prepare("SELECT * FROM newsletters WHERE mail=? ");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) 
                    {
                        $insrtmail = $bddNews->prepare("INSERT INTO newsletters(mail) VALUES (?)");
                        $insrtmail->execute(array($mail));
                        $success = 1;
                        $msg = "Votre adresse mail a bien été pris en compte! Merci";
                    } else {
                        $msg = "Vous êtes déjà inscrit!";
                    }
                } else {
                   $msg = "Adresse email invalide!";
                }
        
    } else {
        $msg = "Veuillez remplir le champ!";
    }
        $res = ["success" => $success, 'msg' => $msg];
        echo json_encode($res);
?>
