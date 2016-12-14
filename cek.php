<?php
/* Check User Script */
error_reporting (1);
session_start();  // Start Session
include "koneksi.php";
// Conver to simple variables
$username = $_POST['username'];
$password = $_POST['password'];

// Convert password to md5 hash
$password = md5($password);

// check if the user info validates the db
$sql = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
$login_check = mysql_num_rows($sql);

if($login_check > 0){
    while($hasil = mysql_fetch_array($sql)){
    
        // Register some session variables!
        $_SESSION['username'] 	= $hasil ['username'];
        $_SESSION['password'] 	= $hasil ['password'];
        $_SESSION['level'] 		= $hasil ['level'];
        $_SESSION['status_user'] 	= $hasil ['status_user'];
		$_SESSION['nik'] 		= $hasil ['nik'];
		$_SESSION['email'] 		= $hasil ['email'];
		
		if ($hasil['status_user'] == "Aktif"){
		echo "<script>
		  location.href='system/index.php?menu=beranda&sub_menu=beranda'
		</script>";
		}
	}
} else {
echo "
	<script language='javascript'>
	alert ('User atau Password Salah');
	location.href='index.php';
</script>";
}
?>