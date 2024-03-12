<?php
$customers = [
    "Customer 1",
    "Customer 2",
    "Customer 3",
    "Customer 4",
    "Customer 5",
];

$products = [
    "Mie Instan" => 3000,
    "Sabun Mandi" => 3500,
    "Shampoo" => 1000,
    "Sandal Jepit" => 11000,
    "Roti" => 12000,
    "Buku Tulis" => 5500,
    "Susu Kotak" => 6000,
    "Minyak Goreng" => 13000,
    "Ice Cream" => 11000,
    "Baterai" => 16000,
];

function displayOptions($options)
{
    foreach ($options as $option) {
        echo "<option value='$option'>$option</option>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer = $_POST["customer"];
    $payment = $_POST["payment"];

    $items = [];
    $totalPrice = 0;

    for ($i = 1; $i <= 3; $i++) {
        $product = $_POST["product$i"];
        $quantity = $_POST["quantity$i"];

        if ($product && $quantity > 0) {
            $subtotal = $products[$product] * $quantity;
            $items[] = array("product" => $product, "quantity" => $quantity, "subtotal" => $subtotal);
            $totalPrice += $subtotal;
        }
    }

    $discount = 0;
    if (isset($_POST["memberCard"])) {
        $discount = $totalPrice * 0.05; // 5% discount for member
        $totalPrice -= $discount;
    }

    echo "<h2>Struk Belanja</h2>";
    echo "Tanggal Transaksi: " . date("d-m-Y") . "<br>";
    echo "Waktu Transaksi: " . date("H:i:s") . "<br>";
    echo "Kode Transaksi: TRO" . rand(100, 999) . "<br>";
    echo "Customer: $customer<br>";
    echo "--------------------------------------<br>";

    echo "Produk | Qty | Harga Satuan | Jumlah<br>";
    echo "------- | --- | ------------ | --------<br>";
    foreach ($items as $item) {
        echo "{$item['product']} | {$item['quantity']} | Rp. {$products[$item['product']]} | Rp. {$item['subtotal']}<br>";
    }
    echo "--------------------------------------<br>";

    echo "Sub Total: Rp. $totalPrice<br>";
    if ($discount > 0) {
        echo "Diskon: Rp. $discount<br>";
    }
    echo "Total Bayar: Rp. " . number_format($totalPrice, 2) . "<br>";
    echo "Pembayaran: $payment<br>";
    echo "--------------------------------------<br>";
    echo "Terima Kasih Telah Berbelanja!<br>";
    echo "*Catatan:*<br>";
    echo "* Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan. *<br>";
    echo "--------------------------------------<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kasir Program</title>
</head>

<body>
    <h1>Kasir Program</h1>
    <form method="post">
        <label for="customer">Customer:</label>
        <select name="customer">
            <?php displayOptions($customers); ?>
        </select><br><br>

        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <label for="product<?= $i ?>">Product <?= $i ?>:</label>
            <select name="product<?= $i ?>">
                <option value="">- Pilih Produk -</option>
                <?php displayOptions(array_keys($products)); ?>
            </select>
            <input type="number" name="quantity<?= $i ?>" min="0" value="0"><br><br>
        <?php endfor; ?>

        <label for="memberCard">Member Card:</label>
        <input type="checkbox" name="memberCard" value="true"><br><br>

        <label for="payment">Payment Method:</label>
        <select name="payment">
            <option value="Cash">Cash</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Credit Card">Credit Card</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>