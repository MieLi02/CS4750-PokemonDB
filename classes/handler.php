<?php

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
            case "login":
                $this -> login();
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
        include("views/login.php");
        /*
        if (isset($_POST["email"])) {
            $data = $this->db->query("select * from recipick_user where email = ?;", "s", $_POST["email"]);
            $data_json = json_encode($data);
            if ($data === false) {
                $error_msg = "Error checking for user";
            }
            else if ( ($_POST["email"] == "") || ($_POST["password"] == "") ){
                $error_msg = "Don't leave login fields blank";
            }
            else if (!empty($data)) {
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    session_start();
                    $_SESSION["name"] =  $data[0]["name"];
                    $_SESSION["email"] =  $data[0]["email"];
                    $_SESSION["id"] = $data[0]["id"];
                    header("Location: ?command=home");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                $error_msg = "User not found";
            }
        }
        include("login.php");
        */
    }
    
}