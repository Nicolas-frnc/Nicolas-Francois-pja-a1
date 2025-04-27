<?php

require_once("connexion.php"); // me permet de récupérer ma connexion

if(isset($_POST['submit'])) { // si le formulaire de creation est soumis
    // var_dump($_POST);
    $title = $_POST["title"];
    $author = $_POST["author"];
    $date_publication = $_POST["date_publication"];


    try {
        $stmt = $pdo->prepare("INSERT INTO book (title, author, date_publication, category_idcategory) VALUES( :title, :author, :date_publication, :category )");

        $stmt->execute([ // execute la requête et evite les injections
            "title" => $title,
            "author" => $author,
            "date_publication" => $date_publication,
            "category" => 1,
        ]);

    } catch (PDOException $e) { // si une erreur
        echo $e->getMessage();
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') { // si l'action est delete
    $idbook = $_GET['id_book'];

    try {
        $stmt = $pdo->prepare("DELETE FROM book WHERE id_book = :id_book"); // prépare

        $stmt->execute([ // execute
            "id_book" => $idbook,
        ]);

        echo "Le livre a bien été supprimé !";  // notif

    } catch (PDOException $e) { // erreur
        echo $e->getMessage();
    }
}


if(isset($_GET['action']) && $_GET['action'] == 'modify') { // si l'action est modify
    $idbook = $_GET['id_book']; // récupérer l'id du livre

    try {

        $stmt = $pdo->prepare("SELECT * FROM book WHERE id_book = :id_book");
        $stmt->execute([
            "id_book" => $idbook,
        ]);

        $book_to_edit = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if(isset($_POST['submit-edit'])) {
    $idbook = $_POST['id_book'];
    $title = $_POST['title-edit'];
    $author = $_POST['author-edit'];
    $date_publication = $_POST['date_publication-edit'];

    try {
        $stmt = $pdo->prepare("UPDATE book SET title = :title, author = :author, date_publication = :date_publication WHERE id_book = :id_book");

        $stmt->execute([
            "id_book" => $idbook,
            "title" => $title,
            "author" => $author,
            "date_publication" => $date_publication
        ]);

        echo "Le livre a bien été modifié !";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

/////
///// SELECT
/////
$stmt = $pdo->query("SELECT * FROM book"); // PDO STATEMENT
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<h1>Mes livres en BDD</h1>

<table border="1">
    <thead>
    <th>Titre</th>
    <th>Auteur</th>
    <th>Date</th>
    <th>Catégorie</th>
    <th>Supprimer</th>
    <th>Modifier</th>
    </thead>

    <tbody>

    <?php
    foreach ($books as $key => $book) {
        echo "<tr>";
        echo "<td>" . $book["title"] . "</td>";
        echo "<td>" . $book["author"] . "</td>";
        echo "<td>" . $book["date_publication"] . "</td>";
        echo "<td>" . $book["category_idcategory"] . "</td>";
        echo "<td> <a href='?id_book=". $book["id_book"] . "&action=delete'> Supprimer </a> </td>";
        echo "<td> <a href='?id_book=". $book["id_book"] . "&action=modify'> Modifier </a> </td>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>

<br>
<br>

<form method="POST">
    <p>Formulaire de modification</p>


    <input type="hidden" name="id_book" value="<?= isset($book_to_edit) ? $book_to_edit['id_book'] : '' ?>">

    <label for="title-edit">Titre:</label>
    <input type="text" name="title-edit" id="title-edit" placeholder="Titre"
           value="<?= isset($book_to_edit) ? $book_to_edit['title'] : '' ?>">

    <label for="author-edit">Auteur:</label>
    <input type="text" name="author-edit" id="author-edit" placeholder="Auteur"
           value="<?= isset($book_to_edit) ? $book_to_edit['author'] : '' ?>">

    <label for="date_publication-edit">Date:</label>
    <input type="date" name="date_publication-edit" id="date_publication-edit"
           value="<?= isset($book_to_edit) ? $book_to_edit['date_publication'] : '' ?>">

    <input type="submit" name="submit-edit" value="Modifier livre">
</form>

<form method="POST">
    <p>Formulaire de création</p>

    <label for="title">Titre:</label>
    <input type="text" name="title" id="title" placeholder="Titre">

    <label for="author">Auteur:</label>
    <input type="text" name="author" id="author" placeholder="Auteur">

    <label for="date_publication">Date:</label>
    <input type="date" name="date_publication" id="date_publication">

    <input type="submit" name="submit" value="Créer livre">
</form>

</body>
</html>