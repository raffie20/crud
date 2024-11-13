<?php
// de isset functie controleert of er een id is in het Get verzoek, die haalt het uit de url
if (isset($_GET['id'])) {
    // de id wordt uit de url gehaald en toegewezen aan de variabele id
    $id = $_GET['id'];
    require 'cruddatabase.php';

    // hier wordt er een query gevoerd
    $sql = "DELETE FROM telaat WHERE id = :id";
    $sql = $conn->prepare($sql);
    $sql->execute(['id' => $id]); 

    
    header("Location: crud.php"); 


    echo "Het record met de id: $id is verwijderd "; 
}
?>