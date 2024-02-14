<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_a_erreurs = false;
$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    if (
        isset(
            $_POST['titre'],
            $_POST['auteur_id'],
            $_POST['chapo'],
            $_POST['contenu'],
            $_POST['image'],
            $_POST['lien_yt'],
        )
    ){
        // Vérifier si l'auteur a été choisi
        if (empty($_POST['auteur_id'])) {
            $formulaire_a_erreurs = true;
        } else {
            // On crée une nouvelle entrée
            $creerArticleCommande = $clientMySQL->prepare('INSERT INTO article(titre, auteur_id, chapo, contenu, image, lien_yt) VALUES (:titre, :auteur_id, :chapo, :contenu, :image, :lien_yt)');

            $titre = htmlentities($_POST['titre']);
            $auteur = htmlentities($_POST['auteur_id']);
            $chapo = htmlentities($_POST['chapo']);
            $contenuArticle = htmlentities($_POST['contenu']);
            $lienimage = htmlentities($_POST['image']);
            $lienyt = htmlentities($_POST['lien_yt']);

            $creerArticleCommande->execute([
                'titre' => $titre,
                'auteur_id' => $auteur,
                'chapo' => $chapo,
                'contenu' => $contenuArticle,
                'image' => $lienimage,
                'lien_yt' => $lienyt,
            ]);
        }
    } else {
        $formulaire_a_erreurs = true;
    }
}

// Commande pour récupérer les données auteurs dans le menu déroulant
$commandeAuteurs = $clientMySQL->prepare('SELECT * FROM auteur');
$commandeAuteurs->execute();
$auteurs = $commandeAuteurs->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <link rel="stylesheet" href="ressources/css/contact.css">
    <title>Création d'article - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8 justify-between flex">
            <h1 class="text-3xl font-bold text-gray-900">Créer un article</h1>
            <a href="https://speakndev203.alwaysdata.net/administration/articles/" class="block font-bold rounded-md bg-indigo-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Retourner à la liste article</a>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?php                                                                       //verifie si le formulaire contient des erreurs
            if ($formulaire_soumis && !$formulaire_a_erreurs) {
                echo "<section class='banniere-alerte succes' role='alert' aria-live='polite'><p>Article créé !</p></section>";
            }
            if ($formulaire_soumis && $formulaire_a_erreurs) {
                echo "<section class='banniere-alerte erreur' role='alert' aria-live='polite'><p>Votre article possède une erreur !</p></section>";
            }
            ?>
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="auteur" class="block text-lg font-medium text-gray-700">Auteur</label>
                            <select name="auteur_id" id="auteur_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">- Cliquez pour choisir un auteur -</option>
                                <?php foreach ($auteurs as $auteur) {   //il exite une liste deroulante qui augemente pour chaque auteur existant dans la base de données ?>
                                    <option value="<?php echo $auteur['id']; ?>"><?php echo $auteur['prenom'] . ' ' . $auteur['nom']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre" id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="titre">
                        </div>
                        <div class="col-span-12">
                            <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="text" class="block text-lg font-medium text-gray-700">Contenu</label>
                            <textarea type="text" name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="10" id="contenu"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="image" class="block text-lg font-medium text-gray-700">Lien image <span class="text-sm text-gray-500">Mettre l'URL de l'image (chemin absolu)</span></label>
                            <input type="text" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="image">
                        </div>
                        <div class="col-span-12">
                            <label for="lien_yt" class="block text-lg font-medium text-gray-700">Lien vidéo YouTube <span class="text-sm text-gray-500">Mettre l'URL de la vidéo YouTube</span></label>
                            <input type="url" name="lien_yt" id="lien_yt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_yt">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" formaction="" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>
