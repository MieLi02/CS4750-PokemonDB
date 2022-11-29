<?php
require "connect_database.php";
require "pokemon_db.php";

class Handler
{
    private $command;

    private $logger;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function run()
    {
        if (!isset($_GET['command'])) {
            $this->index();
        } else {
            switch ($_GET['command']) {
                case "search":
                    $this->search();
                    break;
                case "login":
                    $this->login();
                    break;
                case "signup":
                    $this->signup();
                    break;
                case "add":
                    $this->add();
                    break;
                case "edit":
                    $this->edit();
                    break;
                case "delete":
                    $this->delete();
                    break;
                case "detail":
                    $this->detail();
                    break;
                default:
                    $this->index();
                    break;
            }
        }
    }


    private function index()
    {
        include("views/homepage.php");
    }

    private function login()
    {
        if (isset($_POST["email"])) {
            $input_email = $_POST["email"];
            $get_email = getUserEmail($input_email)[0]["Email"];
            $get_email_json = json_encode($get_email);
            echo $get_email_json;
            $get_password = getUserPassword($input_email)[0]["Password"];
            echo $get_email;
            if ($get_email === false) {
                $error_msg = "Error checking for user";
            } else if (($_POST["email"] == "") || ($_POST["password"] == "")) {
                $error_msg = "Don't leave login fields blank";
            } else if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                if (password_verify($_POST["password"],$get_password)) {
                    header("Location: ?command=search");
                } else {
                    $error_msg = "Wrong password";
                }
            } else {
                $error_msg = "User not found";
            }
        }
        include("views/login.php");
    }

    private function signup()
    {
        if (isset($_POST["email"])) {
            $input_email = $_POST["email"];
            $data = getUserEmail($input_email);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (($_POST["email"] == "") || ($_POST["password"] == "")) {
                $error_msg = "Don't leave signup fields blank";
            } else if (!empty($data)) {
                $error_msg = "Email is already in use";
            } else {
                $insert = addUser($_POST["email"],$_POST["password"]);
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    session_start();
                    //$_SESSION["name"] =  $_POST["name"];
                    $_SESSION["email"] = $_POST["email"];
                    //$_SESSION["id"] = $id[0]["id"];
                    header("Location: ?command=home");
                }
            }
        }
        include("views/login.php");
    }

    private function search()
    {
        $id = 1;
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $pokemon = getPokemonById($_POST["id"]);
        } elseif (isset($_POST["name"]) && !empty($_POST["name"])) {
            $pokemon = getPokemonByName($_POST["name"]);
        } else {
            $pokemon = getPokemonById(1);
            $pokemon_json = json_encode($pokemon);
        }
        if (count($pokemon) == 0) {
            $pokemon = getPokemonById(1);
            $pokemon[0]["Pid"] = -1;
        }
        include("views/search.php");
    }

    private function add()
    {
        if (
            isset($_POST["pid"]) && isset($_POST["pname"]) &&
            isset($_POST["generation"]) && isset($_POST["appearance"]) &&
            isset($_POST["type"])
        ) {
            addPokemon($_POST["pid"], $_POST["pname"], $_POST["generation"], $_POST["appearance"], $_POST["type"]);
            $addedPokemonName = $_POST["pname"];
        }
        include("views/add.php");
    }

    private function edit()
    {
        if (
            isset($_POST["pid"]) && isset($_POST["pname"]) &&
            isset($_POST["generation"]) && isset($_POST["appearance"]) &&
            isset($_POST["type"])
        ) {
            updateName($_POST["pid"], $_POST["pname"]);
            updateGen($_POST["pid"], $_POST["generation"]);
            updateApp($_POST["pid"], $_POST["appearance"]);
            updateType($_POST["pid"], $_POST["type"]);
        }
        $curPoke = getPokemonById($_GET["id"]);
        include("views/edit.php");
    }

    private function delete()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $pokemon = getPokemonById($_POST["id"]);
        } else {
            $pokemon = getPokemonById(1);
        }
        deletePokemonById($_POST["pid"]);
        include("views/search.php");
    }

    private function detail()
    {
        if (!isset($_GET['id'])){
            $pokemon = getPokemonById(1);
        } else {
            $pokemon = getPokemonById($_GET['id']);
        }
        $id = $pokemon[0]["Pid"];
        $skills = getPokemonSkillById($id);
        $advantages = getPokemonAdvantageById($id);
        $evolved = getPokemonEvolutionById($id);
        $evolved_name = getPokemonEvolutionNameById($id);
        if (count($evolved) == 0){
            $evolved_id = -1;
        } else{
            $evolved_id = $evolved[0]['Pid'];
        }
        include("views/detail.php");
    }
}
