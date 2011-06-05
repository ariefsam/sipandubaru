<?php
session_start();
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
if ($_POST['submit']) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $q = mysql_query("SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    $z = mysql_fetch_array($q);
    //print_r($z);
    if (mysql_num_rows($q) > 0) {
        $_SESSION['petugas'] = $z;
        header("Location:index.php");
    }
    else
        $error = "Kombinasi username dan password salah";
}
else if ($_GET['action'] == "logout") {
    session_destroy();
    $error = "Anda telah berhasil logout";
}
$i = tanggalan();
?>
<div id="inner">
    <div id="sidebar">
        <div id="kotak"><h2>Selamat Datang</h2>
            <p>Sistem ini akan membantu anda melakukan pendataan pelayanan pada Posyandu.</p>
            <p>Untuk mengisi berita acara, silahkan masuk ke menu <a href="administrasi.php">ADMINISTRASI POSYANDU</a></p>
            <p>Untuk mendaftarkan anak yang belum terdaftar, masuk ke menu<a href="daftar.php">DAFTARKAN ANAK</a></p>
        </div>
        <div id="kotak"><h2>Informasi Penting</h2>
            <p>Pelayan Kesehatan yang harus diberikan bulan ini:</p>
            <ul><li>Imunisasi Polio</li>
                <li>Vitamin A</li>
            </ul>
        </div>
    </div>
    <div id="content">
        <div id="content-top">
            <h1>Login</h1>
            <div>
                <form action="" method="post">
                    <table>
<?php echo $error ?>
                        <tr><td>Username </td><td> <input type="text" name="username" /></td></tr>
                        <tr><td>Password </td><td> <input type="password" name="password" /></td></tr>
                        <tr><td></td><td style="text-align: right"><input type="submit" name="submit" value="Login" /></td></tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>
<?php require 'footer.php'; ?>