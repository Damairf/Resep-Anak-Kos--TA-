<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESEP ANAK KOS</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #075e54;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            font-size: 18px;
        }
        .search-container {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        .search-container input[type="text"] {
            padding: 5px;
            font-size: 16px;
        }
        .icon-container {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 10px;
        }
        .icon-container a {
            color: white;
            font-size: 30px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="home.php" method="get">
        <div class="header">
            <div class="icon-container">
                <a href="login.php"><i class='bx bx-log-out' ></i></a>
                <a href="home.php"><i class='bx bxs-home'></i></a>
            </div>
            <h1>RESEP ANAK KOS</h1>
            <p>MASAK APA HARI INI</p>
            <div class="search-container">
                <input type="text" name="cari" placeholder="Cari Resep...">
            </div>
        </div>
    </form>
</body>
</html>