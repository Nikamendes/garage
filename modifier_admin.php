<?php
require_once '../back/config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['mot_de_passe'];

    // Vérifier si l'administrateur existe dans la base de données
    $query = "SELECT * FROM administrateurs WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Mettre à jour les informations de l'administrateur
        $query = "UPDATE administrateurs SET nom = :nom, email = :email, mot_de_passe = :mot_de_passe WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $motDePasse);

        // Exécuter la requête de mise à jour
        if ($stmt->execute()) {
            // Rediriger vers une page de succès ou afficher un message 
            echo "Les informations de l'administrateur ont été mises à jour avec succès.";
        } else {
            // Gérer les erreurs de mise à jour
            echo "Une erreur s'est produite lors de la mise à jour des informations de l'administrateur.";
        }
    } else {
        // L'administrateur n'existe pas
        echo "L'administrateur n'existe pas.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un administrateur</title>
</head>
<style>
    header img {
    max-width: 200px;
    height: auto;
}
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 30px;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #555;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
<body>
    <h2>Formulaire de modification d'un administrateur</h2>

    <form method="POST" action="modifier_admin.php">
        <label for="id">ID :</label>
        <input type="text" name="id" required>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>

        <button type="submit">Modifier</button>
    </form>
</body>
<ul>
        <li><a href="./front/voitures.php">Voitures</a></li>
        <li><a href="./front/temoignages.php">Témoignages</a></li>
        <li><a href="./front/espace_admin.php">Espace Administrateur</a></li>
        <li><a href="./front/user.php">Employer</a></li>
        <li><a href="./front/contact.php">Contact</a></li>
    </ul>
</html>