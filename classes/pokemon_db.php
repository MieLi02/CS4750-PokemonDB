<?php
require "connect_database.php";
function addPokemon($id, $name, $generation, $appearanceCategory, $type)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "INSERT INTO Pokemon VALUES ('$id', '$name', '$generation', '$appearanceCategory', '$type')";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':generation', $generation);
    $statement->bindValue(':appearanceCategory', $appearanceCategory);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

function getPokemonById($id)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM Pokemon WHERE Pid = '$id'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPokemonByName($name)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM Pokemon WHERE name = '$name'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getUserEmail($email)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM User where Email = '$email'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getUserPassword($email)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM User where Email = '$email'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
?>
