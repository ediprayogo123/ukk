<?php
include "header.php";
session_start();

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];
    $nama = $_SESSION['username'];
    $text = $tanggal . "," . $jam . "," . $lokasi . ","  . $suhu . "</tr> \n";
    $data = "catatan/$nama.txt";
    $dirname = dirname($data);
    if (!is_dir($dirname)) {
        mkdir($dirname, 0075, true);
    }
    $fp = fopen($data, "a+");
    if (fwrite($fp, $text)) {
        echo '<script>alert("catatan berhasil di simpan");</script>';
    }
}
?>

<table border="1" align="center" class="table">
    <form action="" method="POST">
        <td>
            <table align="center">
                <tr>
                    <td>tanggal</td>
                    <td><input type="date" name="tanggal" id="tanggal"></td>
                </tr>
                <tr>
                    <td>jam</td>
                    <td><input type="time" name="jam" id="jam"></td>
                </tr>
                <tr>
                    <td>lokasi</td>
                    <td><input type="text" name="lokasi" id="lokasi"></td>
                </tr>
                <tr>
                    <td>suhu tubuh</td>
                    <td><input type="text" name="suhu" id="suhu"></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input type="submit" name="simpan" value="simpan"> </td>
                </tr>
            </table>
        </td>
    </form>
</table>


</body>

</html>