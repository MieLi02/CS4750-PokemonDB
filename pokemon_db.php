<?php
function addPokemon($id, $name, $generation, $appearanceCategory, $type)
{
    global $db;
    $query = "INSERT INTO Pokemon VALUES (:id, :name, :generation, :appearanceCategory, :type)";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':generation', $generation);
    $statement->bindValue(':appearanceCategory', $appearanceCategory);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}
?>