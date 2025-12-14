<?php
$host = "localhost";
$user = "root";
$password = "mysql";
$database = "biblio";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$sql = "SELECT Reference_livre, description, Nbre_pages, ID_Auteur, Annee, Genre, Disponibilite, Nbre_emprunts, Etat, Nbre_exemplaire FROM LIVRES";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 95%; margin: auto; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<h2>Liste des Livres</h2>
<table>
    <tr>
        <th>Référence</th><th>Description</th><th>Pages</th><th>ID Auteur</th>
        <th>Année</th><th>Genre</th><th>Disponible</th><th>Nb Emprunts</th>
        <th>État</th><th>Nb Exemplaires</th>
    </tr>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Reference_livre']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['Nbre_pages']."</td>";
            echo "<td>".$row['ID_Auteur']."</td>";
            echo "<td>".$row['Annee']."</td>";
            echo "<td>".$row['Genre']."</td>";
            echo "<td>".($row['Disponibilite'] ? 'Oui' : 'Non')."</td>";
            echo "<td>".$row['Nbre_emprunts']."</td>";
            echo "<td>".$row['Etat']."</td>";
            echo "<td>".$row['Nbre_exemplaire']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Aucun livre trouvé.</td></tr>";
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>