<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR</title>
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
        .register-container {
            background-color: #075e54;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .register-container h1 {
            color: #fff;
            margin-bottom: 0.5rem;
        }
        .register-container h2 {
            color: #fff;
            margin-bottom: 1.5rem;
        }
        .register-container label {
            display: block;
            color: #fff;
            margin-bottom: 0.5rem;
            text-align: left;
        }
        .register-container input[type="text"],
        .register-container input[type="password"],
        .register-container input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
        }
        .register-container input[type="submit"] {
            background-color: #25d366;
            border: none;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
        .register-container input[type="submit"]:hover {
            background-color: #20c25c;
        }
        .register-container a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-top: 1rem;
        }
        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>RESEP ANAK KOS</h1>
        <h2>DAFTAR</h2>
        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Daftar">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            $filename = 'db/data.csv';

            $file = fopen($filename, 'a');
            if (empty($username) || empty($password)){
                echo "<span style='color: white;'>Username/Password tidak boleh kosong!</span><br>";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $newUser = [$username, $hash];
                fputcsv($file, $newUser);
                fclose($file);
                echo "<span style='color: white;'>Pendaftaran berhasil</span><br>";
            }
        }
        echo "<a href='login.php'>Masuk</a>";
        ?>
    </div>
</body>
</html>