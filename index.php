<!DOCTYPE html>
<html>
<head>
    <title>Form Beli Baju</title>
    <link rel="stylesheet" href="style.css">

    <script>
function updateHarga() {
    let ukuran = document.querySelector('input[name="ukuran"]:checked');
    let bahanChecked = document.querySelectorAll('input[name="bahan[]"]:checked');
    let jumlah = document.getElementById("jumlah").value;
    let hargaText = document.getElementById("hargaText");
    let hargaInput = document.getElementById("harga");

    if (!ukuran || bahanChecked.length === 0 || jumlah < 1) {
        hargaText.innerHTML = "-";
        hargaInput.value = "";
        return;
    }

    let hargaUkuran = {
        "S": 100000,
        "M": 105000,
        "L": 110000,
        "XL": 115000,
        "XXL": 120000
    };

    let hargaBahan = {
        "Katun": 2000,
        "Satin": 5000,
        "Rajut": 8000,
        "Denim": 11000,
        "Sutra": 14000
    };

    let tambahanBahan = 0;
    bahanChecked.forEach(b => {
        tambahanBahan += hargaBahan[b.value];
    });

    let total = (hargaUkuran[ukuran.value] + tambahanBahan) * jumlah;

    hargaText.innerHTML = "Rp " + total.toLocaleString("id-ID");
    hargaInput.value = total;
}

function onlyOne(checkbox) {
    let checkboxes = document.getElementsByName('bahan[]');
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}
</script>

</head>
<body>

<div class="card">
<h2>TOKO BAJU</h2>

<form method="post" action="hasil.php">
    <label>Nama</label>
    <input type="text" name="nama" required>

  <label>Ukuran</label><br>
<input type="radio" name="ukuran" value="S" onclick="updateHarga()"> S
<input type="radio" name="ukuran" value="M" onclick="updateHarga()"> M
<input type="radio" name="ukuran" value="L" onclick="updateHarga()"> L
<input type="radio" name="ukuran" value="XL" onclick="updateHarga()"> XL
<input type="radio" name="ukuran" value="XXL" onclick="updateHarga()"> XXL



 <label>Jumlah</label>
<input type="number" id="jumlah" name="jumlah" min="1" oninput="updateHarga()" required>

<label>Jenis Bahan</label><br>
<input type="checkbox" name="bahan[]" value="Katun" onclick="onlyOne(this); updateHarga()"> Katun <br>
<input type="checkbox" name="bahan[]" value="Satin" onclick="onlyOne(this); updateHarga()"> Satin <br>
<input type="checkbox" name="bahan[]" value="Rajut" onclick="onlyOne(this); updateHarga()"> Rajut


<p>
    <b>Total Harga:</b>
    <span id="hargaText">-</span>
</p>

<input type="hidden" name="harga" id="harga">

    <button type="submit">Proses</button>
</form>
</div>

</body>
</html>
