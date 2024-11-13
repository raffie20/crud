 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the document</title>

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
        .form-control {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-control[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
        }
        .form-control[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
<h1>Voeg Toe Formulier</h1>
<div>
    <form action="voeg-toe-crud.php" method="post">
        <label for="Naam">Naam:</label>
        <input  class="form-control" type="text" id="Naam" name="Naam" required><br>
        <label for="Klas">Klas:</label>
        <input class="form-control" type="text" id="Klas" name="Klas" required><br>
        <label for="Minuten_Laat">Minuten te laat:</label>
        <input class="form-control" type="text" id="Minuten_Laat" name="Minuten_Laat" min=0 required><br>
        <label for="Reden_Laat">Reden te laat:</label>
        <input class="form-control" type="text" id="Reden_Laat" name="Reden_Laat" required><br>
        <input class="form-control" type="submit" value="Invoegen">

    </form>

</div>
</body>
</html>