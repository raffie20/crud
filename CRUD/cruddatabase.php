<?php
// hier wordt er een database connectie gemaakt
$servernaam = "localhost";
$database = "crud";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servernaam;dbname=$database", $username, $password);  //connectie maken met de database
?>

<?php
// Hoogste aantal minuten te laat wordt hier geselecteerd met select
$sql = "SELECT MAX(Minuten_Laat) AS max_minuten FROM telaat";
//voert de query uit
$result = $conn->query($sql);
// haalt de rij op met de fetch functie
$row = $result->fetch();
// haalt de waarde van de kolom op
$max_minuten = $row['max_minuten'];

// Gemiddeld aantal minuten te laat
$sql = "SELECT AVG(Minuten_Laat) AS avg_minuten FROM telaat";
//voert de query uit
$result = $conn->query($sql);
// haalt de rij op met de fetch functie
$row = $result->fetch();
// haalt de waarde van de kolom op
$avg_minuten = $row['avg_minuten'];


// Totaal aantal minuten te laat
// Hier wordt de query gemaakt
$sql = "SELECT SUM(Minuten_Laat) AS sum_minuten FROM telaat";
// Hier wordt de query uitgevoerd
$result = $conn->query($sql);
// Hier wordt de rij opgehaald
$row = $result->fetch();
// Hier wordt de waarde van de kolom opgehaald
$sum_minuten = $row['sum_minuten'];
?>


