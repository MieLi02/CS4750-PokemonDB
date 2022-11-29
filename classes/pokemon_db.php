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

function addPokemonSkill($sname, $power)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "INSERT INTO Skills VALUES ('$sname','$power')";
    $statement = $db->prepare($query);
    $statement->bindValue(':sname', $sname);
    $statement->bindValue(':power', $power);
    $statement->execute();
    $statement->closeCursor();
}

function linkPokemonSkill($id, $sname)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "INSERT INTO Has_Skill VALUES ('$id', '$sname')";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':sname', $sname);
    $statement->execute();
    $statement->closeCursor();
}

function addToFavorite($email, $id)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "INSERT INTO Has_Favorite VALUES ('$id', '$email')";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function deletePokemonById($id)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "DELETE FROM Pokemon WHERE Pokemon.Pid = '$id'";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function updateName($id, $name)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "UPDATE Pokemon SET Name = '$name' WHERE Pokemon.Pid = '$id'";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function updateGen($id, $generation)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "UPDATE Pokemon SET Generation = '$generation' WHERE Pokemon.Pid = '$id'";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':generation', $generation);
    $statement->execute();
    $statement->closeCursor();
}
function updateApp($id, $appearanceCategory)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "UPDATE Pokemon SET appearance_category = '$appearanceCategory' WHERE Pokemon.Pid = '$id'";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':appearanceCategory', $appearanceCategory);
    $statement->execute();
    $statement->closeCursor();
}
function updateType($id, $type)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "UPDATE Pokemon SET Type_name = '$type' WHERE Pokemon.Pid = '$id'";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
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

function getFavorite($email)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT Has_Favorite.Pid, Pokemon.Name FROM Has_Favorite NATURAL JOIN Pokemon WHERE Has_Favorite.Email = '$email'";
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

function getPokemonByGeneration($generation)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM Pokemon WHERE Generation = '$generation'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPokemonByType($type)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM Pokemon WHERE Type_name = '$type'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPokemonSkillByIdOrName($id, $name)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT Pokemon.Pid, Pokemon.Name, sname AS 'Skill', Power
    FROM Pokemon NATURAL JOIN Has_Skill NATURAL JOIN Skills
    WHERE Pokemon.Pid = '$id' OR Pokemon.Name = '$name'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPokemonAdvantageByIdOrName($id, $name)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT Pokemon.Pid, Pokemon.Name, Pokemon.Type_name, Has_Advantage_Over.weak_tname AS 'Has Advantage Over'
    FROM Pokemon RIGHT JOIN Has_Advantage_Over ON Pokemon.Type_name = Has_Advantage_Over.strong_tname
    WHERE Pokemon.Pid = '$id' OR Pokemon.Name = '$name'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPokemonEvolutionById($id)
{
    $username = 'yl2nr_a';
    $password = 'Fall2022';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'yl2nr_d';
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT P1.Name as 'Original', P2.Name as 'Evolved' FROM Pokemon as P1, Pokemon as P2 WHERE P1.Pid = '$id' AND P2.Pid = (SELECT After_pid FROM Evolve WHERE Previous_pid = '$id')";
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