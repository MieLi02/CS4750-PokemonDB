# Create Tables
CREATE TABLE R1 (Pid INT, Name VARCHAR(255),PRIMARY KEY(Pid));

CREATE TABLE R2 (Name VARCHAR(255),Generation INT,Picture VARCHAR(255),PRIMARY KEY(Name));

CREATE TABLE R3 (Picture VARCHAR(255),Appearance_type VARCHAR(255),PRIMARY KEY(Picture));

CREATE TABLE R4 (Pid INT, Type_name VARCHAR(255),PRIMARY KEY(Pid));

CREATE TABLE Types (tname VARCHAR(255),PRIMARY KEY(tname));

CREATE TABLE Pokemon (Pid INT, Name VARCHAR(255),Generation INT,appearance_category VARCHAR(255),Type_name VARCHAR(255), PRIMARY KEY(Pid),FOREIGN KEY(Type_name) REFERENCES Types(tname));

CREATE TABLE Skills (sname VARCHAR(255), Power INT,PRIMARY KEY(sname));

CREATE TABLE Users (uid INT,PRIMARY KEY(uid));

CREATE TABLE Has_Advantage_Over (strong_tname VARCHAR(255) REFERENCES Types(tname),weak_tname VARCHAR(255) REFERENCES Types(tname),PRIMARY KEY(strong_tname));

CREATE TABLE Has_Skill (Pid INT REFERENCES Pokemon(Pid), sname VARCHAR(255) REFERENCES Skills(sname),PRIMARY KEY(Pid,sname));

CREATE TABLE Has_Favorite (uid INT REFERENCES Users(uid),Pid INT REFERENCES Pokemon(Pid));

CREATE TABLE Evolve (Previous_pid INT REFERENCES Pokemon(Pid),After_pid INT REFERENCES Pokemon(pid));

# Grant Access

GRANT SELECT, INSERT, UPDATE, DELETE ON yl2br_d.* TO 'yl2nr_a'@'%';

# Add Constraints

ALTER TABLE Pokemon ADD CONSTRAINT Type_name FOREIGN KEY(Type_name) REFERENCES Types(tname) ON DELETE CASCADE;

# Add Trigger

DELIMITER $$
CREATE TRIGGER PokemonInsertionTrigger
BEFORE INSERT ON Pokemon
FOR EACH ROW
BEGIN
  IF new.Type_name NOT IN (SELECT * FROM Types) THEN
    SET new.Type_name = "Grass";
  END IF;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER PokemonTrigger
BEFORE INSERT ON Skills
FOR EACH ROW
BEGIN
  IF new.Power > 100 THEN
    SET new.Power = 100;
  ELSEIF new.Power < 0 THEN
    SET new.Power = 0;
  END IF;
END
$$
DELIMITER ;

# Retrieve Data

WITH (SELECT * FROM R1 NATURAL JOIN R2 NATURAL JOIN R4) AS Pokemon;

SELECT * FROM Pokemon NATURAL JOIN Has_Skill WHERE Pokemon.name = Pikachu ORDER BY Pid;

SELECT * FROM Pokemon NATURAL JOIN Has_Skill WHERE Pokemon.Pid = 1 ORDER BY Pid;

SELECT Pokemon.Pid, Pokemon.Name, Pokemon.Type_name, Has_Advantage_Over.weak_tname AS "Has Advantage Over"
FROM Pokemon RIGHT JOIN Has_Advantage_Over ON Pokemon.Type_name = Has_Advantage_Over.strong_tname
WHERE Pokemon.Pid = 1;

SELECT Pokemon.Pid, Pokemon.Name, sname AS "Skill", Power
FROM Pokemon NATURAL JOIN Has_Skill NATURAL JOIN Skills
WHERE Pokemon.Pid = 1 OR Pokemon.Name = Pikachu;

SELECT P1.Name as Original, P2.Name as Evolved
FROM Pokemon as P1, Pokemon as P2
WHERE P1.Pid = 1 AND P2.Pid = (SELECT After_pid FROM Evolve WHERE Previous_pid = 1);

# Add Data - add a new pokemon (pichu)

INSERT INTO Pokemon (Pid, Name, Generation, appearance_category, Type_name) VALUES ('172', 'pichu', '2', 'Mouse', 'Electric');

# Delete Data

DELETE FROM Pokemon WHERE Pokemon.Pid = 1

# Update Data

UPDATE Pokemon SET Name = :newName WHERE Pokemon.Pid = 1;

# Filter Data By type
SELECT * FROM Pokemon NATURAL JOIN Has_Skill WHERE Pokemon.Type_name = :type;

# Filter Data By generation
SELECT * FROM Pokemon NATURAL JOIN Has_Skill WHERE Pokemon.Generation = :generation;

# Filter Data By appearance appearance_category
SELECT * FROM Pokemon NATURAL JOIN Has_Skill WHERE Pokemon.appearance_category = :category;
