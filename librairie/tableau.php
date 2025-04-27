<?php
require_once("connexion.php");

echo "<h1>Tableau des livres</h1>";
try {

    $stmt = $pdo->query("SELECT * FROM book");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    foreach (array_keys($rows[0]) as $column) {
        echo "<th>" . htmlspecialchars($column) . "</th>";
    }
    foreach ($rows as $row) {
        echo "<tr>"; // affiche chaques ligne du tableau
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
        echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


echo "<h1>Tableau des livres trié apres 2000</h1>";
try {

    $stmt = $pdo->query("SELECT * FROM book WHERE date_publication >= '2000-01-01' ORDER BY title asc "); // filtre de la requete sql pour avoir les bon resultat
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    foreach (array_keys($rows[0]) as $column) {
        echo "<th>" . htmlspecialchars($column) . "</th>";
    }
    foreach ($rows as $row) {
        echo "<tr>"; // affiche chaques ligne du tableau
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


?>