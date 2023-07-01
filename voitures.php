<?php
include_once '../footer.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Liste des voitures d'occasion</title>
</head>
<body>
    <style>
       
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

li {
    display: inline-block;
    margin-right: 10px;
}

h1 {
    text-align: center;
}

.filters {
    text-align: center;
    margin: 20px 0;
}

.car-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-gap: 20px;
    padding: 20px;
}

.car {
    background-color: #f5f5f5;
    padding: 10px;
    text-align: center;
}

.car h3 {
    margin-top: 0;
}

.car p {
    margin-bottom: 5px;
}

.car-image {
    width: 100%;
    height: auto;
    cursor: pointer;
    transition: transform 0.3s;
}

.car-image:hover {
    transform: scale(1.1);
}
</style>
    <ul>
        
        <li><a href="temoignages.php">Témoignages</a></li>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="contact.php">Contact</a></li>
        
    </ul>
    <h1>Liste des voitures d'occasion</h1>

    <div class="filters">
        <form method="GET" action="">
            <label for="price-range">Fourchette de prix :</label>
            <input type="number" name="min-price" placeholder="Min" min="0">
            <input type="number" name="max-price" placeholder="Max" min="0">
            <button type="submit">Filtrer</button>
        </form>
    </div>

    <div class="car-list">
        <?php
        // Configuration de la connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "garage";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL pour récupérer les voitures
            $query = "SELECT * FROM voitures";
            $stmt = $conn->query($query);

            // Afficher les voitures
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="car">';
                echo '<h3>' . $row['marque'] . ' ' . $row['modèle'] . '</h3>';
                echo '<p>Année : ' . $row['année'] . '</p>';
                echo '<p>Prix : ' . $row['prix'] . ' €</p>';
                echo '<img class="car-image" src="' . $row['image'] . '" alt="' . $row['marque'] . ' ' . $row['modèle'] . '">';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion ou d'exécution de la requête : " . $e->getMessage();
        }
        ?>
    </div>
    
    <script src="script.js"></script>
</body>
</html>