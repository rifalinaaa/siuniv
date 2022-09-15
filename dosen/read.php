<?php
include '../connect.php'; //karena diluar

$query = "SELECT*FROM dosen";
$result = mysqli_query($connect, $query); //mengeksekusi dr dollar connect
$num = mysqli_num_rows($result);
?>

<body>
    <table border='1'>
        <h2>Data dosen</h2>
        <tr>
            <th>No.</th>
            <th>Nama Dosen</th>
            <th>Telepon</th>
            <th>Aksi</th>
</tr>

<?php
if($num > 0) 
{
    $no = 1;
    while($data = mysqli_fetch_assoc($result))
    {
        echo"<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $data['nama_dosen'] . "</td>";
        echo "<td>" . $data['telp'] . "</td>";
        echo "<td><a href='form-update.php?id_dosen=" . $data['id_dosen'] . "'>Edit</a> | ";
        echo "<td><a href= 'delete.php?id_dosen=" . $data['id_dosen'] . "'onclick= 'return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a></td>";
        echo "</tr>";
        $no++;
    }
}
else{
    echo "<td colspan='3'>tidak ada data</td>";
}
?>
</table>