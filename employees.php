<?php
require_once '../back/config.php';

$queryMessage = "SELECT * FROM messages";
$stmtMessage = $conn->query($queryMessage);
$dataMessage = $stmtMessage->fetchAll(PDO::FETCH_ASSOC);

$queryTemoignages = "SELECT * FROM temoignages";
$stmtTemoignages = $conn->query($queryTemoignages);
$dataTemoignages = $stmtTemoignages->fetchAll(PDO::FETCH_ASSOC);

$queryUsers = "SELECT * FROM users";
$stmtUsers = $conn->query($queryUsers);
$dataUsers = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

$queryVoitures = "SELECT * FROM voitures";
$stmtVoitures = $conn->query($queryVoitures);
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
       <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .thumbnail {
            width: 100px;
            height: auto;
        }
    </style>
    </style>
    <header>
        <h1>Garage XYZ - Administrateur</h1>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataUsers as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMessage as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                        <?php foreach ($dataUsers as $user): ?>
                            <?php if (isset($row['utilisateur_id'])): ?>
                                <?php echo $user['nom']; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataTemoignages as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['commentaire']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td><?php echo $row['approuve']; ?></td>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataVoitures as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['marque']; ?></td>
                    <td><?php echo $row['modèle']; ?></td>
                    <td><?php echo $row['année']; ?></td>
                    <td><?php echo $row['prix']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" alt="Image" class="thumbnail"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<ul>
        <li><a href="voitures.php">Voitures</a></li>
        <li><a href="temoignages.php">Témoignages</a></li>
        <li><a href="espace_admin.php">Espace Administrateur</a></li>
        <li><a href="user.php">Employer</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    
</html>