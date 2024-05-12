<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Stagiaires</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <img src="./image/Screenshot_2024-02-19_101052-removebg-preview.png" alt="" width="80" height="60">
            </div>
            <div class="container-fluid">
                <p><a href="index.html">Home</a></p>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <p>Stagier</p>
            </div>
        </nav>


    <div class="container mt-5">
        <h1 class="mb-4">Affichage des Stagiaires</h1>
        <form action="" method="post">
            <button type="submit" class="btn btn-primary" name="afficher">Afficher les Stagiaires</button>
        </form>

        <?php
        // Connexion à la base de données
        $connexion = new mysqli("localhost", "root", "", "gestion stagier");

        // Vérifier la connexion
        if ($connexion->connect_error) {
            echo("Erreur de connexion à la base de données: " . $connexion->connect_error);
        }
        
        // Vérifier si le bouton a été cliqué
        if(isset($_POST["afficher"])) {
            
            // Exécution de la requête SQL pour récupérer les données des stagiaires
            $content = "SELECT * FROM stagier";
            $result = $connexion->query($content);

            // Affichage des données dans un tableau HTML avec Bootstrap styles
            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered mt-4'>
                        <thead>
                            <tr>
                                <th>Code </th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Tele</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($data = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$data['code']."</td>
                            <td>".$data['nom']."</td>
                            <td>".$data['prenom']."</td>
                            <td>".$data['typeBac']."</td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p class='mt-4'>Aucun stagiaire trouvé.</p>";
            }
        }

        // Fermer la connexion à la base de données
        $connexion->close();
        ?>
    </div>

    <!-- Bootstrap  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
