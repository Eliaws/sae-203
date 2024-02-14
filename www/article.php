<?php
$couleur_bulle_classe = "rose";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

$id = null; // Définition de l'ID à null
//Récupération de l'id de l'article sur lequel l'utilisateur clique
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Vérification si l'ID est défini
if ($id !== null) {
    //Récupération des données dans la table article et assignation à d'autres noms pour éviter les problèmes si on utilise d'autres tables
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
        ON ar.auteur_id = auteur.id
        WHERE ar.id = :id
    ');
    $commande->execute(['id' => $id]);
    $element = $commande->fetch();
} else {
    echo "Erreur 404 : Cette page n'existe pas";
    exit; // Définition d'une erreur 404 si l'ID n'est pas défini
}

$lien_yt_article = $element["lien_yt_article"];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="ressources/images/favicon.png">
    <title>Speak'n'Dev - <?php echo $element["titre_article"] ;?></title>
   

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/accueil.css">
    <link rel="stylesheet" href="ressources/css/article.css">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php
        // A supprimer si vous n'en avez pas besoin.
        // Mettre une couleur dédiée pour cette bulle si vous gardez la bulle
        require_once('./ressources/includes/bulle.php');
        ?>

        <!-- Contenu de l'article -->
        <main class="conteneur-principal conteneur-1280">
        <?php
            $dateCreation = new DateTime($element["date_creation_article"]);    //recupere la date de creation de l'article
            $auteurArticle = $element["auteur"];                                //verifie si il y a un auteur a crediter
                if (is_null($auteurArticle)) {
                            $auteurArticle = "/";
                }
        ?>
    <article>
        <div> 
         <div class="article-zoom">
            <h1 class="titre-page" class="titre-page text-6x1 py-6 justify-between flex" ><?php echo $element["titre_article"]; ?></h1>
        </div>
       
            <img class="image_article flex justify-center items-center mb-10 mt-10 object-contain"  src="<?php echo $element["image_article"]; ?>" alt="Image de l'article">
        </div>
        <div>
            <h2 class="chapo-article font-sans text-3xl leading-relaxed"><?php echo $element["chapo_article"]; ?></h2>
        </div>
        <div class="contenu-article leading-relaxed">
            <p>
                <?php echo $element["contenu_article"]; ?>
            </p>
        </div>
        </div>
        <div class="max-w-7xl py-5 justify-between flex">
            <p class="mb-1 m-1 text-xs">Article écrit par <?php echo $element["auteur"]; ?></p>
            <p class="mb-1 m-1 text-xs"> <?php echo $dateCreation->format('d/m/Y') ; ?></p>
        </div> 
        <div>
    </article>
            <!-- On peut ajouter d'autres éléments -->
        </main>

        <?php require_once('./ressources/includes/footer.php'); ?>
    </section>
</body>

</html>