<?php
require_once './back/config.php';
include_once 'footer.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage XYZ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>


header img {
  width: 150px;
  height: auto;
}



body {
  margin: 0;
  padding: 0;
}


header {
  padding: 20px;
  text-align: center;
}

header img {
  max-width: 100%;
  height: auto;
}

h1 {
  margin-top: 10px;
}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  
}

li {
  display: inline-block;
}

li a {
  color: blue;
  text-decoration: none;
  padding: 10px;
}




.container {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
}

h2, h3 {
  margin-bottom: 10px;
}


footer {
 
  padding: 20px;
  text-align: center;
}

footer p {
  margin-bottom: 10px;
}

footer ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

footer li {
  margin-bottom: 5px;
}
</style>
<body>
    <header>
        <img src="https://cdn1.vectorstock.com/i/1000x1000/17/65/auto-center-garage-service-and-repair-logo-vector-8841765.jpg" alt="Logo Garage XYZ">
        <h1>Garage XYZ</h1>
    </header>

    <ul>
        <li><a href="./front/voitures.php">Voitures</a></li>
        <li><a href="./front/temoignages.php">Témoignages</a></li>
        <li><a href="./front/espace_admin.php">Espace Administrateur</a></li>
        <li><a href="./front/user.php">Employer</a></li>
        <li><a href="./front/contact.php">Contact</a></li>
    </ul>

        <h2>Bienvenue sur notre site de garage</h2>
       
  
    <h3>Nos services</h2>
    <ul>
        <li>Réparation mécanique</li>
        <li>Entretien régulier</li>
        <li>Diagnostic électronique</li>
        <li>Vente de Voitures de Ocasion</li>

</body>
</html>


