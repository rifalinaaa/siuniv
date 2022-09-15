<?php

include '../connect.php';

$query = 'SELECT id_dosen, nama_dosen FROM dosen';
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="POST">
    <table>
        <tr>
            <td>Kode</td>
            <td>:</td>
            <td><input type="text" name='kode'></td>
        </tr>
        <tr>
            <td>Mata Kuliah</td>
            <td>:</td>
            <td><input type="text" name='nama_matkul'></td>
        </tr>
        <tr>
            <td>SKS</td>
            <td>:</td>
            <td><input type="number" name='sks'></td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>:</td>
            <td><input type="number" name='semester'></td>
        </tr>
        <tr>
            <td>Dosen Pengajar</td>
            <td>:</td>
            <td>

            <select name='id_dosen' id='nama_dosen'>
                <option value="-">--Pilih salah satu--</option>
                <?php
                    while ($data=mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$data['id_dosen'].'">'.$data['nama_dosen'].'</option>';
                    }
                ?>
            </select>  
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' Value="kirim"></td>
            <td></td>
        </tr>
    </table>
    </form>
</body>
</html>