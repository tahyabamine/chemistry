<?php include view('parties/header'); ?>

<h1><?= $jeu->nom ?></h1>

<dl>
    <dt>La masse de la molecule <?= $molecule->nom ?> =</dt>
    <dd><?= $molecule->masse_moleculaire ?> g/mol</dd>


</dl>

<?php include view('parties/footer'); ?>