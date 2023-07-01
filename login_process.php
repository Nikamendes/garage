<?php
require_once './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        // Les informations de connexion sont valides
       //redirigez l'utilisateur vers une page protégée
        header("Location: ./front/admin.php");
        exit();
    }
    } else {
        // Les informations de connexion sont incorrectes
        // Affichez un message d'erreur 
        echo "Les informations de connexion sont incorrectes.";
    }
}
?>