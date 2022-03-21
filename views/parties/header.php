<!doctype html>
<html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <nav class="nav justify-content-center">
                <a class="nav-link active" href="<?= url('home') ?>">Accueil</a>
                <a class="nav-link active" href="<?= url('liste') ?>">Liste de molecules</a>
                <a class="nav-link active" href="<?= url('create') ?>">Ajouter une molecule</a>
                <a class="nav-link active" href="<?= url('periodic') ?>">Periodic Table</a>
                <?php if (empty($_SESSION['pseudo'])) : ?>
                <a class="nav-link active" href="<?= url('connexion') ?>">Connexion</a>

                <?php else : ?>
                <a class="nav-link active" href="<?= url('deconnexion') ?>">Deconnexion</a>
                <?php endif; ?>
            </nav>