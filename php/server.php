<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = "qlsachonline";
$conn = mysqli_connect($hostname, $username, $password,$dbname,3307);

if (!$conn) {
 die('Không thể kết nối: ' . mysqli_error($conn));
 exit();
}
//echo 'Kết nối thành công'; //xuat ra man hinh web
mysqli_set_charset($conn,"utf8");//bo dau tieng viet

//mysql_set_charset('utf8', $con);

?>
