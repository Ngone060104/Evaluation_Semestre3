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
    <div class="bg-[url('./404Error.jpeg')] bg-cover bg-center h-96 mt-6">
    <h1 class="text-3xl font-bold text-red-500 text-center mt-20">Erreur 404 - Page non trouvée</h1>
    <p class="text-center text-gray-600 mt-4">Désolé, la page que vous recherchez n'existe pas.</p>
    <div class="text-center mt-6">
        <a href="?page=list" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-300">Retour à l'accueil</a>
    </div>
</div>

</body>

</html>

