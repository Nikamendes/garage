<?php
require_once '../back/config.php';

// Vérifier si l'ID de l'employé est passé dans la requête
if (isset($_GET['id'])) {
    $usersId = $_GET['id'];

    // Préparer la requête de suppression
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $usersId);

    // Exécuter la requête de suppression
    if ($stmt->execute()) {
        // Rediriger vers la page d'administration après la suppression
        header("Location: admin.php");
        exit();
    } else {
        // Gérer les erreurs de suppression
        echo "Une erreur s'est produite lors de la suppression de l'employé.";
    }
}
?>




