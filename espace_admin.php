<?php
require_once '../back/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
    <title>Garage XYZ - Espace Admin</title>
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
<header>
        <img src="https://cdn1.vectorstock.com/i/1000x1000/17/65/auto-center-garage-service-and-repair-logo-vector-8841765.jpg" alt="Logo Garage XYZ">
        <h1>Garage XYZ</h1>
    </header>
    <h1>Espace Admin</h1>

    <h2>Connexion</h2>
    <form action="admin.php" method="POST">
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>

    <ul>
        <li><a href="./voitures.php">Voitures</a></li>
        <li><a href="./temoignages.php">Témoignages</a></li>
        <li><a href="./espace_admin.php">Espace Administrateur</a></li>
    </ul>
</body>
<li><a href="../front/admin.php">Espace Administrateur</a></li>
</html>