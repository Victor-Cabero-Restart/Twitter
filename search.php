<?php

require "template/database.php";
require "template/navig.php";

 

$search = $database->prepare("SELECT * FROM `tweet` WHERE `texte` LIKE '%".$_GET['recherche']."%' ORDER BY publish_date DESC");
$search->execute();
$searchTweet = $search->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach ($searchTweet as $twit) { ?>
    <div>
        <p><?= $twit['texte'] ?></p>
        <p><?=$twit['publish_date']?></p>
        <form action="delete.php" method="POST">
            <input type="hidden" name="supp" value="<?= $twit['id'] ?>">
            <button type="submit">Supprimer</button>
        </form>
    </div>
<?php } ?> 
