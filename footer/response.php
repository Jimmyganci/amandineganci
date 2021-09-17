<?php 
// echo json_encode($_POST);

$success = 0;
$msg = "Une erreur est survenue (response.php)";

<?php 

    if(!empty($_POST['mail'])){
        $mail = htmlspecialchars(strip_tags($_POST['mail']));
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bddNews->prepare("SELECT * FROM newsletters WHERE mail=? ");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist ==0) {
                        $reqmail = $bddNews->prepare("INSERT INTO newsletters(mail) VALUES ('$mail')");
                        $reqmail->execute(array($mail));
                        $success = 1;
                        $msg = "Votre adresse mail a bien été pris en compte! Merci";

                    } else {
                        $msg = "Vous etes déjà inscrit à la newsletter!";
                    }
                    
                } else {
                    $msg = "Adresse email invalide."
                }
        
    } else {
        $msg = "Veuillez renseigner le champ!";
    }

?>


$res = ["success" => $success, 'msg' => $msg];
echo json_encode($res);

?>