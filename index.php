<?php
function chargerClasse($className)
{
    require $className .".php";
}

spl_autoload_register('chargerClasse');
require_once('bdd.php');
$manager=new PersonnageManager($db);
if (isset($_POST['creer']) && isser($_POST['nom'])) {
    # code...
    $perso= new Personnage(['nom'=>$_POST['nom']]);
    if (!$perso->nomValide()) {
        # code...
        $message="Nom Invalide";
        unset($perso);
    }elseif ($manager->exists($perso->nom())) {
        # code...
        $message="Nom deja pris";
        unset($perso);

    }
    else {
        # code...
        $manager->add($perso);
    }
}elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) {
    # code...
    if ($manager->exists($_POST['nom'])) {
        # code...
        $perso=$manager->get($_POST['nom']);
    }else {
        $message="Ce Nom n'existe pas";
    }
}















?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu Personnage</title>
</head>
<body>
    <h1>MINI JEU PERSONNAGE</h1>
    <div class="container">
        <div class="row">
            <div>
                <form action="" method="post">
              NOM :  <input type="text" name="nom" id="" placeholder="Nom du personnage"/><br><br>
                    <input type="button" value="CREER" name="creer"/>
                    <input type="button" value="CHOISIR" name="utiliser"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>