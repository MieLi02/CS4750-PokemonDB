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

    <?php
    require "./classes/connect_database.php";
    ?>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pokémon</a>
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
                        <a class="nav-link disabled">Edit</a>
                    </li>

                </ul>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">User Profile</a>
                </div>
            </div>
        </div>
    </nav>
</head>

<body>
    <br>
    <div class="row gy-5">
        <div class="col-12">
            <div class="container text-center">
                <h1>Search Pokémon from Our Database!</h1>
            </div>
            <div class="container">
                <form action="?command=search" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Pokemon Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Pokemon ID">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Search By Either Name or ID</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12">
            <?php if ($pokemon[0]["Pid"] == -1) { ?>
            <div class="card mx-auto" style="width: 18rem;">
                <img src="https://www.thewandcompany.com/wp-content/uploads/2020/11/hand-holding-pokeball-lit-2kx2437px-840x1024.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        Sorry! Pokémon Not Found!
                    </h5>
                    <p class="card-text">Our database currently DOES NOT have that Pokémon!</p>
                    <p class="card-text">No Worry! Add a new Pokémon!</p>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="?command=add" class="card-link btn btn-danger">Add</a>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="card mx-auto" style="width: 18rem;">
                <?php
                if ((int) $pokemon[0]["Pid"] == 1) {
                    $pokemonPicNum = '001';
                } elseif ((int) $pokemon[0]["Pid"] > 0 and (int) $pokemon[0]["Pid"] < 10) {
                    $pokemonPicNum = '00' . $pokemon[0]["Pid"];
                } elseif ((int) $pokemon[0]["Pid"] > 9 and (int) $pokemon[0]["Pid"] < 100) {
                    $pokemonPicNum = '0' . $pokemon[0]["Pid"];
                } else {
                    $pokemonPicNum = $pokemon[0]["Pid"];
                }
                $pokemonPic = 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/' . $pokemonPicNum . ".png";
                ?>
                <img src="<?php echo $pokemonPic ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $pokemon[0]["Name"] ?>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID:
                        <?php echo $pokemon[0]["Pid"] ?>
                    </li>
                    <li class="list-group-item">Generation:
                        <?php echo $pokemon[0]["Generation"] ?>
                    </li>
                    <li class="list-group-item">Apperance:
                        <?php echo $pokemon[0]["appearance_category"] ?>
                    </li>
                    <li class="list-group-item">Type:
                        <?php echo $pokemon[0]["Type_name"] ?>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="?command=edit" class="card-link btn btn-info">Edit</a>
                    <form class="d-inline" action="?command=delete" method="POST">
                        <input type="hidden" name="pid" id="pid" value=<?php echo $pokemon[0]["Pid"] ?>>
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <?php
                        echo "<a href='?command=detail&id=$id' class='card-link btn btn-info'>Details</a>";
                    ?>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>