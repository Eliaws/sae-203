<?php

require_once('../../ressources/includes/connexion-bdd.php');

$messageId = $_GET["id"]; // Récupérer l'ID depuis les paramètres de l'URL

$messageCommande = $clientMySQL->prepare('SELECT * FROM message WHERE id = :id');
$messageCommande->bindParam(':id', $messageId, PDO::PARAM_INT); // Lier l'ID à la requête préparée
$messageCommande->execute();

$message = $messageCommande->fetch(PDO::FETCH_ASSOC);

$formulaire_a_erreurs = false;
$formulaire_soumis = !empty($_POST);

//Commande pour compter le nombre de messages présents dans la bdd afin de les afficher
$compterMessagesCommande = $clientMySQL->prepare('SELECT COUNT(*) AS nb_messages FROM message');
$compterMessagesCommande->execute();
$compterMessagesResultat = $compterMessagesCommande->fetch();
$nombreMessages = isset($compterMessagesResultat['nb_messages']) ? $compterMessagesResultat['nb_messages'] : 0;


$pageCourante= "reponse";
$racineURL = $_SERVER['REQUEST_URI'];

//Commande pour récupérer les données auteurs dans le menu déroulant
$commandeAuteurs = $clientMySQL->prepare('SELECT * FROM auteur');
$commandeAuteurs->execute();
$auteurs = $commandeAuteurs->fetchAll(PDO::FETCH_ASSOC); 



    //Envoi mail de réponse
    if ($formulaire_soumis) {
        $msg_prenom = isset($message["prenom"]) ? $message["prenom"] : "";
        $msg_nom = isset($message["nom"]) ? $message["nom"] : "";
        $msg_email = isset($message["email"]) ? $message["email"] : "";
        $contenu_message = isset($message["message"]) ? $message["message"] : "";
        $msg_je_suis = isset($message["je_suis"]) ? $message["je_suis"] : "";
    


        $headers = "From: speakndev203@alwaysdata.net\r\n";
        $headers .= "Reply-To: $msg_email\r\n";
        $headers .= "Footer:  de l'équipe Speak'n'Dev!\r\n";

        $msg_sujet = "Speakndev : Notre réponse à votre message";
        $contenu = $_POST["reponse"];

    // Récupérer les détails de l'auteur sélectionné
    $auteur_selectionne = $_POST["auteur_id"];
    $auteurCommande = $clientMySQL->prepare('SELECT * FROM auteur WHERE id = :id');
    $auteurCommande->bindParam(':id', $auteur_selectionne, PDO::PARAM_INT);
    $auteurCommande->execute();
    $auteur = $auteurCommande->fetch(PDO::FETCH_ASSOC);

    // Utiliser le nom de l'auteur dans le contenu du message de réponse
    $contenu .= "\n\nCordialement,\n" . $auteur["prenom"] . " " . $auteur["nom"] . " de l'équipe Speak'n'Dev";

    mail($msg_email, $msg_sujet, $contenu, $headers);
} else {
    $formulaire_a_erreurs = true;
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
    <title>Répondre - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Répondre</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php
        if ($formulaire_soumis && !$formulaire_a_erreurs) {
            echo "
                <section class='banniere-alerte succes' role='alert' aria-live='polite'>
                    <p>Réponse envoyée !</p>
                </section>
            ";
        }
        if ($formulaire_soumis && $formulaire_a_erreurs) {
            echo "
                <section class='banniere-alerte erreur' role='alert' aria-live='polite'>
                    <p>Votre réponse possède une erreur !</p>
                </section>
            ";
        }
        ?>
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="message" class="block text-lg font-medium text-gray-700 mb-2">Message :</label>
                            <span id="message"><?php echo $message["contenu"]; ?></span>
                        </div>
                        <div class="col-span-12">
                            <label for="auteur" class="block text-lg font-medium text-gray-700">Auteur de la réponse :</label>
                            <select name="auteur_id" id="auteur_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">- Cliquez pour choisir un auteur -</option>
                                <?php foreach ($auteurs as $auteur) {   //il exite une liste deroulante qui augemente pour chaque auteur existant dans la base de données
                                    if ($auteur['id'] == $auteur_selectionne) {
                                        echo '<option id="auteur_selectionne" value="' . $auteur['id'] . '" selected>' . $auteur['prenom'] . ' ' . $auteur['nom'] . '</option>';
                                    } else {
                                        echo '<option id="auteur_selectionne" value="' . $auteur['id'] . '">' . $auteur['prenom'] . ' ' . $auteur['nom'] . '</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                        
                        
                        <div class="col-span-12">
                            <label  for="text" class="block text-lg font-medium text-gray-700">Réponse :</label>
                            <textarea type="text" name="reponse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="10" id="reponse">Bonjour <?php echo $message["prenom"] . ' ' . $message["nom"]; ?>,</textarea>
                        </div>
                                <button type="submit" formaction="" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700" >Envoyer</button> 
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>





