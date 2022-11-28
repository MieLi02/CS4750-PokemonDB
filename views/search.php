<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/search.css"> -->
</head>

<body>
    <?php
    require "./classes/connect_database.php";
    ?>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pokemon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?command=search">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?command=add">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">User Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <nav>
                <a>Pokemon</a>
                <a>Search</a>
                <a href="?command=add">Add</a>
                <a>Profile</a>
            </nav> -->

    <form class="search" action="?command=search" method="post">
        <label> Search Pokemons by Name:</label>
        <br>
        <input type="text" id="name" name="name" placeholder="Enter Name">
        <br>
        <label> Search Pokemons by Index:</label>
        <br>
        <input type="text" id="id" name="id" placeholder="Enter Index">
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
    } else {
        echo "<table class = 'table'>
                <tr>
                <th>Pokemon Id</th>
                <th>Pokemon Name</th>
                <th>Genereation</th>
                <th>Apperance</th>
                <th>Type</th>
                </tr>";
        foreach ($pokemon as $p) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>