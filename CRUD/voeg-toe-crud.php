<?php

$servernaam = "localhost";
$database = "crud";
$username = "root";
$password = "";
// er wordt hier een database connectie gemaakt 
$conn = new PDO("mysql:host=$servernaam;dbname=$database", $username, $password);

// Hier wordt de verzoekmethode Post gebruikt, daarmee worden de gegevens uit de formulier gehaald en opgeslagen in variabelen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Naam           = $_POST["Naam"];
    $Klas           = $_POST["Klas"];
    $Minuten_Laat   = $_POST["Minuten_Laat"];
    $Reden_Laat      = $_POST["Reden_Laat"];
}

// if statement voor als de gebruiker een getal onder de 0 wilt invullen
if ($Minuten_Laat < 0) {
    echo "Fout: Bij minuten te laat!, Kunt u het opnieuw invullen?";
}
// hier wordt er een nieuwe rij toe gevoegd aan de tabel telaat, er worden ook placeholders gebruikt.
// de variabelen worden in de tabel toegevoegd $Naam, $KLas, $Minuten_laat en $Reden_Laat
// placeholders is :Naam, :Klas, :Minuten_Laat en :Reden_Laat
$sql="INSERT INTO telaat (Naam, Klas, Minuten_Laat, Reden_Laat) VALUES (:Naam, :Klas, :Minuten_Laat, :Reden_Laat)";
// hier wordt de query voorbereid 
$sql = $conn->prepare($sql);
// placeholders worden hier vervangen
// hier wordt de query uitgevoerd, de waardes van de placeholders worden vervangen door de variabele $Naam, $Klas, $Minuten_Laat en $Reden_Laat
$sql->execute([':Naam' => $Naam, ':Klas' => $Klas, ':Minuten_Laat' => $Minuten_Laat, ':Reden_Laat' => $Reden_Laat]);

header("Location: crud.php"); 
?>