<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Search</title>
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/search.css">
    </head> 
    <body>
        <?php
            require "./classes/connect_database.php";
        ?>
        <header>
            <nav>
                <a>Pokemon</a>
                <a>Search</a>
                <a href="?command=add">Add</a>
                <a>Profile</a>
            </nav>
        </header>
        <form class = "search" action="?command=search" method="post">
            <label> Search Pokemons by Name:</label>
            <br>
            <input type="text" id="name" name = "name" placeholder="Enter Name">
            <br>
            <label> Search Pokemons by Index:</label>
            <br>
            <input type="text" id="id" name = "id" placeholder="Enter Index">
            <br>
            <label for="fav"> Only search favorites?</label>
            <input type="checkbox" id="fav" name="fav" value="Favorite">
            <button type="submit" style="margin-left: 10px;" value="search">
                Search                  
            </button>
        </form>
        <?php
            if (!empty($error_msg)) {
                echo "<div class='alert alert-danger'>$error_msg</div>";
            }else{
                echo "<table class = 'table'>
                <tr>
                <th>Pokemon Id</th>
                <th>Pokemon Name</th>
                <th>Genereation</th>
                <th>Apperance</th>
                <th>Type</th>
                </tr>";              
                foreach ($pokemon as $p){
                    echo "<tr>";
                    echo "<td style='text-align:center;'>" . $p["Pid"] . "</td>";
                    echo "<td style='text-align:center;'>" . $p["Name"] . "</td>";
                    echo "<td style='text-align:center;'>" . $p["Generation"] . "</td>";
                    echo "<td style='text-align:center;'>" . $p["appearance_category"] . "</td>";
                    echo "<td style='text-align:center;'>" . $p["Type_name"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
        <hr>
        
    </body>
</html>