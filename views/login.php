<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="file.css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button  type="button" class="toggle-btn" onclick="Login()">Login</button>
                <button  type="button" class="toggle-btn" onclick="Register()" >Register</button>

            </div>
            <form class="input-group" id="Login" method="POST" >
                <input type="text" class="input-field" name="username" placeholder="Username" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <input type="checkbox" class="check-box" name="" id="">
                <span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form class="input-group" id="Register" method="POST">
                <input type="text" class="input-field" name="R_username" placeholder="Username" required>
                <input type="password" class="input-field" name="R_password" placeholder="Enter Password" required>
                <input type="password" class="input-field" name="R_Cpassword" placeholder="Confirm Password" required>
                <input type="checkbox" class="check-box" name="" id="">
                <span>I agree to the terms & condition</span>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script>
        var x= document.getElementById("Login");
        var y= document.getElementById("Register");
        var z= document.getElementById("btn");
        function Register(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function Login(){
            x.style.left="50px";
            y.style.left="400px";
            z.style.left="0px";
        }
    </script>
</body>
</html>