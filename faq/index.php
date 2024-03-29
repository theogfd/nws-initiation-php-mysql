<?php
$titre="Proposez vôtre destination";

require_once "../includes/db.php";
include '../partials/header.php';
$query = $bdd->query("SELECT * FROM voyage ORDER BY id DESC");
$voyage = $query->fetchAll(PDO::FETCH_OBJ);

if (isset($_GET['success']))    {
    $message_type = "success";
    if ($_GET['success'] === "created") {
        $message = "Le formulaire a été ajouté avec succès.";
    }
    if ($_GET ['success'] === "deleted") {
        $message = "Le formulaire a été supprimé avec succès.";
    }
    if ($_GET ['success'] === "updated") {
        $message = "Le formulaire a été modifié avec succès.";
    }
    }
?>

<!--
<main class="container">
    <h1>Base de donnée</h1>
    <?php
    if (isset($message)) : ?>
        <p data-notice=">?= $message_type ?>">
            <span><?= $message ?></span>
            <i data-feather="x" data-close></i>
    </p>
<?php endif; ?>

// <table class="container">
        <thead>
            <tr>
                <th>Nom de la destination</th>
                <th>Pays</th>
                <th>Ville</th>
                <th>Avis</th>
                <th>Nom</th>
                <th>Email</th>
                <th colspan="2">Actions</th>
            </tr>   
        </thead>
        <tbody>
            <?php foreach ($voyage as $voyage) : ?>
            <tr>
                <td><?= htmlspecialchars($voyage->nom_de_la_destination) ?></td>
                <td><?= htmlspecialchars($voyage->pays) ?></td>
                <td><?= htmlspecialchars($voyage->ville) ?></td>
                <td><?= htmlspecialchars($voyage->avis) ?></td>
                <td><?= htmlspecialchars($voyage->nom) ?></td>
                <td><?= htmlspecialchars($voyage->email) ?></td>
                <td><a href="delete.php?id=<?= $voyage->id?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?');">Supprimer</a>
                <td><a href="edit.php?id=<?= $voyage->id?>" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette destination ?');">Modifier</a>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> //
-->


<main class="container"> 
    <form action="create.php" method="POST">
    <label for="photo">Photo de la destination</label>
    <input type="file" id="photo" name="photo">
    <br>
    <label for="nom_de_la_destination">Le <strong>Nom</strong> de votre destination</label>
    <input type="text" id="nom_de_la_destination" name="nom_de_la_destination" placeholder="Le nom de votre destination...">
    <br>
    <label for="pays">Le <strong>Pays</strong> de votre destination</label>
    <input type="text" id="pays" name="pays" placeholder="Le pays de votre destination...">
    <br>
    <label for="ville">La <strong>Ville</strong> de votre destination</label>
    <input type="text" id="ville" name="ville" placeholder="La ville de votre destination...">
    <br>
    <label for="avis">Un <strong>Avis</strong> sur votre destination ? (facultatif)</label>
    <input type="text" id="avis" name="avis" placeholder="Votre avis...">
    <br>
    <label for="prenom">Votre <strong>Prénom</strong> (facultatif)</label>
    <input type="text" id="prenom" name="prenom" placeholder="Prénom...">
    <br>
    <label for="nom">Votre <strong>Nom</strong> (facultatif)</label>
    <input type="text" id="nom" name="nom" placeholder="Nom...">
    <br>
    <label for="email">Votre <strong>Email</strong> (facultatif)</label>
    <input type="email" id="email" name="email" placeholder="Votre email...">
    <br>
    <label for="date_de_depart">Votre <strong>Date de départ</strong> (facultatif)</label>
    <input type="date" id="date_de_depart" name="date_de_depart" >
    <br>
    <label for="date_de_retour">Votre <strong>Date de retour</strong> (facultatif)</label>
    <input type="date" id="date_de_retour" name="date_de_retour">
    <br>
    <button>Soumettre votre destination</button>
</form>
</main>