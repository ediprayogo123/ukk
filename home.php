<?php
include "header.php";
session_start();
?>


<table class="table" border="1" align="center">
    <td>selamat datang <?= $_SESSION['username'] ?>di aplikasi peduli diri </td>
</table>
</body>

</html>