<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1"> 
            <title>Login</title>
            <meta name="author" content="Sky Chen/Da Lin">
            <meta name="description" content="recipes">
            <meta name="keywords" content="food">
            <link rel="stylesheet" href="styles/main.css">
            <link rel="stylesheet" href="styles/login.css">
        </head> 
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous">
</script>
        <body>
        
            <header>
                <nav>
                <h1 style = "font-size: 60px;display:inline-block">
                        Pokemon
                </h1>
                </nav>
            </header>
            <div class = "flex-container">
                <?php
                    if (!empty($error_msg)) {
                        echo "<div class='alert alert-danger'>$error_msg</div>";
                    }
                ?>
                <form class = "login" action="?command=login" method="post">
                    <h1 style = "font-size: 60px;display:inline-block">
                        Login
                    </h1>
                    <br>
                    <label for="Email" style = "font-size: 30px">E-mail:</label>
                    <input type="text" id="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <br>
                    <label for="Password" style = "font-size: 30px">Password:</label>
                    <input type="password" id="password" name="password">
                    <br>
                    <p id="pwhelp" class="form-text" style = "color:red"></p>
                    <button id="login" name="login" type="submit" style="margin-left: 10px;">
                        Login
                    </button>
                </form>
                <form class = "signup" action="?command=signup" method="post">
                    <h1 style = "font-size: 60px">
                        Sign up
                    </h1>
                    <label for="Username" style = "font-size: 30px">Username:</label>
                    <input type="text" id="Username" name="name">
                    <br>
                    <label for="Email" style = "font-size: 30px" >E-mail:</label>
                    <input type="text" id="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <br>
                    <label for="Password" style = "font-size: 30px">Password:</label>
                    <input type="password" id="password" name="password" pattern=".{8,}">
                    <br>
                    <br>
                    <button type="submit" style="margin-left: 10px;">
                        Create Account                    
                    </button>
                </form>
            </div>
        </body>
        <script type="text/javascript">
            document.getElementById("Email").addEventListener("keyup", function() {
                var email = document.getElementById("Email");
                var submit = document.getElementById("login");
                var pwhelp = document.getElementById("pwhelp");
                var re = /\S+@\S+\.\S+/;
                var emailval = email.value;

                if (!re.test(emailval)) {
                    email.classList.add("is-invalid");
                    submit.disabled = true;
                    pwhelp.textContent = "Please enter a valid E-mail.";
                } else {
                    email.classList.remove("is-invalid");
                    submit.disabled = false;
                    pwhelp.textContent = "";
                }
            });
    </script>
</html>