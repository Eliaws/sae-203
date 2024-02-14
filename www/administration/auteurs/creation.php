<?php
require_once '../../ressources/includes/connexion-bdd.php';

$pageCourante = 'auteurs';

$formulaire_a_erreurs = false;
$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    if (
        empty($_POST['prenom']) &&
        empty($_POST['nom']) &&
        empty($_POST['lien_avatar']) &&
        empty($_POST['lien_twitter']) &&
        empty($_POST['description']) &&
        empty($_POST['lien_lk'])
    ) {
        $formulaire_a_erreurs = true; // Définir le formulaire à erreurs si un champ est manquant
    } else {
        // On crée une nouvelle entrée
        $creerAuteurCommande = $clientMySQL->prepare(
            'INSERT INTO auteur(prenom, nom, lien_avatar, lien_twitter, description, lien_lk) VALUES (:prenom, :nom, :lien_avatar, :lien_twitter, :description, :lien_lk)'
        );

        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $lienAvatar = htmlentities($_POST['lien_avatar']);
        $lienTwitter = htmlentities($_POST['lien_twitter']);
        $description = htmlentities($_POST['description']);
        $lien_lk = htmlentities($_POST['lien_lk']);

        $creerAuteurCommande->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'lien_avatar' => $lienAvatar,
            'lien_twitter' => $lienTwitter,
            'description' => $description,
            'lien_lk' => $lien_lk,
        ]);
    }
} else {
    $formulaire_a_erreurs = true; // Définir le formulaire à erreurs si le formulaire n'est pas soumis
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once('../ressources/includes/head.php'); ?>
    <link rel="stylesheet" href="ressources/css/contact.css">
    <title>Création auteur - Administration</title>
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8 justify-between flex">
            <h1 class="text-3xl font-bold text-gray-900">Créer un auteur</h1>
            <a href="https://speakndev203.alwaysdata.net/administration/articles/" class="block font-bold rounded-md bg-indigo-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Retourner à la liste auteur</a>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php
            if ($formulaire_soumis && !$formulaire_a_erreurs) {echo "<section class='banniere-alerte succes' role='alert' aria-live='polite'><p>Auteur crée !</p></section>";}
            if ($formulaire_soumis && $formulaire_a_erreurs) {echo "<section class='banniere-alerte erreur' role='alert' aria-live='polite'><p>Votre création d'auteur possède une erreur !</p></section>";}
        ?>
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nom">
                        </div>
                        <div class="col-span-12">
                            <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom">
                        </div>
                        <div class="col-span-12">
                            <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Description de l'auteur</label>
                            <textarea type="text" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="6" id="description"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="avatar" class="block text-lg font-medium text-gray-700">Lien avatar</label>
                            <input type="text" name="lien_avatar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="avatar">
                            <div class="text-sm text-gray-500">
                                Mettre l'URL de l'avatar (chemin absolu)
                            </div>
                        </div>
                        <div class="col-span-12">
                            <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Lien Twitter</label>
                            <input type="url" name="lien_twitter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_twitter">
                        </div>
                        <div class="col-span-12">
                            <label for="lien_lk" class="block text-lg font-medium text-gray-700">Lien Linkedin</label>
                            <input type="url" name="lien_lk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_lk">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="font-bold rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>