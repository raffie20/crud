<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .button1, .button2 {
            background: linear-gradient(to right, #4CAF50, #8BC34A);
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;.
            
            cursor: pointer;
            transition background: 0.5s;
        }

        .button1:hover, .button2:hover {
            background: linear-gradient(to right, #8BC34A, #4CAF50);
        }
    </style>
</head>
<body>
<?php
require 'cruddatabase.php';

?>

<h1> Overzicht studenten die te laat zijn</h1>
<table>
    <tr>
        <th>Naam studenten</th>
        <th>Klas</th>
        <th>Mninuten telaat</th>
        <th>Redenen telaat </th>


    </tr>

    <?php
    $sqltelaat = "SELECT id, Naam, Klas, Minuten_Laat, Reden_Laat FROM telaat";
    $alletelaat = $conn->query($sqltelaat);

    foreach ($alletelaat as $telaat) {
        echo "<tr>";
        echo "<td>" . $telaat['Naam'] . "</td>";
        echo "<td>" . $telaat['Klas'] . "</td>";
        echo "<td>" . $telaat['Minuten_Laat'] . "</td>";
        echo "<td>" . $telaat['Reden_Laat'] . "</td>";
        echo "<td><a href='crudverwijder.php?id=" . $telaat['id'] . "' onclick='return confirm(\"Weet u zeker dat u dit record wilt verwijderen?\")'><button class='button2'>Verwijder</button></a></td>" ;        echo "</tr>";
        echo "<td><a href='crudupdate.php?id=" . $telaat['id'] . "'><button class='button1'>Update</button></a></td>";
    }
    ?>

</table>
<a href="crudformulier.php" <button class="button1">Weer eentje te laat!</button>
</a> </body>

<!-- hier wordt er een table gemaakt voor de Statistieken
hier wordt de variabele $max_minuten, $avg_minuten en $sum_minuten opgeroepen uit de cruddatabase
die kan worden opgeroepen door de require functie -->
<table>
    <p> Statistieken</p>
    <tr>
        <td>Hoogste aantal minuten te laat:</td>
        <td><?php echo $max_minuten; ?></td>
</tr>
<tr>
    <td>Gemiddeld aantal minuten te laat:</td>
    <td><?php echo $avg_minuten; ?></td>
</tr>
<tr>
    <td>Totaal aantal minuten te laat:</td>
    <td><?php echo $sum_minuten; ?></td>
</tr>
</table>







</body>
</html>