<?php

require_once("../includes/connexion.php"); // me permet de récupérer ma connexion

if(isset($_POST['submit'])) { // si le formulaire de creation est soumis
    // var_dump($_POST);
    $titre_support = $_POST["titre_support"];
    $email_support = $_POST["email_support"];
    $report_support = $_POST["report_support"];

    try {

        $stmt = $pdo->prepare("INSERT INTO ticket_support (titre_support, email_support, report_support)
    VALUES( :titre_support, :email_support, :report_support )");

        $stmt->execute([ // execute la requête et evite les injections
            "titre_support" => $titre_support,
            "email_support" => $email_support,
            "report_support" => $report_support,
        ]);

    } catch (PDOException $e) { // si une erreur
        echo $e->getMessage();
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') { // si l'action est delete
    $id_ticket = $_GET['id_ticket'];

    try {
        $stmt = $pdo->prepare("DELETE FROM ticket_support WHERE id_ticket = :id_ticket"); // prépare

        $stmt->execute([ // execute
            "id_ticket" => $id_ticket,

        ])
        ;

        echo "Le ticket a bien été supprimé !";  // notif

    } catch (PDOException $e) { // erreur
        echo $e->getMessage();
    }
}


if(isset($_GET['action']) && $_GET['action'] == 'modify') { // si l'action est modify
    $id_ticket = $_GET['id_ticket']; // récupere l'id du ticket

    try {

        $stmt = $pdo->prepare("SELECT * FROM ticket_support WHERE id_ticket = :id_ticket");
        $stmt->execute([
            "id_ticket" => $id_ticket,


        ]);


        $ticket_to_edit = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo $e->getMessage();


    }
}

if(isset($_POST['submit-edit'])) {
    $id_ticket = $_POST['id_ticket'];
    $titre_support = $_POST['titre_support-edit'];
    $email_support = $_POST['email_support-edit'];
    $report_support = $_POST['report_support-edit'];


    try {

        $stmt = $pdo->prepare("UPDATE ticket_support SET titre_support = :titre_support, email_support = :email_support, report_support = :report_support WHERE id_ticket = :id_ticket");

        $stmt->execute([
            "id_ticket" => $id_ticket,
            "titre_support" => $titre_support,
            "email_support" => $email_support,
            "report_support" => $report_support
        ]);

        echo "Le ticket a bien été modifié !";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

/////
///// SELECT
/////
$stmt = $pdo->query("SELECT * FROM ticket_support"); // PDO STATEMENT
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


<form method="POST">
    <p>Formulaire de création</p>

    <label for="titre_support">Titre:</label>
    <input type="text" name="titre_support" id="titre_support" placeholder="Titre">


    <label for="email_support">Email:</label>
    <input type="text" name="email_support" id="email_support" placeholder="Email">

    <label for="report_support">Rapport:</label>
    <input type="text" name="report_support" id="report_support">

    <input type="submit" name="submit" value="Créer ticket">
</form>

</body>
</html>