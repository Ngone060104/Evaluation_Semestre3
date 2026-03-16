<?php
require_once("data.php");
$errorTitre = "";
$errorContenu= "";
$errorCategorie= "";
$verification = true;
if(isset($_POST["ajouter"])):
    if(trim($_POST["titre"])==""){
         $errorTitre = "le titre est obligatoire";
        $verification = false;
    }
    if(trim($_POST["categorie"])==""){
         $errorCategorie = "la categorie est obligatoire";
        $verification = false;
    }
    if(trim($_POST["contenu"])==""){
         $errorContenu  = "le contenu est obligatoire";
        $verification = false;
    }
    
   
    if ($verification) {
        $newArticle = [
            "id" =>(count($_SESSION["articles"]) + 1),
            "titre" => $_POST['titre'],
            "categorie" => $_POST['categorie'],
            "contenu" => $_POST['contenu'],
        ];
        addArticles($newArticle);
        header("Location:".WEBROOT."?page=list");
        exit(); 
    }
endif;
?>