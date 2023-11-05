<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #0078d4, #005a9e);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #9db0ce;
            border: 1px solid #535878;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #a36361;
        }
        form {
            margin-top: 20px;
            display: grid;
            gap: 10px;
        }
        label {
            text-align: left;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;  
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0078d4;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form action="process_registration.php" method="post" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Register">
    </form>
</div>
<!-- <div class="container">
    <h2>Register</h2>
    <form action="process_registration.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Register">
    </form>
</div> -->

<script>
function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    
    if (username.indexOf('@') === -1) {
        alert("Username must contain @ symbol");
        return false;
    }

    if (!/[\W_]/.test(password) || !/\d/.test(password) || !/[A-Z]/.test(password)) {
        alert("Password must contain at least one special character, one number, and one capital letter");
        return false;
    }

    return true;
}
</script>




   </body>
</html>
