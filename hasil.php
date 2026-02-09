<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pembelian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
<h2>Hasil Pembelian</h2>

<?php
$hargaUkuran = [
    "S" => 100000,
    "M" => 105000,
    "L" => 110000,
    "XL" => 115000,
    "XXL" => 120000
];

$hargaBahan = [
    "Katun" => 2000,
    "Satin" => 5000,
    "Rajut" => 8000
];

$nama   = $_POST['nama'];
$ukuran = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];
$bahan  = $_POST['bahan'];

$tambahan = 0;
foreach ($bahan as $b) {
    $tambahan += $hargaBahan[$b];
}

$total = ($hargaUkuran[$ukuran] + $tambahan) * $jumlah;
?>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th align="left">Nama</th>
        <td><?= $nama ?></td>
    </tr>
    <tr>
        <th align="left">Ukuran</th>
        <td><?= $ukuran ?></td>
    </tr>
    <tr>
        <th align="left">Jumlah</th>
        <td><?= $jumlah ?></td>
    </tr>
    <tr>
        <th align="left">Jenis Bahan</th>
        <td>
            <?php
            foreach ($bahan as $b) {
                echo $b . "<br>";
            }
            ?>
        </td>
    </tr>
    <tr>
        <th align="left">Total Harga</th>
        <td><b>Rp <?= number_format($total,0,",",".") ?></b></td>
    </tr>
</table>

<a href="index.php">← Kembali ke Form</a>
</div>

</body>
</html>
