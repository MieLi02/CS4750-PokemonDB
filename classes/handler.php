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
                if ($_POST["password"] == $get_password) {
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
        $username = 'yl2nr_a';
        $password = 'Fall2022';
        $host = 'mysql01.cs.virginia.edu';
        $dbname = 'yl2nr_d';
        $dsn = "mysql:host=$host;dbname=$dbname";
        $db = new PDO($dsn, $username, $password);
        if (isset($_POST["email"])) {
            $data = $db->query("select * from User where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (($_POST["email"] == "") || ($_POST["password"] == "")) {
                $error_msg = "Don't leave signup fields blank";
            } else if (!empty($data)) {
                $error_msg = "Email is already in use";
            } else {
                $insert = $this->db->query(
                    "insert into User (Email, Password) values (?, ?);",
                    "ss", $_POST["email"],
                    password_hash($_POST["password"], PASSWORD_DEFAULT)
                );
                //$id = $this->db->query("select id from recipick_user where email = ?;", "s", $_POST["email"]);
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
        include("login.php");
    }

    private function search()
    {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $pokemon = getPokemonById($_POST["id"]);
        } elseif (isset($_POST["name"]) && !empty($_POST["name"])) {
            $pokemon = getPokemonByName($_POST["name"]);
        } else {
            $pokemon = getPokemonById(1);
            $pokemon_json = json_encode($pokemon);
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
}