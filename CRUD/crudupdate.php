<?php
//Hier wordt de inhoud van het bestand ingevoegd
require "cruddatabase.php";

// Hier worden er lege strings geplaatst die moet worden ingevuld
$id = "";
$Naam = "";
$Klas = "";
$Minuten_Laat = "";
$Reden_Laat = "";

// hier wordt de verzoekmethode GET gebruikt die haalt de id uit de url 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Hier wordt er gekeken of er een id parameter is ingesteld in de GET-verzoek
    // hier controleert de !isset of de id parameter is ingesteld, 
    // isset is een ingebouwde functie die controleert of de variabele is ingesteld en niet NULL is 
    if (!isset($_GET['id'])) {
        header("Location: crud.php");
    }
    // hier wordt de waarde van de id uit de url gehaald, en wordt opgeslagen in de variabele $id
    $id = $_GET["id"];
    // :id is een placeholder wordt vervangen door een echte waarde
    $stmt = $conn->prepare("SELECT * FROM telaat WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    //hier wordt de waarden opgehaald uit de $row en opgeslagen in variabele, de sleutels zijn kolommen in de tabel
    $Naam = $row["Naam"];
    $Klas = $row["Klas"];
    $Minuten_Laat = $row["Minuten_Laat"];
    $Reden_Laat = $row["Reden_Laat"];

    // server_request method is een functie die vertelt welke type verzoek is gebruikt
    // hier wordt de POST verzoek gebruikt om de gegevens te updaten
    // als de request method post wordt gebruikt dan wordt het volgende uitgevoerd
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Hier worden de gegevens uit het formulier gehaald en opgeslagen in variabelen
    // Wordt gedaan door de POST methode via de websiteserver
    // Haalt de waarde op die is verzonden met de post "id" wordt opgeslagen in de var = $id
    $id = $_POST["id"];
    $Naam = $_POST["Naam"];
    $Klas = $_POST["Klas"];
    $Minuten_Laat = $_POST["Minuten_Laat"];
    $Reden_Laat = $_POST["Reden_Laat"];

        // Hier wordt de query gemaakt om de gegevens te updaten
        // Execute voert de query uit
        // :Naam, :Klas enz zijn allemaal placeholders 
        // Na de execute code wordt de placeholder vervangen door de variabele
        $sql = "UPDATE telaat SET Naam = :Naam, Klas = :Klas, Minuten_Laat = :Minuten_Laat, Reden_Laat = :Reden_Laat WHERE id = :id";
        $sql= $conn->prepare($sql);
        $sql->execute([
        // Hier wordt er een placeholder gemaakt die wordt vervangen door de variabele, de placeholder is :naam wordt vervanger door $naam
        // zoals 'klas' => $klas
            'Naam' => $Naam,
            'Klas' => $Klas,
            'Minuten_Laat' => $Minuten_Laat,
            'Reden_Laat' => $Reden_Laat,
            'id' => $id
        ]);
        // Hier wordt de gebruiker terug gestuurd naar de crud.php pagina
        header("Location: crud.php");
     
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>

    <style>
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
<div>
    <h1>Update Formulier</h1>
    <!-- hier wordt post geruikt om de gegevens via de server te krijgen -->
    <form action="crudupdate.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Naam:</label>
        <input type="text" id="Naam" name="Naam" value="<?php echo $Naam; ?>" required><br>
        <label for="klas">Klas:</label>
        <input type="text" id="Klas" name="Klas" value="<?php echo $Klas; ?>" required><br>
        <label for="Minuten_Laat">Minuten te laat:</label>
        <input type="number" id="Minuten_Laat" name="Minuten_Laat" min=0 value="<?php echo $Minuten_Laat; ?>" required><br>
        <label for="Reden_Laat">Reden te laat:</label>
        <input type="text" id="Reden_Laat" name="Reden_Laat" value="<?php echo $Reden_Laat; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
