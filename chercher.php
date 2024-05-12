<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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


    <div class="parent">
        <form action="" method="post">
            <label for="">Code</label>
            <input class="chercher" type="text" name="code" chercher>
            <input type="submit" name="afficher" value="chercher">
        </form>
    
    </div>

    <?php
// Assuming you already have a database connection established
$connexion = new mysqli("localhost", "root", "", "gestion stagier");

// Check the connection
if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}

// Handle form submission
if(isset($_POST["afficher"])) {
    // Retrieve data from the form
    $code = $_POST['code'];

    // SQL query for insertion
    $query = "SELECT * FROM stagier WHERE code = ('$code')";
    

    $result = $connexion->query($query);

    // Affichage des données dans un tableau HTML avec Bootstrap styles
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered mt-4'>

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



// Close the database connection
$connexion->close();
?>
</body>
</html>