<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_a_erreurs = false;
$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);

if ($entree_mise_a_jour) {
    // On cherche l'article à éditer
    $commande = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
    $commande->execute([
        "id" => $_GET["id"]
    ]);

    $article = $commande->fetch();
}

if ($formulaire_soumis) {
    // On crée une nouvelle entrée
    $commandeEditer = $clientMySQL->prepare("
        UPDATE article
        SET titre = :titre, chapo = :chapo, contenu = :contenu, image = :image, lien_yt = :lien_yt
        WHERE id = :id
    ");

    $commandeEditer->execute([
        'titre' => $_POST['titre'],
        'chapo' => $_POST['chapo'],
        'contenu' => $_POST['contenu'],
        'image' => $_POST['image'],
        'lien_yt' => $_POST['lien_yt'],
        'id' => $_POST['id']
    ]);
} 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/contact.css">
    <title>Éditer un article - Administration</title>
</head>

<body>
<?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8 justify-between flex">
        <h1 class="text-3xl font-bold text-gray-900">Éditer</h1>
        <a href="https://speakndev203.alwaysdata.net/administration/articles/" class="block font-bold rounded-md bg-indigo-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Retourner à la liste article</a>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?php
                if ($formulaire_soumis && !$formulaire_a_erreurs) {echo "<section class='banniere-alerte succes' role='alert' aria-live='polite'><p>Édition sauvegardée !</p></section>";}
                if ($formulaire_soumis && $formulaire_a_erreurs) {echo "<section class='banniere-alerte erreur' role='alert' aria-live='polite'><p>Votre édition possède une erreur !</p></section>";}
            ?>
            <div class="py-6">
                <?php if($article) {?>
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">

                    <input type="hidden" value="<?php echo $article['id']; ?>" name="id">
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre"  value="<?php echo $article['titre']; ?>"  id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom">
                        </div>
                        <div class="col-span-12">
                            <label  for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" value="<?php echo $article['chapo']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo"><?php echo $article['chapo']; ?></textarea>
                        </div>
                        <div class="col-span-12">
                            <label  for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                            <textarea type="text" name="contenu" value="<?php echo $article['contenu']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu"><?php echo $article['contenu']; ?></textarea>
                        </div>
                        <div class="col-span-12">
                            <label  for="image" class="block text-lg font-medium text-gray-700">Lien image <span class="text-sm text-gray-500">Mettre l'URL de l'image (chemin absolu)</span></label>
                            <textarea type="text" name="image" value="<?php echo $article['image']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="image"><?php echo $article['image']; ?></textarea>
                        </div>
                        <div class="col-span-12">
                            <label  for="lien_yt" class="block text-lg font-medium text-gray-700">Lien vidéo YouTube <span class="text-sm text-gray-500">Mettre l'URL de la vidéo YouTube</span></label>
                            <textarea type="text" name="lien_yt" value="<?php echo $article['lien_yt']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_yt"><?php echo $article['lien_yt']; ?></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" formaction="" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Éditer</button>
                        </div>
                    </section>
                </form>
                <?php } else{ 
                    $formulaire_a_erreurs = true; }
                ?>
                    
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>