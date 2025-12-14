<?php
$host = "localhost";
$user = "root";
$password = "mysql";
$database = "biblio";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$sql = "SELECT Id_emprunt, Date_emprunt, Duree, Id_Adherent, Reference_livre FROM EMPRUNTS";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Emprunts</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<h2>Liste des Emprunts</h2>
<table>
    <tr>
        <th>ID Emprunt</th><th>Date</th><th>Durée</th><th>ID Adhérent</th><th>Référence Livre</th>
    </tr>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Id_emprunt']."</td>";
            echo "<td>".$row['Date_emprunt']."</td>";
            echo "<td>".$row['Duree']."</td>";
            echo "<td>".$row['Id_Adherent']."</td>";
            echo "<td>".$row['Reference_livre']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Aucun emprunt trouvé.</td></tr>";
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>