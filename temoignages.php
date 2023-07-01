<?php
require_once '../back/config.php';


// Récupérer les témoignages depuis la base de données
$query = "SELECT * FROM temoignages";
$stmt = $conn->query($query);
$temoignages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les témoignages
foreach ($temoignages as $temoignage) {
    echo "Nom : " . $temoignage['nom'] . "<br>";
    echo "Commentaire : " . $temoignage['commentaire'] . "<br><br>";
}

// Fermer la connexion à la base de données
$conn = null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Témoignages</title>
</head>
<body>
<ul>
    <li><a href="voitures.php">Voitures</a></li>
    <li><a href="espace_admin.php">Espace Administrateur</a></li>
    <li><a href="user.php">Employer</a></li>
</ul>
<form action="ajouter_temoignage.php" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="commentaire">Commentaire :</label>
    <textarea name="commentaire" id="commentaire" required></textarea>

    <label for="note">Note :</label>
    <input type="number" name="note" id="note" min="1" max="5" required>

    <label for="approuve">Approuvé :</label>
    <input type="checkbox" name="approuve" id="approuve">

    <button type="submit">Envoyer</button>
</form>
</body>
</html>