<?php



use PDO;
use Config;

function erreursFormulaire(array $errors)
{
    foreach ($errors as $error) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?= $error ?>
</div>
<?php }
}
function validateformule($formule)
{
    $reg = '#[A-Z][a-z]?\d*|\((?:[^()]*(?:\(.*\))?[^()]*)+\)\d+#';
    return  boolval(preg_match($reg, $formule));
}

function redirection($route)
{
    header('Location: ' . url($route));
    die;
}
function chemichalFormula($molecule)
{

    return preg_replace('/(\d+)/', '<sub>$1</sub>', $molecule);
}
function url($route)
{
    return 'index.php?route=' . $route;
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

function view($vue)
{
    return __DIR__ . '/views/' . $vue . '.php';
}

/**
 * 
 * Fait le require adapté par rapport à un FQCN
 * (par exemple require __DIR__ . '/Controllers/HomeController.php')
 * 
 * @param string $fqcn Par exemple Controllers\HomeController
 */
function FQCNEtRequire($fqcn)
{
    require_once __DIR__ . '/' . str_replace('\\', '/', $fqcn) . '.php';
}

function seConnecter()
{
    return new PDO('mysql:host=' . Config::DATABASE_HOST . ';dbname=' . Config::DATABASE_NAME, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
}