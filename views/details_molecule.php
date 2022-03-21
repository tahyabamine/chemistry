<?php include view('parties/header'); ?>

<h1><?= $jeu->nom ?></h1>

<dl>
    <dt>Nom de la molecule</dt>
    <dd><?= $molecule->nom ?></dd>

    <dt>La formule chimique du molecule</dt>
    <dd><?= cemichalFormula($molecule->formule) ?></dd>

    <dt>Elle est composee de</dt>

    <?php foreach ($atomes as $atome) : ?>
    <dd> <?= $atome->qtte_atome ?> atomes de l'<?= $atome->atome_nom ?> et </dd>
    <?php endforeach; ?>
</dl>

<?php include view('parties/footer'); ?>