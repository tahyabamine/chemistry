<?php include view('parties/header'); ?>

<h1><?= $jeu->nom ?></h1>

<dl>
    <dt>Nom de la molecule</dt>
    <dd><?= $molecule->nom ?></dd>

    <dt>La formule chimique du molecule</dt>
    <dd><?= chemichalFormula($molecule->formule) ?></dd>

    <dt>La masse moleculaire = </dt>
    <dd><?= $molecule_masse->masse_moleculaire ?> g/mol</dd>

    <dt>Elle est composée de:</dt>

    <?php foreach ($atomes as $atome) : ?>
    <dd> - <?= $atome->qtte_atome ?> atome(s) de (ou du) <?= $atome->atome_nom ?> </dd>
    <?php endforeach; ?>
</dl>

<?php include view('parties/footer'); ?>