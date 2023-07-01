<?php
require_once '../back/config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['mot_de_passe'];

    // Vérifier si l'utilisateur existe déjà dans la base de données
    $query = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // L'utilisateur existe déjà
        echo "L'utilisateur existe déjà.";
    } else {
        // L'utilisateur n'existe pas, procéder à l'ajout
        $query = "INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $motDePasse);

    //Rediriger vers une page 
     header("Location: admin.php");
     exit();

        // Exécuter la requête 
        if ($stmt->execute()) {
            // Rediriger vers une page de succès 
            echo "Utilisateur ajouté avec succès.";
        } else {
            // Gérer les erreurs 
            echo "Une erreur s'est produite lors de l'ajout de l'utilisateur.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 300px;
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Formulaire d'ajout d'un utilisateur</h2>

    <form method="POST" action="ajouter_admin.php">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>

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