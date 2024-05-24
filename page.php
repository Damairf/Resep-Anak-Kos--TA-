<?php
    include("header.php");
?>
<?php
$filename = 'db/resep.csv';
$file = fopen($filename, 'r');

if ($file === false) {
    die('Gagal membuka file');
}

$header = fgetcsv($file);
$data = [];

while (($row = fgetcsv($file)) !== false) {
    $data[] = array_combine($header, $row);
}

fclose($file);

$recipeFound = false;
$judulResep = '';
$kontenResep = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($data as $row) {
        if ($row["id"] == $id) {
            $recipeFound = true;
            $judulResep = htmlspecialchars($row["judul"]);
            $kontenResep = nl2br(htmlspecialchars($row["resep"]));
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESEP ANAK KOS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .content {
            margin: 20px auto;
            width: 80%;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="content">
        <?php if ($recipeFound): ?>
            <h2><?php echo $judulResep; ?></h2>
            <p><?php echo $kontenResep; ?></p>
        <?php else: ?>
            <p>Halaman error</p>
        <?php endif; ?>
    </div>
</body>
</html>