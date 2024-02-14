<?php
$couleur_bulle_classe = "vert";
$page_active = "equipederedaction";

require_once('./ressources/includes/connexion-bdd.php');
$listeAuteursCommande = $clientMySQL->prepare('SELECT * FROM auteur');  //recupere la liste de tout les auteurs
$listeAuteursCommande->execute();
$listeAuteurs = $listeAuteursCommande->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo getenv('CHEMIN_BASE') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="ressources/images/favicon.png">
    <title>Speak'n'Dev - Equipe de Rédaction</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/a-propos.css">
    <link rel="stylesheet" href="ressources/css/equipe-de-redaction.css">
</head>

<body>
    <section>
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php require_once('./ressources/includes/bulle.php'); ?>

        <main class="conteneur-principal conteneur-1280 auteur flex flex-wrap">
            <p class="text-xl">Afin de pouvoir informer au mieux ses internautes, l'équipe Speak'n'Dev a créé une fiche d'information dans laquelle vous pouvez retrouver plusieurs informations.</p>
            <?php foreach ($listeAuteurs as $auteur) { ?>
                <article class="box flex pl-20 p-20 w-1000 h-full text-left w-full rounded-lg border-4 border-black shadow transition-transform duration-300 bg-white">
                    <img class="rounded-full object-cover w-24 h-24 mt-2"
                        id="Image"
                        src='<?php echo $auteur['lien_avatar']; ?>'
                        loading="lazy"
                        alt='<?php echo "Portrait de {$auteur['prenom']}"; ?>'
                    />

                    <div>
                        <p class="text-lg font-bold mt-2 mb-2 pl-8 p-4"><?php echo $auteur['prenom']; ?>
                            <?php echo $auteur['nom']; ?></p>
                        <p class="text-black-500 pl-8 p-4"><?php echo $auteur['description']; ?></p>

                        <div class="pl-8 p-4 flex items-center">
                            <p class="font-bold text-xl mr-1">Contact :</p>
                            <a href="<?php echo $auteur['lien_twitter']; ?>" target="_blank">
                                <img src="ressources/images/Logo_of_Twitter.svg.png" alt="Logo Twitter" class="w-8 h-8 mr-4">
                            </a>
                            <a href="<?php echo $auteur['lien_lk']; ?>" target="_blank">
                                <img src="ressources/images/LinkedIn_logo_initials.png" alt="Logo Linkedin" class="w-8 h-8">
                            </a>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </main>

        <?php require_once('./ressources/includes/footer.php'); ?>

    </section>
</body>
</html>