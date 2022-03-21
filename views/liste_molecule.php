<?php require_once view('parties/header'); ?>

<h1>Tous les contacts</h1>

<div class="d-flex flex-wrap justify-content-around">
    <?php foreach ($molecules as $molecule) : ?>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $molecule->nom ?></h4>
            <h4 class="card-title"><?= cemichalFormula($molecule->formule) ?></h4>
            <p class="card-text">
                <a class="btn btn-primary" href="<?= url('details') ?>&id=<?= $molecule->id ?>">Voir plus</a>
                <a class="btn btn-warning" href="<?= url('update') ?>&id=<?= $molecule->id ?>">Modifier</a>
                <a class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')"
                    href="<?= url('delete') ?>&id=<?= $molecule->id ?>">Supprimer</a>
            </p>
            <!-- <p><small class="text-muted">Ce contact est un contact de <?= $contact->auteur ?></small></p> -->
        </div>
    </div>

    <?php endforeach; ?>
</div>

<?php require_once view('parties/footer'); ?>