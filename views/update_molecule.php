<?php include view('parties/header'); ?>
<h1>Ajouter une molecule</h1>

<form method="post">
    <?php if (!empty($errors)) erreursFormulaire($errors); ?>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['token'] ?>" />


    <div class="form-group">
        <label for="atome">Atome</label>
        <select class="form-control" name="atome" id="atome">
            <?php foreach ($atomes as $atome) : ?>
            <option value="<?= $atome->id ?>"><?= $atome->nom ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Coefficient</label>
        <div class="col-sm-12">
            <input type="number" step="1" class="form-control" name="quantite" id="quantite"
                placeholder="Le coefficient" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>
<?php include view('parties/footer'); ?>