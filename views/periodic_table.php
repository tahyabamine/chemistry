<?php require_once view('parties/header'); ?>

<h1>Periodic Table</h1>

<span class="d-flex  flex-wrap ">
    <?php foreach ($atomes as $atome) : ?>
    <button class="btn btn-info m-1 "><?= $atome->symbole ?></button>
    <?php endforeach; ?>
</span>

<?php require_once view('parties/footer'); ?>