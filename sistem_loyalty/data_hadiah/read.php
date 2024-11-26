<?php
include "../koneksi.php";
session_start(); // Mulai session

// Check if the user is logged in
if (!isset($_SESSION['id_user'])) {
    header("Location: http://localhost/sistem_loyalty/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hadiah</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container{
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f2f2f2;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    
        a.button {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #80BCBD;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        a.button:hover {
            background-color: #AAD9BB;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Hadiah</h2>

    <a href="http://localhost/sistem_loyalty/data_hadiah/create.php" class="button">Create</a>
    <a href="http://localhost/sistem_loyalty/tukar_poin/loyaltyShop.php" class="button">Kembali</a>

    <table border='1'>
        <tr>
            <th>Nama Hadiah</th>
            <th>Harga Produk Satuan</th>
            <th>Action</th>
        </tr>
        <?php
        $query = "SELECT * FROM hadiah";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            echo "query gagal!";
        } 
        else{
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['nama_hadiah']."</td>
                        <td>".$row['harga_produk_satuan']." points</td>
                        <td>
                            <a href='http://localhost/sistem_loyalty/data_hadiah/update.php?id=".$row['id_hadiah']."' class='button'>Edit</a> 
                            <a href='http://localhost/sistem_loyalty/data_hadiah/delete.php?id=".$row['id_hadiah']."' class='button'>Delete</a>
                        </td>
                      </tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>
