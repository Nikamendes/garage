<?php
require_once '../back/config.php';

// Vérifier le formulaire de connexion 
if (isset($_POST['submit'])) {
    // Récupérer les données 
    $email = $_POST['email'];

    // Vérifier les informations de connexion
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $employeesContent = file_get_contents('../front/employees.php');
    echo $employeesContent;

    if ($user) {
        // Informations de connexion valides, rediriger vers la page des employés
        header("Location: ../front/employees.php");
        exit();
    } else {
        // Informations de connexion invalides, afficher un message d'erreur
        echo "Adresse e-mail incorrecte.";
    }
}
?>