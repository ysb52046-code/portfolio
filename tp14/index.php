<?php
// Page d'accueil avec menu simple
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil -la base de données biblio</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .menu {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }
        .menu a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            display: inline-block;
        }
        .menu a:hover {
            background-color: #555;
        }
        .content {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="menu">
    <a href="index.php">Accueil</a>
    <a href="afficher_livres.php">Liste des livres</a>
    <a href="adherents.php">liste des adherents</a>
    <a href="afficher_emprunts.php">liste des  emprunts</a>
    <a href="afficher_livresemrp.php">Liste des livres qui ne sont pas empruntés</a>
    <a href="affichier_etat.php">liste deslivres en bon etat</a><br>
   <a href="etat.php">liste deslivres en mauvais etat</a>
   <a href="encienne.php">Livres publiés entre 1800 et 1900</a>
    
</div>

<div class="content">
    <h1>biblio amine bts sio 1.2</h1>
    <p>Utilisez le menu pour naviguer.</p>
</div>

</body>
</html>
