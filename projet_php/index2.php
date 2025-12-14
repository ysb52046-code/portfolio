<?php

$host = "localhost";
$user = "root";
$password = "mysql";
$database = "reservation_car";

$conn = mysqli_connect($host, $user, $password, $database);

// Vérification
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Requête SQL
$sql = "SELECT id_car, immatriculation, capacite, marque, modele, en_service FROM cars";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Cars</title>
    

    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>

</head>
<body>

<h2>Liste des Clients</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Immatriculation</th>
        <th>capacite</th>
        <th>marque</th>
        <th>modele</th>
        <th>En service</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id_car']."</td>";
            echo "<td>".$row['immatriculation']."</td>";
            echo "<td>".$row['capacite']."</td>";
            echo "<td>".$row['marque']."</td>";
            echo "<td>".$row['modele']."</td>";
            echo "<td>".$row['en_service']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Aucun client trouvé.</td></tr>";
    }

    mysqli_close($conn);
    ?>

</table>
<footer>
    <a href="index.php">Retour à l'accueil</a>
</footer>
</body>
</html>

