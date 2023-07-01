<?php
require_once '../back/config.php';


// Vérifier si le formulaire de création d'utilisateur est soumis
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Utilisateur créé avec succès.";
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage XYZ - Utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    header img {
    max-width: 200px;
    height: auto;
}

body {
    margin: 0;
    padding: 0;
}

header {
    background-color: #f5f5f5;
    padding: 10px;
}

header img {
    display: inline-block;
    vertical-align: middle;
    width: 80px;
    height: 80px;
}

header h1 {
    display: inline-block;
    vertical-align: middle;
    margin: 0;
    margin-left: 10px;
}

ul.navbar {
    background-color: #f5f5f5;
    padding: 10px;
    margin: 0;
    display: flex;
    justify-content: flex-end;
    list-style: none;
}

ul.navbar li {
    display: inline-block;
    margin-right: 10px;
}

ul.navbar li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

section {
    padding: 20px;
}

footer {
    background-color: #f5f5f5;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
    text-align: center;
}

h2{
    text-align:center;
}
</style>
<body>
    <header>
        <img src="https://cdn1.vectorstock.com/i/1000x1000/17/65/auto-center-garage-service-and-repair-logo-vector-8841765.jpg" alt="Logo Garage XYZ">
        <h1>Garage XYZ</h1>
    </header>
   
    <section>
    <h2>Connexion Utilisateur</h2>
    <form method="POST" action="employees.php">
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit" name="submit">Se connecter</button>
    </form>
</section>

<ul>
        <li><a href="voitures.php">Voitures</a></li>
        <li><a href="temoignages.php">Témoignages</a></li>
        <li><a href="espace_admin.php">Espace Administrateur</a></li>
        <li><a href="user.php">Employer</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</body>
</html>






