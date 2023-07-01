<?php
require_once '../back/config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $marque = $_POST['marque'];
    $modèle = $_POST['modele'];
    $année = $_POST['annee'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

    // Préparer la requête 
    $query = "INSERT INTO voitures (marque, modèle, année, prix, image) VALUES (:marque, :modele, :annee, :prix, :image)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':marque', $marque);
    $stmt->bindParam(':modele', $modèle);
    $stmt->bindParam(':annee', $année);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':image', $image);

    // Exécuter la requête 
    if ($stmt->execute()) {
        // Rediriger vers la page d'administration 
        header("Location: admin.php");
        exit();
    } else {
        // Gérer les erreurs d'ajout
        echo "Une erreur s'est produite lors de l'ajout de la voiture.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage XYZ - Ajouter une voiture</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Garage XYZ - Ajouter une voiture</h1>
    </header>

    <h2>Formulaire d'ajout d'une voiture</h2>

    <form method="POST" action="ajouter_voiture.php">
        <label for="marque">Marque :</label>
        <input type="text" name="marque" required>

        <label for="modele">Modèle :</label>
        <input type="text" name="modele" required>

        <label for="annee">Année :</label>
        <input type="text" name="annee" required>

        <label for="prix">Prix :</label>
        <input type="text" name="prix" required>

        <label for="image">URL de l'image :</label>
        <input type="text" name="image" required>

        <button type="submit">Ajouter</button>
    </form>
    <ul>
        <li><a href="./front/voitures.php">Voitures</a></li>
        <li><a href="./front/temoignages.php">Témoignages</a></li>
        <li><a href="./front/espace_admin.php">Espace Administrateur</a></li>
        <li><a href="./front/user.php">Employer</a></li>
        <li><a href="./front/contact.php">Contact</a></li>
    </ul>
</body>
</html>