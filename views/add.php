<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<label>Add a new Pokemon</label>
        <br>
        <form class="add" action="?command=add" method="POST">
            <label for="pid">id</label>
            <input type="text" id="pid" name = "pid" placeholder="Enter Pokemon ID">
            <br>
            <label for="pname">name</label>
            <input type="text" id="pname" name = "pname" placeholder="Enter Pokemon Name">
            <br>
            <label for="generation">generation</label>
            <input type="text" id="generation" name = "generation" placeholder="Enter Generation">
            <br>
            <label for="appearance">appearance</label>
            <input type="text" id="appearance" name = "appearance" placeholder="Enter appearance">
            <br>
            <label for="type">type</label>
            <input type="text" id="type" name = "type" placeholder="Enter type">
            <br>
            <button type="submit" style="margin-left: 10px;">
                Add                  
            </button>
        </form>
        <?php
            echo "Successfully added " . " $addedPokemonName";
        ?>
</body>
</html>