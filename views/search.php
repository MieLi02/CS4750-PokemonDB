<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Search</title>
        <meta name="author" content="Sky Chen/Da Lin">
        <meta name="description" content="A place to find recipes that work for you.">
        <meta name="keywords" content="food">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/search.css">
    </head> 
    <body>
        <header>
            <nav>
                <a>Pokemon</a>
                <a>Search</a>
                <a>Favorite</a>
                <a>Profile</a>
            </nav>
        </header>
        <form class = "search" action="?command=search" method="post">
            <label for="recipename"> Search Pokemons by Name:</label>
            <br>
            <input type="text" id="recipename" placeholder="Enter Name">
            <br>
            <label for="recipeingredients"> Search Pokemons by Index:</label>
            <br>
            <input type="text" id="recipeingredients" placeholder="Enter Index">
            <br>
            <label for="fav"> Only search favorites?</label>
            <input type="checkbox" id="fav" name="fav" value="Favorite">
            <button type="submit" style="margin-left: 10px;">
                Search                  
            </button>
        <br>
        <br>
        <table>
            <tr>
                <th>&nbsp; Pokemon Id &nbsp;</th>
                <th>&nbsp; Pokemon Name &nbsp;</th>
                <th>&nbsp; Generation Number &nbsp;</th>
                <th>&nbsp; Apperance Category &nbsp;</th>
                <th> Type </th>
            </tr>
        </table>
        <hr>
    </body>
</html>