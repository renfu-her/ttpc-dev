<?php
//如果有開https就自動連上
if ($_SERVER["HTTPS"] <> "on") {
	$xredir = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	header("Location: " . $xredir);
}
//如果有開https就自動連上
//取得目前網址
$PAGE_URL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//取得目前網址
$compony = '警民聯防';
$year = '2023';
$version = '3.0.0';

//上傳檔案大小設定
$Upload_File_MaxSize = '2048'; //1024=1M
$Upload_File_MaxSizetxt = '檔案過大，請重新上傳小於2M圖檔'; //文字說明大小
$UpLoadPicMax_b = '1920'; //大圖縮圖
$UpLoadPicMax_s = '600'; //大圖縮圖


//我不是機器人設定
$google_data_sitekey = "6Ldna0kpAAAAABnnqz-CUVq4SvahzGCUyBktb2uk";
$google_secretKey = "6Ldna0kpAAAAAE1-Mc0iln4dT57dXCVuLx-6ugfL";

//PHP_Mailer設定檔
// $PHP_Mailer_host = "smtp.gmail.com"; // Specify main and backup SMTP servers
// $PHP_Mailer_SMTPAuth = "true"; // Enable SMTP authentication
// $PHP_Mailer_Username = "bloomami2022@gmail.com"; // SMTP username
// // $PHP_Mailer_Password="owectxuwfbapejsn"; // SMTP password
// $PHP_Mailer_Password = "vbahrmbbdiafomvf"; // SMTP password
// $PHP_Mailer_SMTPSecure = "tls"; // Enable TLS encryption, `ssl` also accepted
// $PHP_Mailer_Port = "587"; // TCP port to connect to
// //$mail->setFrom('寄件者gmail', '名字'); //寄件的Gmail
// $PHP_Mailer_setFrom_mail = "bloomami2022@gmail.com";
// $PHP_Mailer_setFrom_name = "網站發送信箱(請勿直接回信)"; //寄件的Gmail


$PHP_Mailer_host = "smtp.gmail.com";
$PHP_Mailer_SMTPAuth = true; // 改为布尔值
$PHP_Mailer_Username = "bloomami2022@gmail.com";
$PHP_Mailer_Password = "vbahrmbbdiafomvf"; // 使用环境变量
$PHP_Mailer_SMTPSecure = "tls";
$PHP_Mailer_Port = 587; // 改为整数
$PHP_Mailer_setFrom_mail = "bloomami2022@gmail.com";
$PHP_Mailer_setFrom_name = "网站发送信箱(请勿直接回信)";


//連線
putenv("TZ=Asia/Taipei"); //設定時區
ini_set('date.timezone', 'Asia/Taipei');
$Day = date("Y-m-d"); //今天日期

/* MySQL設定 */
define('DB_NAME', 'ttpc');
define('DB_USER', 'ttpc');
define('DB_PASSWD', 'ph8HKQls4uUsWmRxsSq0');
define('DB_HOST', '127.0.0.1');
define('DB_TYPE', 'mysql');

try {

	$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	//禁用預處理語句的模擬防注入攻擊

} catch (PDOException $e) {

	header("Content-Type:text/html; charset=utf-8");
	print_r($e->getMessage());
	die('<p><a href="https://www.webg.tw/" target="_blank">系統出現錯誤，請點此與管理員聯絡!!</a></p>');
}
