<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <?php
    require "./classes/connect_database.php";
    ?>
</head>

<body>
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
                        <a class="nav-link" href="?command=search">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?command=add">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">Edit</a>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">User Profile</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <h1>Update Information for: 
            <?php echo $curPoke[0]["Name"] ?>
        </h1>
    </div>
    <div class="container">
        <form action=<?php echo "?command=edit&id=".$curPoke[0]["Pid"]?> method="POST">
            <div class="mb-3">
                <label for="pid" class="form-label">ID</label>
                <input type="text" class="form-control" id="pid" name="pid" placeholder="Enter Pokemon ID"
                    aria-describedb="idHelp" value=<?php echo $curPoke[0]["Pid"] ?> readonly>
                <div id="idHelp" class="form-text">Each Pokemon has its unique ID! You CANNOT EDIT this!</div>
            </div>
            <div class="mb-3">
                <label for="pname" class="form-label">Name</label>
                <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter Pokemon Name" value=<?php echo $curPoke[0]["Name"] ?>>
            </div>
            <div class="mb-3">
                <label for="appearance" class="form-label">Appearance</label>
                <input type="text" class="form-control" id="appearance" name="appearance" placeholder="Enter appearance"
                    aria-describedby="appHelp" value=<?php echo $curPoke[0]["appearance_category"] ?>>
                <div id="appHelp" class="form-text">What species is it? Is it a Dog?</div>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name=type id=type>
                    <option selected>Current Type: <?php echo $curPoke[0]["Type_name"] ?></option>
                    <option value="Bug">Bug</option>
                    <option value="Dark">Dark</option>
                    <option value="Dragon">Dragon</option>
                    <option value="Electric">Electric</option>
                    <option value="Fairy">Fairy</option>
                    <option value="Fighting">Fighting</option>
                    <option value="Fire">Fire</option>
                    <option value="Flying">Flying</option>
                    <option value="Ghost">Ghost</option>
                    <option value="Grass">Grass</option>
                    <option value="Ground">Ground</option>
                    <option value="Ice">Ice</option>
                    <option value="Normal">Normal</option>
                    <option value="Poison">Poison</option>
                    <option value="Psychic">Psychic</option>
                    <option value="Rock">Rock</option>
                    <option value="Steel">Steel</option>
                    <option value="Water">Water</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name=generation id=generation>
                    <option selected>Current Generation: <?php echo $curPoke[0]["Generation"] ?></option>
                    <option value="1">Generation I</option>
                    <option value="2">Generation II</option>
                    <option value="3">Generation III</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>