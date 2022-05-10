<?php
if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $text = $nik . "," . $nama . "\n";
    $fp = fopen('config.txt', 'a+');
    if (fwrite($fp, $text)) {
        echo ' <script>alert("anda Berhasil Mendaftar!");</script>';
    }
} else if (isset($_POST['masuk'])) {
    $data = file_get_contents("config.txt");
    $contents = explode("\n", $data);
    foreach ($contents as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];

        if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location:home.php');
        } else {
            echo '<script>alert("nik atau nama salahS");</script>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin-top: 300px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td><input type="text" name="nik" placeholder="Nik"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nama" placeholder="Nama">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="daftar" value="saya penguna baru">
                    <input type="submit" name="masuk" value="Masuk">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>