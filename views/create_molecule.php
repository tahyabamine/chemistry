<?php include view('parties/header'); ?>
<h1>Ajouter une molecule</h1>

<form method="post">
    <?php if (!empty($errors)) erreursFormulaire($errors); ?>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['token'] ?>" />

    <div class="form-group row">
        <label for="nom" class="col-sm-12 col-form-label">Nom de la molecule</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="formule" class="col-sm-12 col-form-label">La formule chimique de la molecule</label>
        <div class="col-sm-12">
            <input type="formule" class="form-control" name="formule" id="formule"
                placeholder="La formule chimique de la molecule" required>
        </div>
    </div>


    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>
<?php include view('parties/footer'); ?>