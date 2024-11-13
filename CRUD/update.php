<?php
require "database-connectie-gianoseynur.php";

$student_id = "";
$name = "";
$klas = "";
$tijd = "";
$reason = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['student_id'])) {
        header("Location: opdracht-D2-giano.php");
        exit();
    }

    $student_id = $_GET["student_id"];

    $stmt = $conn->prepare("SELECT * FROM student WHERE student_id = :student_id");
    $stmt->execute(['student_id' => $student_id]);
    $row = $stmt->fetch();

    if (!$row) {
        header("Location: opdracht-D2-giano.php");
        exit();
    }

    $name = $row["name"];
    $klas = $row["klas"];
    $tijd = $row["tijd"];
    $reason = $row["reason"];

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $klas = $_POST["klas"];
    $tijd = $_POST["tijd"];
    $reason = $_POST["reason"];

    if (empty($name) || empty($klas) || empty($tijd) || empty($reason)) {
        echo "Alle velden moeten ingevuld worden!";
    } else {
        $sql = "UPDATE student SET name = :name, klas = :klas, tijd = :tijd, reason = :reason WHERE student_id = :student_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'klas' => $klas,
            'tijd' => $tijd,
            'reason' => $reason,
            'student_id' => $student_id
        ]);

        header("Location: opdracht-D2-giano.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
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
<form action="update.php" method="POST">
    <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>">
    <label for="name">Naam Student:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
    <label for="klas">Klas:</label>
    <input type="text" id="klas" name="klas" value="<?php echo htmlspecialchars($klas); ?>" required>
    <label for="reason">Reden te laat:</label>
    <input type="text" id="reason" name="reason" value="<?php echo htmlspecialchars($reason); ?>" required>
    <label for="tijd">Minuten te laat:</label>
    <input type="number" id="tijd" name="tijd" value="<?php echo htmlspecialchars($tijd); ?>" required>
    <input type="submit" value="Update">
</form>
</body>
</html>
