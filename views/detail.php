<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
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
                        <a class="nav-link active" aria-current="page" href="?command=add">Add</a>
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

    <br>
    <div class="container">
        <h1>Detail for <?php echo $pokemon[0]["Name"]?></h1>
    </div>

    <div class="container">
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

        <div class="flex-container">
            <div class="left">
                <img src="<?php echo $pokemonPic ?>" class="card-img-top" alt="..." style="width:200px;height:240px;">
            </div>

            <div class="vl"></div>

            <div class="right">
                <div class="mb-3">
                    <label for="pid" class="form-label">ID: <?php echo $pokemon[0]["Pid"]?></label>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name: <?php echo $pokemon[0]["Name"]?></label>
                </div>

                <div class="mb-3">
                    <label for="generation" class="form-label">Generation: <?php echo $pokemon[0]["Generation"]?></label>
                </div>

                <div class="mb-3">
                    <label for="appearance_category" class="form-label">Appearance: <?php echo $pokemon[0]["appearance_category"]?></label>
                </div>

                <div class="mb-3">
                    <label for="type_name" class="form-label">Type: <?php echo $pokemon[0]["Type_name"]?></label>
                </div>

                <div class="mb-3">
                    <label for="skills" class="form-label">Skills: 
                        <?php for($i = 0; $i < count($skills); $i++) {
                            if ($i != count($skills)-1){
                                echo $skills[$i][0] . ", ";
                            } else{
                                echo $skills[$i][0];
                            }
                        }
                        ?>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="skills" class="form-label">Advantages: 
                        <?php for($i = 0; $i < count($advantages); $i++) {
                            if ($i != count($advantages)-1){
                                echo $advantages[$i][0] . ", ";
                            } else{
                                echo $advantages[$i][0];
                            }
                        }
                        ?>
                    </label>
                </div>

                <?php
                    if ((int) $evolved_id == -1){
                        $evolvePic = "https://www.thewandcompany.com/wp-content/uploads/2020/11/hand-holding-pokeball-lit-2kx2437px-840x1024.jpg";
                    } else{
                        if ((int) $evolved_id == 1) {
                            $evolvePicNum = '001';
                        } elseif ((int) $evolved_id > 0 and (int) $evolved_id < 10) {
                            $evolvePicNum = '00' . $evolved_id;
                        } elseif ((int) $evolved_id > 9 and (int) $evolved_id < 100) {
                            $evolvePicNum = '0' . $evolved_id;
                        } else {
                            $evolvePicNum = $evolved_id;
                        }
                        $evolvePic = 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/' . $evolvePicNum . ".png";
                    }
                ?>

                <div class="mb-3">
                    <label for="skills" class="form-label">Evolution: 
                        <?php 
                            if (count($evolved_name) == 0){
                                echo "No evolution for this Pokemon!";
                            } else{
                                echo $evolved_name[0]["Name"];
                            }
                        ?>
                    </label>
                    <img src="<?php echo $evolvePic ?>" class="card-img-top" alt="..." style="width:200px;height:240px;">
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>