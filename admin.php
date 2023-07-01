<?php
require_once '../back/config.php';

$queryUtilisateur = "SELECT * FROM utilisateur";
$stmtUtilisateur = $conn->prepare($queryUtilisateur);
$stmtUtilisateur->execute();
$dataUtilisateur = $stmtUtilisateur->fetchAll(PDO::FETCH_ASSOC);

$queryMessage = "SELECT * FROM messages";
$stmtMessage = $conn->prepare($queryMessage);
$stmtMessage->execute();
$dataMessage = $stmtMessage->fetchAll(PDO::FETCH_ASSOC);

$queryTemoignages = "SELECT * FROM temoignages";
$stmtTemoignages = $conn->prepare($queryTemoignages);
$stmtTemoignages->execute();
$dataTemoignages = $stmtTemoignages->fetchAll(PDO::FETCH_ASSOC);

$queryUsers = "SELECT * FROM users";
$stmtUsers = $conn->prepare($queryUsers);
$stmtUsers->execute();
$dataUsers = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

$queryVoitures = "SELECT * FROM voitures";
$stmtVoitures = $conn->prepare($queryVoitures);
$stmtVoitures->execute();
$dataVoitures = $stmtVoitures->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage XYZ - Administrateur</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <style>
        
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}


.thumbnail {
    width: 100px;
    height: auto;
}

.btn {
    padding: 6px 12px;
    margin: 3px;
    font-size: 14px;
    border: none;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}

.btn:hover {
    background-color: #45a049;
}
</style>

    <header>
        <h1>Garage XYZ - Administrateur</h1>
    </header>

    <h2>Liste des utilisateurs</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Date d'inscription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataUtilisateur as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nom']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['mot_de_passe']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_inscription']); ?></td>
                    <td>
    <a href="ajouter_admin.php"><button class="btn">Ajouter</button></a>
    <a href="modifier_admin.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Modifier</button></a>
    <a href="supprimer_admin.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Supprimer</button></a>
</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Liste des données - Messages</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Utilisateur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMessage as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    <td>
                        <?php foreach ($dataUsers as $user): ?>
                            <?php if (isset($row['utilisateur_id'])): ?>
                                <?php echo htmlspecialchars($user['nom']); ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    
                    <td>
    <a href="ajouter_employer.php"><button class="btn">Ajouter</button></a>
    <a href="modifier_employer.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Modifier</button></a>
    <a href="supprimer_employer.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Supprimer</button></a>
</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Liste des données - Témoignages</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Commentaire</th>
                <th>Note</th>
                <th>Approuvé</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataTemoignages as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nom']); ?></td>
                    <td><?php echo htmlspecialchars($row['commentaire']); ?></td>
                    <td><?php echo htmlspecialchars($row['note']); ?></td>
                    <td><?php echo htmlspecialchars($row['approuve']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_creation']); ?></td>
                    <td>
   
</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Liste des données - Employer</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataUsers as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
    <a href="ajouter_employer.php"><button class="btn">Ajouter</button></a>
    <a href="modifier_employer.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Modifier</button></a>
    <a href="supprimer_employer.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Supprimer</button></a>

</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Liste des données - Voitures</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Année</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataVoitures as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['marque']); ?></td>
                    <td><?php echo htmlspecialchars($row['modèle']); ?></td>
                    <td><?php echo htmlspecialchars($row['année']); ?></td>
                    <td><?php echo htmlspecialchars($row['prix']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Voiture" width="100"></td>
                    <td>
    <a href="ajouter_voiture.php"><button class="btn">Ajouter</button></a>
    <a href="supprimer_voiture.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Supprimer</button></a>
    <a href="modifier_voiture.php?id=<?php echo htmlspecialchars($row['id']); ?>"><button class="btn">Modifier</button></a>
</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    <ul>
        <li><a href="voitures.php">Voitures</a></li>
        <li><a href="temoignages.php">Témoignages</a></li>
        <li><a href="espace_admin.php">Espace Administrateur</a></li>
        <li><a href="user.php">Employer</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</body>
</html>