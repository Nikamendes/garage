<?php
require_once '../back/config.php';

// Vérifier si le formulaire de contact est soumis
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    try {
        $conn->beginTransaction();

        // Insérer les données dans la table "messages"
        $query = "INSERT INTO messages (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        echo "Votre message a été envoyé avec succès.";

        $conn->commit();

        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Une erreur s'est produite lors de l'insertion des données dans la base de données.";
        
        // echo "Erreur: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Contactez-nous</title>
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
<section>
    <h2>Contactez-nous</h2>
    <p>Pour toute demande ou question, n'hésitez pas à nous contacter en utilisant le formulaire ci-dessous ou en nous appelant.</p>

    <div class="contact-form">
        <form action="contact.php" method="POST">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required><br>

            <label for="phone">Numéro de téléphone :</label>
            <input type="text" id="phone" name="phone" required><br>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea><br>

            <input type="submit" name="submit" value="Envoyer">
        </form>
    </div>
</section>
<ul>
    <li><a href="./front/voitures.php">Voitures</a></li>
    <li><a href="./front/temoignages.php">Témoignages</a></li>
    <li><a href="./front/contact.php">Contact</a></li>
</ul>
</body>
</html>