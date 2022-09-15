<?php

include '../connect.php';

$kode = $_GET['kode'];

$query = "SELECT kode, nama_matkul, sks, semester, matakuliah, id_dosen, nama_dosen 
            FROM matakuliah LEFT JOIN dosen USING (id_dosen) 
            WHERE kode= '$kode'";

$result = mysqli_query($connect, $query);

$data_dosen= mysqli_fetch_assoc($result);

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
    <h1>Ubah Data</h1>
    <form action="update.php" method="POST">
    <table>
        <tr>
            <td><label for='kode'>Kode</label></td>
            <td>:</td>
            <td><input type="text" name='kode' id='kode' readonly value="<?php echo $data_dosen['kode'];?>"></td>
        </tr>
        <tr>
            <td><label for='nama_matkul'>Matakuliah</label></td>
            <td>:</td>
            <td><input type="text" name='nama_matkul' id='nama_matkul' value="<?php echo $data_dosen['nama_matkul'];?>"></td>
        </tr>
        <tr>
            <td><label for='sks'>SKS</label></td>
            <td>:</td>
            <td><input type="number" name='sks' id='sks' value="<?php echo $data_dosen['sks'];?>"></td>
        </tr>
        <tr>
            <td><label for='semester'>Semester</label></td>
            <td>:</td>
            <td><input type="number" name='semester' id='semester' value="<?php echo $data_dosen['semester'];?>"></td>
        </tr>
        <tr>
            <td><label for='nama_dosen'>Dosen Pengajar</label></td>
            <td>:</td>
            <td>

            <select name='id_dosen' id='nama_dosen'>
                <?php
                    $query2= "SELECT id_dosen, nama_dosen FROM dosen";
                    $result2 = mysqli_query($connect, $query2);
                    while ($data=mysqli_fetch_assoc($result2)) {

                        if ($data_dosen['id_dosen']==$data['id_dosen']) {
                            echo 'selected';
                        }
                        echo '<option value="'.$data['id_dosen'].'">'.$data['nama_dosen'].'</option>';

                    }
                ?>
            </select>   
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type='submit' Value="kirim"></td>
        </tr>
    </table>
    </form>