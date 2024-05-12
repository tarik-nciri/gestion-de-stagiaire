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
    <?php
    // Assuming you already have a database connection established
    $connexion = new mysqli("localhost", "root", "", "gestion stagier");

    // Check the connection
    if ($connexion->connect_error) {
        die("Connection failed: " . $connexion->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $code = $_POST['code'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $typeBac = $_POST['typeBac'];

        // SQL query for insertion
        $query = "INSERT INTO stagier (code, nom, prenom, typeBac ) VALUES ('$code', '$firstName', '$lastName', '$typeBac')";

        // Execute the query
        if ($connexion->query($query) === TRUE) {
            echo "Record inserted successfully!";
        } else {
            echo "Error: " . $query . "<br>" . $connexion->error;
        }
    }

    // Close the database connection
    $connexion->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Data</title>
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


        <div class="containe">
            <div class="container mt-5">
                <h2 class="mb-4">Insert Data</h2>
                <!-- Form for user input -->
                <form method="post" action="">
                    <div class="nouveau">
                        <div class="form-group">
                            <label for="code">Code:</label>
                            <input type="text" class="form-control" name="code" required>
                        </div>

                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" name="firstName" required>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" name="lastName" required>
                        </div>

                        <div class="form-group">
                            <label for="typeBac">typeBac:</label>
                            <select name="typeBac" id="">
                                <option value="S.M">S.M</option>
                                <option value="S.P">S.P</option>
                                <option value="S.X">S.X</option>
                                <option value="S.X">S.H</option>
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </form>
            </div>

            </header>
            
            <!-- Bootstrap JS and jQuery -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
    $age = readline();
    echo $age;
    ?>
</body>

</html>