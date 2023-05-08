<?php 

require "template/database.php";

$requete = $database->prepare("SELECT * From tweet ORDER BY publish_date DESC");
$requete->execute();
$allTweet = $requete->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitteuuh</title>
</head>
<body>
    <?php require "template/navig.php";?>
    
    <main>
        <form class="forme" method="GET" action="search.php">
            <div>
                <input type="text" name="recherche" placeholder="Ecris ta recherche">
            </div>
            <button type="submit">Rechercher </button>

        </form>

        <form class="form" method="POST" action="insert-tweet.php">
            <div>
                <input type="text" name="texte" placeholder="Ecris ton tweet">
            </div>
            <button type="submit">Envoyer </button>
        </form>

        <?php foreach($allTweet as $tweets) {  ?>
            <div>
                <p><?=$tweets['texte']?></p>
                <p><?=$tweets['publish_date']?></p>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="supp" value="<?= $tweets['id'] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        <?php } ?> 
    </main>
</body>
</html>