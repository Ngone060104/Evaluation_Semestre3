<?php require_once("traitement.php");
require_once("data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <!-- div_container-->
    <div class="flex h-screen">
        <!-- div_sidebar -->
        <!-- Sidebar - Cachée sur mobile -->
        <aside class="hidden md:flex flex-col w-64 bg-slate-900 text-white transition-all duration-300">
            <div class="p-6">
                <h2 class="text-xl font-bold tracking-tight text-blue-400">Gestion des Taches</h2>
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="<?= WEBROOT ?>?page=listtaches" class="flex items-center gap-3 p-3 bg-blue-600 rounded-lg transition">
                    <i class="fas fa-list-ul w-5"></i>
                    <span>Listes des Articles</span>
                </a>

            </nav>
        </aside>
        <!-- div_main -->
        <!-- div_main --><!-- div_main -->
        <div class="flex-1 bg-gray-50 overflow-y-auto px-4 pb-10"> <!-- Ajout de padding latéral pour mobile -->
            <!-- Header discret -->
            <div class="p-4 my-4 bg-white shadow-sm border border-gray-200 rounded-xl flex items-center max-w-3xl mx-auto">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="w-full bg-gray-100 text-gray-700 border-none rounded-lg py-2 pl-10 pr-4 focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Rechercher une tâche...">
                </div>
            </div>

            <!-- Formulaire d'Ajout -->
            <div class="max-w-3xl mx-auto p-5 sm:p-8 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg shrink-0">
                        <i class="fas fa-plus-circle text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Nouvelle Article</h1>
                        <p class="text-xs sm:text-sm text-gray-500">Remplissez les information de l'article</p>
                    </div>
                </div>

                <form action="<?= WEBROOT ?>?page=ajout" method="POST" class="space-y-5">
                    <!-- Titre -->
                    <div>
                        <label for="titre" class="block text-sm font-semibold text-gray-700 mb-1">Titre de l'article</label>
                        <input type="text" id="titre" name="titre"
                            class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm sm:text-base"
                            placeholder="Ex: Réunion de projet">
                        <?php if (!empty($errorTitre)): ?>
                            <p class="mt-1 text-xs text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> <?= $errorTitre ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- Catégorie -->
                    <div class="space-y-2">
                        <label for="categorie" class="text-sm font-semibold text-slate-700">Catégorie</label>
                        <div class="relative">
                            <select id="categorie" name="categorie"
                                class="w-full appearance-none bg-white px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all cursor-pointer">
                                <option value="">Sélectionnez une catégorie</option>
                                <?php foreach ($_SESSION['categorie'] as $categorie): ?>
                                    <option value="<?= $categorie['libelle'] ?>"><?= $categorie['libelle'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none"></i>
                        </div>
                         <?php if (!empty($errorCategorie)): ?>
                        <p class="mt-1 text-xs text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i><?= $errorCategorie ?></p>
                         <?php endif; ?>
                    </div>
                    <!-- Contenu -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="contenu" rows="4"
                            class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm sm:text-base"
                            placeholder="Décrivez les étapes clés..."></textarea>
                        <?php if (!empty($errorContenu)): ?>
                            <p class="mt-1 text-xs text-red-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> <?= $errorContenu ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Boutons (Empilés sur mobile : flex-col-reverse) -->
                    <div class="pt-6 flex flex-col-reverse sm:flex-row justify-end gap-3">
                        <a href="<?= WEBROOT ?>?page=list"
                            class="bg-red-100 w-full sm:w-auto text-center px-8 py-3.5 text-gray-600 font-semibold hover:bg-red-500 text-white rounded-xl transition-all">
                            Annuler
                        </a>
                        <button type="submit" name="ajouter"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-95">
                            Créer la tâche
                        </button>
                    </div>
                </form>
            </div>
        </div>


</body>

</html>