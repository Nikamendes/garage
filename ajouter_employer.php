<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];

    

    // Insérer les données de l'utilisateur dans la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=database', 'username', 'password');
    $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->execute();


   // Rediriger vers une page de confirmation
    // header("Location: admin.php");
    // exit();

    //  Afficher un message de succès
    // echo "Utilisateur ajouté avec succès.";

    // Réinitialiser le formulaire
    // $name = '';
    // $email = '';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Employer</title>
    <style>
        
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

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
        }

        form h3 {
            margin-top: 0;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un utilisateur</h2>

        <form action="" method="POST">
            <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>
            <div>
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
    <ul>
        <li><a href="./front/voitures.php">Voitures</a></li>
        <li><a href="./front/temoignages.php">Témoignages</a></li>
        <li><a href="./front/espace_admin.php">Espace Administrateur</a></li>
        <li><a href="./front/user.php">Employer</a></li>
        <li><a href="./front/contact.php">Contact</a></li>
    </ul>
    <a href="admin.php">Retourn Administrateur</a>
</body>

</html>