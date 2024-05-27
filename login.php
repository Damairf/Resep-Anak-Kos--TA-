<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #075e54;
            margin: 0;
        }
        .login-container {
            background-color: #075e54;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .login-container h1 {
            color: #fff;
            margin-bottom: 0.5rem;
        }
        .login-container h2 {
            color: #fff;
            margin-bottom: 1.5rem;
        }
        .login-container label {
            display: block;
            color: #fff;
            margin-bottom: 0.5rem;
            text-align: left;
        }
        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            background-color: #25d366;
            border: none;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #20c25c;
        }
        .login-container a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-top: 1rem;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>RESEP ANAK KOS</h1>
        <h2>MASUK</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" name="submit" value="Masuk">
            <a href="register.php">Daftar Akun</a>
        </form>
    </div>
</body>
</html>

<?php

$filename = 'db/data.csv';
$file = fopen($filename, 'r');
$header = fgetcsv($file);
$data = [];
while (($row = fgetcsv($file)) !== false) {
    $data[] = array_combine($header, $row);
}

if (isset($_POST["submit"])) {
    foreach ($data as $row) {
        if ($row["nama"] == $_POST["username"] && (password_verify($_POST["password"], $row["password"]))) {
            header("Location: home.php");
            exit();
        } 
        elseif ($_POST["username"] == "admin" && $_POST["password"] == "admin"){
            header("Location: admin.php");
            exit();
        }
    }
}
?>