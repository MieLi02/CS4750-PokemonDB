<?php
require "connect_database.php";
require "pokemon_db.php";

class Handler {
    private $command;
    
    private $logger;

    public function __construct($command) {
        $this->command = $command;
    }

    public function run() {
        if (!isset($_GET['command'])){
            $this->index();
        }else{
        switch($_GET['command']) {
            case "search":
                $this->search();
                break;
            case "login":
                $this -> login();
                break;
            case "signup":
                $this -> signup();
                break;
            default:
                $this -> index();
                break;
        }}
    }


    private function index() {
        include("views/homepage.php");
    }

    private function login() {
        if (isset($_POST["email"])) {
            $input_email = $_POST["email"];
            $data = $db->query("SELECT Email FROM User where Email = ?;", "s", $_POST["email"]);
            echo $data;
            //$get_email = getUserEmail($input_email);
            //$get_password = getUserPassword($input_email);
            if ($get_email === false) {
                $error_msg = "Error checking for user";
            }
            else if ( ($_POST["email"] == "") || ($_POST["password"] == "") ){
                $error_msg = "Don't leave login fields blank";
            }
            else if (!empty($data)) {
                if ($_POST["password"] == $data[0]["Password"]) {
                    header("Location: ?command=search");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                $error_msg = "User not found";
            }
        }
        include("views/login.php");
    }

    private function signup() {
        if (isset($_POST["email"])) {
            $data = $db->query("select * from recipick_user where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            }
            else if ( ($_POST["email"] == "") || ($_POST["name"] == "") || ($_POST["password"] == "") ){
                $error_msg = "Don't leave signup fields blank";
            }
            else if (!empty($data)) {
                $error_msg = "Email is already in use";
            } else {
                $insert = $this->db->query("insert into recipick_user (name, email, password, num_recipes) values (?, ?, ?, ?);", 
                        "ssss", $_POST["name"], $_POST["email"], 
                        password_hash($_POST["password"], PASSWORD_DEFAULT), 0);
                $id = $this->db->query("select id from recipick_user where email = ?;", "s", $_POST["email"]);
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    session_start();
                    $_SESSION["name"] =  $_POST["name"];
                    $_SESSION["email"] =   $_POST["email"];
                    $_SESSION["id"] = $id[0]["id"];
                    header("Location: ?command=home");
                }
            }
        }
        include("login.php");
    }

    private function search() {
        include("views/search.php");
    }
    
}