<?php
require_once '../back/config.php';

// Vérifier si l'ID de la voiture à modifier est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier si la voiture existe dans la base de données
    $query = "SELECT * FROM voitures WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Récupérer les informations de la voiture
        $voiture = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            $prix = $_POST['prix'];
            $image = $_POST['image'];

            // Préparer la requête de mise à jour
            $query = "UPDATE voitures SET marque = :marque, modèle = :modele, année = :annee, prix = :prix, image = :image WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':marque', $marque);
            $stmt->bindParam(':modele', $modele);
            $stmt->bindParam(':annee', $annee);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécuter la requête de mise à jour
            if ($stmt->execute()) {
                // Rediriger vers la page des utilisateurs après la modification
                header("Location: admin.php");
                exit();
            } else {
                // Gérer les erreurs de mise à jour
                echo "Une erreur s'est produite lors de la modification de la voiture.";
            }
        }
    } else {
        // La voiture n'existe pas
        echo "La voiture n'existe pas.";
    }
} else {
    // L'ID de la voiture n'est pas spécifié
    echo "ID de la voiture non spécifié.";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une voiture</title>
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
    <h2>Formulaire de modification d'une voiture</h2>

    <?php if (isset($voiture)) : ?>
        <form method="POST" action="modifier_voiture.php?id=<?php echo $voiture['id']; ?>">
            <label for="marque">Marque :</label>
            <input type="text" name="marque" value="<?php echo isset($voiture['marque']) ? htmlspecialchars($voiture['marque']) : ''; ?>" required>

            <label for="modele">Modèle :</label>
            <input type="text" name="modele" value="<?php echo isset($voiture['modele']) ? htmlspecialchars($voiture['modele']) : ''; ?>" required>

            <label for="annee">Année :</label>
            <input type="text" name="annee" value="<?php echo isset($voiture['annee']) ? htmlspecialchars($voiture['annee']) : ''; ?>" required>

            <label for="prix">Prix :</label>
            <input type="text" name="prix" value="<?php echo isset($voiture['prix']) ? htmlspecialchars($voiture['prix']) : ''; ?>" required>

            <label for="image">URL de l'image :</label>
            <input type="text" name="image" value="<?php echo isset($voiture['image']) ? htmlspecialchars($voiture['image']) : ''; ?>" required>

            <button type="submit">Modifier</button>
        </form>
    <?php endif; ?>
</body><ul>
        <li><a href="./front/voitures.php">Voitures</a></li>
        <li><a href="./front/temoignages.php">Témoignages</a></li>
        <li><a href="./front/espace_admin.php">Espace Administrateur</a></li>
        <li><a href="./front/user.php">Employer</a></li>
        <li><a href="./front/contact.php">Contact</a></li>
    </ul>

</html>