<?php
require_once '../back/config.php';

// Vérifier si le formulaire d'ajout de témoignage est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];
   
    $date_creation = date('Y-m-d H:i:s');

    // Insérer le témoignage dans la base de données
    $query = "INSERT INTO temoignages (nom, commentaire, note, approuve, date_creation) VALUES (:nom, :commentaire, :note, :approuve, NOW())";
$stmt = $conn->prepare($query);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':commentaire', $commentaire);
$stmt->bindParam(':note', $note);
$stmt->bindParam(':approuve', $approuve);
$stmt->execute();

    if ($stmt->execute()) {
        echo "Témoignage ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du témoignage.";
    }
}

// Fermer la connexion à la base de données
$conn = null;
?>



