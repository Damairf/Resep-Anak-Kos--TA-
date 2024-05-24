<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <style>
        body {
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            height: 100%;
            background-color: #075e54;;
        }
        .judul-page{
            text-align: center;
            color: #fff;
        }
        .container{
            padding: 0 20px
        }
        .large-textarea {
            font-size: 18px;
            padding: 10px;
            width: 100%;
            height: 300px; 
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }
        .Teks-label {
            color: #fff;
            font-size: 24px;
            padding: 0 10px
        }
        .input-judul {
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
            height: 35px;
            font-size: 18px;
        }
        .submit-tambah {
            width: 15%;
            position: absolute;
            right: 2%;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 20px;
        }
        .submit-keluar {
            width: 15%;
            position: absolute;
            right: 2%;
            bottom: 22%;
            background-color: #8B0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 20px;
        }
        .warning-echo {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="judul-page">TAMBAH RESEP</h1>
    <form class="container" action="admin.php" method="post">
        <label class="Teks-label">Tulis Judul Resep :</label><br>
        <input type="text" name="judul" class="input-judul"><br>
        <label class="Teks-label">Tulis Resep :</label><br>
        <textarea id="largeText" class="large-textarea" name="resep"></textarea><br>
        <input type="submit" class="submit-keluar" name="keluar" value="Keluar">
        <input type="submit" class="submit-tambah" name="tambah" value="Tambah">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $filename = 'db/resep.csv';
    function getLastId($filename) {
        if (!file_exists($filename)) {
            return 0;
        }

        $file = fopen($filename, 'r');
        $lastId = 0;

        while (($data = fgetcsv($file)) !== FALSE) {
            $lastId = $data[0];
        }

        fclose($file);
        return $lastId;
    }

    $judul = $_POST["judul"];
    $resep = $_POST["resep"];
    
    $file = fopen($filename, 'a');
    if (empty($judul) || empty($resep)){
        echo"<h1 class='warning-echo'><span style='color: white;'>Judul/Resep tidak boleh kosong!</span></h1>";
    } else {
        $newId = getLastId($filename) + 1;
        $newResep = [$newId, $judul, $resep];
        fputcsv($file, $newResep);
        fclose($file);
        echo"<h1 class='warning-echo'><span style='color: white;'>Resep berhasil ditambahkan</span></h1>";
    }

    if (isset($_POST["keluar"])){
        header("Location: login.php");
    }
}
?>