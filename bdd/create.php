<h1>create.php</h1>
<?php 
echo "<pre>" ; 
print_r($_POST);
echo "</pre>";

 require_once "../includes/db.php";
 $query = $bdd->prepare("
     INSERT INTO voyage 
    SET
    photo=:photo,
    nom_de_la_destination=:nom_de_la_destination,
    pays=:pays,
    ville=:ville,
    avis=:avis,
    nom=:nom,
    email=:email,
    date_de_depart=:date_de_depart,
    date_de_retour=:date_de_retour
");

$query->execute([
    'photo' => $_POST['photo'],
    'nom_de_la_destination' => $_POST['nom_de_la_destination'],
    'pays' => $_POST['pays'],
    'ville' => $_POST['ville'],
    'avis' => $_POST['avis'],
    'nom' => $_POST['nom'],
    'email' => $_POST['email'],
    'date_de_depart' => $_POST['date_de_depart'],
    'date_de_retour' => $_POST['date_de_retour']
]);
header("Location: /bdd/index.php?success=created");
exit();