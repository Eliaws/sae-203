<?php
require_once('../../ressources/includes/connexion-bdd.php');

$commande = $clientMySQL->prepare('
    SELECT
        ar.id,
        ar.titre AS titre_article, 
        ar.chapo AS chapo_article,
        ar.contenu AS contenu_article,
        ar.image AS image_article,
        ar.lien_yt AS lien_yt_article,
        ar.date_creation AS date_creation_article,
        ar.auteur_id AS article_auteur_id, 
        CONCAT(auteur.nom, " ", auteur.prenom) AS auteur
    FROM article AS ar 
    LEFT JOIN auteur 
    ON ar.auteur_id = auteur.id;
');
$commande->execute();
$liste = $commande->fetchAll();

$pageCourante = "articles";
$racineURL = $_SERVER['REQUEST_URI'];

$URLCreation = "{$racineURL}/creation.php";

//Commande de suppression d'article lorsque le formulaire id_suppression est envoyé 
if (isset($_POST['id_suppression'])) {
    $idArticle = $_POST['id_suppression'];

    // Requête de suppression de l'article grâce à la variable $idArticle
    $suppressionCommande = $clientMySQL->prepare('DELETE FROM article WHERE id = :id');
    $suppressionCommande->bindParam(':id', $idArticle);
    $suppressionCommande->execute();

    // Redirige vers la même page pour afficher la liste mise à jour des articles
    header("Location: " . $_SERVER['PHP_SELF']);
    exit(); // Arrête l'exécution du reste du code.

}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once("../ressources/includes/head.php"); ?>
    <title>Liste articles - Administration</title>
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 justify-between flex">
            <h1 class="text-3xl font-bold text-gray-900">Liste articles</h1>
            <a href="<?php echo $URLCreation ?>" class="block font-bold rounded-md bg-indigo-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Ajouter un nouvel article</a>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6">
            <div class="py-6">
                <table class="w-full bg-white rounded-lg overflow-hidden border-collapse shadow">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="font-bold pl-8 py-5 text-left">Id</th>
                            <th class="font-bold pl-8 py-5 text-left">Titre</th>
                            <th class="font-bold pl-8 py-5 text-left">Chapô</th>
                            <th class="font-bold pl-8 py-5 text-left">Date</th>
                            <th class="font-bold pl-8 py-5 text-left">Auteur</th>
                            <th class="pl-8 py-5"></th>
                            <th class="pl-8 py-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($liste as $element) 
                        {
                            $lienEdition = "{$racineURL}/edition.php?id={$element["id"]}";

                            $dateCreation = new DateTime($element["date_creation_article"]);
                            $auteurArticle = $element["auteur"];
                            if (is_null($auteurArticle)) {
                                $auteurArticle = "/";
                            }
                        ?>

                            <tr class="hover:bg-gray-100 border-b-2 border-b-gray-100 last:border-b-0 first:border-t-2 first:border-t-gray-200">
                                <td class="pl-8 p-4 font-bold">
                                    <?php echo $element["id"]; ?>
                                </td>
                                <td class="pl-8 p-4"><?php echo $element["titre_article"]; ?></td>
                                <td class="pl-8 p-4"><?php echo $element["chapo_article"]; ?></td>
                                <td class="pl-8 p-4"><?php echo ($element["date_creation_article"]); ?></td>
                                <td class="pl-8 p-4">
                                    <?php echo $auteurArticle; ?>
                                </td>
                                <td class="pl-8 p-4">
                                    <a href='<?php echo $lienEdition; ?>' class='font-bold text-blue-600 hover:text-blue-900 hover:underline underline-offset-2'>Éditer</a>
                                </td>
                                <td class="pl-8 p-4">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="id_suppression" value="<?php echo $element["id"]; ?>">
                                        <button type="submit" formaction="<?php echo $_SERVER['PHP_SELF']; ?>" class="font-bold text-red-600 hover:text-red-900 hover:underline underline-offset-2" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                                    </form>
                                </td>

                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>