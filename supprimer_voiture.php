<?php
require_once '../back/config.php';

// Vérifier si l'ID de la voiture à supprimer a été spécifié
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer la requête de suppression
    $query = "DELETE FROM voitures WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    // Exécuter la requête de suppression
    if ($stmt->execute()) {
        // Rediriger vers la page d'administration après la suppression
        header("Location: admin.php");
        exit();
    } else {
        // Gérer les erreurs de suppression
        echo "Une erreur s'est produite lors de la suppression de la voiture.";
    }
} else {
    // Rediriger vers la page d'administration si l'ID n'est pas spécifié
    header("Location: admin.php");
    exit();
}
?>