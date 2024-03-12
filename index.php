<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiShop</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif !important;

        }

        nav {
            background: black;
            margin-bottom: 15px;
            padding: 10px;
            padding-bottom: 28px;
            padding-left: 15px;
            font-size: larger;
        }

        nav a {
            padding: 5px;
            font-weight: bold;
            font-size: larger;
        }

        a {
            text-decoration: none;
            color: white;
        }

        footer {
            background: black;
            color: white;
            margin-bottom: 15px;
            padding: 10px;
            padding-bottom: 20px;
            padding-left: 15px;
            font-size: large;
            bottom: 0;
            width: 100%;
            position: absolute;
        }
    </style>
    
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div class="card mt-4">
        <h1>Selamat datang di SUMBER BERKAH <br></h1>
        <div class="card-body">
            <form action="transaksi.php" method="post">
                <div class="row">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <br>
                    <div class="row g-2 my-2">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <br>
                    </div>
                </div>
                <input name="btnSubmit" type="submit" value="Sign in">
                <input name="reset" type="reset" value="Cancel">
            </form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
   

</body>

</html>