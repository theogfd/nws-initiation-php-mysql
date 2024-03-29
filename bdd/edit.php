<?php
$titre = "Modifier votre destination";

require_once "../includes/db.php";
include '../partials/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $bdd->prepare("SELECT * FROM voyage WHERE id = :id");
    $query->execute([':id' => $id]);
    $voyage = $query->fetch(PDO::FETCH_OBJ);

    if (!$voyage) {
        echo "Destination non trouvée.";
        exit();
    }
} else {
    echo "Identifiant de destination non spécifié.";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire, même si certains champs sont vides
    $nom_de_la_destination = $_POST['nom_de_la_destination'] ?? $voyage->nom_de_la_destination;
    $pays = $_POST['pays'] ?? $voyage->pays;
    $ville = $_POST['ville'] ?? $voyage->ville;
    $avis = $_POST['avis'] ?? $voyage->avis;
    $nom = $_POST['nom'] ?? $voyage->nom;
    $email = $_POST['email'] ?? $voyage->email;

    // Mettre à jour les données dans la base de données
    $query = $bdd->prepare("UPDATE voyage SET nom_de_la_destination = :nom_de_la_destination, pays = :pays, ville = :ville, avis = :avis, nom = :nom, email = :email WHERE id = :id");
    $query->execute([
        ':nom_de_la_destination' => $nom_de_la_destination,
        ':pays' => $pays,
        ':ville' => $ville,
        ':avis' => $avis,
        ':nom' => $nom,
        ':email' => $email,
        ':id' => $id
    ]);

    // Rediriger l'utilisateur vers la page d'index après la mise à jour
    header("Location: /bdd/index.php?success=updated");
    exit();
}
?>

<main class="container">
    <h1>Modifier Destination</h1>

    <form action="edit.php?id=<?= $id ?>" method="POST">
        <label for="nom_de_la_destination">Nom de la destination</label>
        <input type="text" id="nom_de_la_destination" name="nom_de_la_destination" value="<?= htmlspecialchars($voyage->nom_de_la_destination) ?>">

        <label for="pays">Pays</label>
        <input type="text" id="pays" name="pays" value="<?= htmlspecialchars($voyage->pays) ?>">

        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($voyage->ville) ?>">

        <label for="avis">Avis sur la destination</label>
        <textarea id="avis" name="avis"><?= htmlspecialchars($voyage->avis) ?></textarea>

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($voyage->nom) ?>">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($voyage->email) ?>">

        <button type="submit">Mettre à jour</button>
    </form>