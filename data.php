<?php
session_start();
// session_unset();
// session_destroy(); // Cela efface tout. Actualise une fois, puis retire cette ligne.

if (!isset($_SESSION['categorie'])) {
    $_SESSION['categorie'] = [
        [  
             "id" => 1,
            "libelle" => "Programmation"
        ],
        [
             "id" => 2,
            "libelle" => "Cuisine"
        ],
        [
             "id" => 3,
            "libelle" => "Voyage"
        ],
        [
             "id" => 4,
            "libelle" => "Technologie"
        ],
        [
             "id" => 5,
            "libelle" => "Sport"
        ],
        [
             "id" => 6,
            "libelle" => "Mode"
        ],
    ];
}

if (!isset($_SESSION['articles'])) {
    $_SESSION['articles'] = [
        [
            "id" => 1,
            "titre" => "Les bases du PHP",
            "categorie" => 1,
            "contenu" => "Apprenez à manipuler les variables, les boucles et les tableaux pour dynamiser votre site."
        ],
        [
            "id" => 2,
            "titre" => "Recette de la tarte aux pommes",
            "categorie" => 2,
            "contenu" => "Une pâte brisée, des pommes fondantes et une touche de cannelle pour un dessert inratable."
        ],
        [
            "id" => 3,
            "titre" => "Top 10 des destinations en 2024",
            "categorie" => 3,
            "contenu" => "Du Japon à l'Islande, découvrez les endroits incontournables à visiter cette année."
        ],
        [
            "id" => 4,
            "titre" => "Comprendre l'intelligence artificielle",
            "categorie" => 4,
            "contenu" => "Plongée au cœur des algorithmes qui transforment notre façon de travailler et de créer."
        ]
    ];
}

function getAllCategories():array{
    return isset($_SESSION["categorie"]) ? $_SESSION["categorie"] : [] ;
}
//  Récupère le libellé d'une catégorie à partir de son ID
function getCategorieLibelle($id_recherche) {
    $categories = getAllCategories();
    foreach ($categories as $cat) {
        if ($cat['id'] == $id_recherche) {
            return $cat['libelle'];
        }
    }
}
function getAllArticles(): array
{
    return $_SESSION['articles'];
}

function getArticleById(int $id): array|null
{
    $articles = getAllArticles();
    foreach ($articles as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
    return null;
}
function getArticleByCategory($id_categorie, $articles)
{
    $filtered = [];
    foreach ($articles as $article) {
        if ($article['categorie'] == $id_categorie) {
            $filtered[] = $article;
        }
    }
    return $filtered;
}

function addArticles(array $article): void
{
    $articles = getAllArticles();
    $articles[] = $article;
    $_SESSION['articles'] = $articles;
}

function deleteArticles(int $id): void
{
    $articles = getAllArticles();
    foreach ($articles as $key => $article) {
        if ($article['id'] == $id) {
            unset($articles[$key]);
            $_SESSION['articles'] = $articles;
        }
    }
}
