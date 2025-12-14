<?php
$host = "localhost";
$user = "root";
$password = "mysql";
$database = "biblio";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$sql = "SELECT Reference_livre, description, Genre, Etat FROM LIVRES WHERE Etat = 'BON'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livres en bon état</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<h2>Livres en bon état</h2>
<table>
    <tr>
        <th>Référence</th><th>Description</th><th>Genre</th><th>État</th>
    </tr>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Reference_livre']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['Genre']."</td>";
            echo "<td>".$row['Etat']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Aucun livre en bon état trouvé.</td></tr>";
    }
    mysqli_close($conn);
    ?>

</table>
</body>
</html>