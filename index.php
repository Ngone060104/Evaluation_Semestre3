<?php
define("WEBROOT", "http://localhost:8000/");
require_once('data.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
</head>

<body>
    <?php
    $page = $_REQUEST['page'] ?? 'list';
    if ($page == 'list') {
            $articles = getAllArticles();
        require_once('list.php');
    } elseif ($page == 'ajout') {
        require_once('ajout.php');
    } elseif ($page == 'details') {
        require_once('details.php');
        // recuperation de l'id dans l'URL
    } elseif ($page == 'supprimer') {
         // recuperation de l'id dans l'URL
        $id = $_GET["id"] ?? 0;
        if ($id > 0) {
            deleteArticles($id);
        }
        header("Location: " . WEBROOT . "?page=list");
        exit();
    } else {
        echo "page introuvable";
    }


    ?>
</body>

</html>