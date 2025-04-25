<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music App</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="login">
    <form action="connexion.php" method="post">
        <h2 class="h2-connextion">Connextion</h2>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required class="input">

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required class="input">

        <input type="submit" value="Se connecter" class="button-connextion">
    </form>
    <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>

</div>

