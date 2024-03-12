<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>History Transaksi</title>
</head>

<body>
    <h1>History Transaksi</h1>
    <table border="1">
        <tr>
            <th>Tanggal Transaksi</th>
            <th>Customer</th>
            <th>Total Pembayaran</th>
        </tr>
        <?php
        $lines = file(FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            list($tanggal, $customer, $total) = explode("\t", $line);
            echo "<tr>";
            echo "<td>$tanggal</td>";
            echo "<td>$customer</td>";
            echo "<td>$total</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
