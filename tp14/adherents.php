<?php
$host = "localhost";
$user = "root";
$password = "mysql";
$database = "biblio";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}


$sql = "SELECT Id_Adherent, Nom, Prenom, Date_naissance, Date_adhesion, Adresse, Num_tel, mail FROM adherent";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Adhérents</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 95%; margin: auto; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<h2>Liste des Adhérents</h2>
<table>
    <tr>
        <th>ID</th><th>Nom</th><th>Prénom</th><th>Date naissance</th>
        <th>Date adhésion</th><th>Adresse</th><th>Téléphone</th><th>Email</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Id_Adherent']."</td>";
            echo "<td>".$row['Nom']."</td>";
            echo "<td>".$row['Prenom']."</td>";
            echo "<td>".$row['Date_naissance']."</td>";
            echo "<td>".$row['Date_adhesion']."</td>";
            echo "<td>".$row['Adresse']."</td>";
            echo "<td>".$row['Num_tel']."</td>";
            echo "<td>".$row['mail']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Aucun adhérent trouvé.</td></tr>";
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>