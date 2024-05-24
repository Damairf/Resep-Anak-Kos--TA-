<?php
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESEP ANAK KOS</title>
    <link rel="stylesheet" href="css/home.css">
    <style>
        .recipe-box {
            cursor: pointer;
        }
        .no-result {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            margin-left: 24%
        }
    </style>
</head>
<body>
    <div id="recipe-container">
        <?php
        $csvFile = 'db/resep.csv';

        if (($handle = fopen($csvFile, 'r')) !== FALSE) {
            $resep = [];
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($data[0] == 'id') continue;

                $resep[] = [
                    'id' => $data[0],
                    'judul' => $data[1],
                ];
            }
            fclose($handle);

            usort($resep, function($a, $b) {
                return $b['id'] - $a['id'];
            });

            if (isset($_GET['cari'])) {
                $keyword = strtolower($_GET['cari']);
                if ($keyword === 'semua') {
                    $filterResep = $resep;
                } else {
                    $filterResep = array_filter($resep, function($recipe) use ($keyword) {
                        return strpos(strtolower($recipe['judul']), $keyword) !== false;
                    });
                }
            } else {
                $filterResep = $resep;
            }

            if (empty($filterResep)) {
                echo '<div class="no-result"><h1>Resep tidak ditemukan</h1></div>';
            } else {
                foreach ($filterResep as $recipe) {
                    echo '<div class="recipe-box" onclick="window.location.href=\'page.php?id=' . $recipe['id'] . '\'">';
                    echo '<h3>' . htmlspecialchars($recipe['judul']) . '</h3>';
                    echo '</div>';
                }
            }
        } else {
            echo '<p>Gagal membaca file resep</p>';
        }
        
        ?>
    </div>
</body>
</html>