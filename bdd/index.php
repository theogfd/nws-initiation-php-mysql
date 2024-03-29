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

<main class="container">
    <table class="container" style="margin: auto;">
        <thead>
            <tr>
                <th colspan="7" style="text-align: center; font-weight: bold; font-size: larger;">Base de données</th>
            </tr>
            <?php if (isset($message)) : ?>
                <tr>
                    <td colspan="7">
                        <p data-notice="<?= $message_type ?>">
                            <span><?= $message ?></span>
                            <i data-feather="x" data-close></i>
                        </p>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <th>Nom de la destination</th>
                <th>Pays</th>
                <th>Ville</th>
                <th>Avis</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
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
                    <td>
                        <a href="delete.php?id=<?= $voyage->id?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?');">Supprimer</a>
                        <a href="edit.php?id=<?= $voyage->id?>" onclick="return confirm('Êtes-vous sûr de vouloir modifier cette destination ?');">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>