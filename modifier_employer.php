<?php
// Configuration de la connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garage";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
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
</head>
<body>
    <header>
        <h1>Garage XYZ - Administrateur</h1>
    </header>

    <div class="container">
        <?php
        // Vérifier si l'ID de l'utilisateur est spécifié
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];

            // Vérifier si le formulaire a été soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les valeurs du formulaire
                $name = $_POST['name'];
                $email = $_POST['email'];

                // Mettre à jour les données de l'utilisateur dans la base de données
                $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
                $statement = $conn->prepare($query);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':id', $userId);
                $statement->execute();

                // Rediriger vers la page des utilisateurs après la modification
                header("Location: admin.php");
                exit();
            }

            // Récupérer les données de l'utilisateur à partir de la base de données
            $query = "SELECT * FROM users WHERE id = :id";
            $statement = $conn->prepare($query);
            $statement->bindValue(':id', $userId);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            // Vérifier si l'utilisateur existe
            if ($user) {
                $name = htmlspecialchars($user['name']);
                $email = htmlspecialchars($user['email']);
                ?>

                <h2>Modifier un Employeur</h2>

                <form action="" method="POST">
                    <div>
                        <label for="name">Nom:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div>
                        <input type="submit" value="Modifier">
                    </div>
                </form>

                <a class="back-link" href="admin.php">&larr; Retour à la liste des utilisateurs</a>

                <?php
            } else {
                echo "<p>L'utilisateur n'existe pas.</p>";
            }
        } else {
            echo "<p>Aucun ID d'utilisateur spécifié.</p>";
        }
        ?>
    </div>
</body>
<ul>
        <li><a href="./front/voitures.php">Voitures</a></li>
        <li><a href="./front/temoignages.php">Témoignages</a></li>
        <li><a href="./front/espace_admin.php">Espace Administrateur</a></li>
        <li><a href="./front/user.php">Employer</a></li>
        <li><a href="./front/contact.php">Contact</a></li>
    </ul>
</html>