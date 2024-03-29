<?php

require_once "../includes/db.php";

$query = $bdd->prepare("DELETE FROM voyage WHERE id=:id");

$query->execute([
    "id" => $_GET['id']
]);

header("Location: /bdd/index.php?success=deleted");
exit();
?>