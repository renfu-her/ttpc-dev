<?PHP
if (!isset($_SESSION)) {
	session_start();
}



echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
include "admin/common.func.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
$contact_name 		=	$_POST["contact_name"];
$contact_email 		=	$_POST["contact_email"];
$contact_tel 		=	$_POST["contact_tel"];
$contact_message 	=	$_POST["contact_message"];



//google我不是機器人
$captcha = $_POST['g-recaptcha-response'];
$secretKey = $google_secretKey;
$ip = $_SERVER['REMOTE_ADDR'];

$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response, true);

if ($responseKeys["success"]) { // success//google我不是機器人


	$edittime   =	date("Y-m-d H:i:s"); //新增時間

	if (!empty($_SERVER['HTTP_CLIENT_IP']))
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else
		$ip = $_SERVER['REMOTE_ADDR'];





	//圖片上傳判斷JPG還是PNG
	//取副檔名
	$filename = $_FILES['imgfile']['name']; //上傳檔案原始名稱
	$ext = strrchr($filename, "."); //附檔名

	//以時間取得時間亂數當成檔名.副檔名
	putenv("TZ=Asia/Taipei"); //調整時間為台北時區
	$t1 = date("Y") - 1911;
	$t2 = date("md");
	$date = (int)($t1 . $t2);
	$time = date("his");
	$pic_s = $date . $time . '_upfile_s' . $ext; //時間間亂檔名小圖
	$pic_b = $date . $time . '_upfile' . $ext; //時間間亂檔名大圖


	//處理 jpg圖檔
	if (($ext == '.jpg') || ($ext == '.jpeg') || ($ext == '.JPG') || ($ext == '.JPEG')) {

		// 取得上傳圖片
		$src = imagecreatefromjpeg($_FILES['imgfile']['tmp_name']);

		// 取得來源圖片長寬
		$src_w = imagesx($src);
		$src_h = imagesy($src);

		//如果寬度大於700才縮圖
		if ($src_w > $UpLoadPicMax_b) {
			// 假設要長寬 小圖不超過90*90  大圖不超過600*600
			//if($src_w > $src_h){
			$thumb_b_w = $UpLoadPicMax_b;
			$thumb_b_h = intval($src_h / $src_w * $UpLoadPicMax_b);

			$thumb_s_w = $UpLoadPicMax_s;
			$thumb_s_h = intval($src_h / $src_w * $UpLoadPicMax_s);
		} else { //圖的原長和寬
			$thumb_b_w = $src_w; //圖的原寬
			$thumb_b_h = $src_h; //圖的原高

			$thumb_s_w = $UpLoadPicMax_s;
			$thumb_s_h = intval($src_h / $src_w * $UpLoadPicMax_s);
		}

		// 建立縮圖
		$thumb_s = imagecreatetruecolor($thumb_s_w, $thumb_s_h);
		$thumb_b = imagecreatetruecolor($thumb_b_w, $thumb_b_h);

		// 開始縮圖
		imagecopyresampled($thumb_s, $src, 0, 0, 0, 0, $thumb_s_w, $thumb_s_h, $src_w, $src_h);
		imagecopyresampled($thumb_b, $src, 0, 0, 0, 0, $thumb_b_w, $thumb_b_h, $src_w, $src_h);

		// 儲存縮圖到指定goods_banner3目錄
		imagejpeg($thumb_s, "./upload/" . $pic_s, 100); //小圖
		imagejpeg($thumb_b, "./upload/" . $pic_b, 90); //大圖

	}
	//處理 jpg圖檔

	//處理png檔
	if (($ext == '.png') || ($ext == '.PNG')) {
		//獲取源圖gd圖像識別字
		$srcImg = imagecreatefrompng($_FILES['imgfile']['tmp_name']);

		// 取得來源小圖片長寬
		$src_w = imagesx($srcImg);
		$src_h = imagesy($srcImg);


		//如果寬度大於700才縮圖
		if ($src_w > $UpLoadPicMax_b) {
			// 假設要長寬 小圖不超過90*90  大圖不超過600*600
			//if($src_w > $src_h){
			$thumb_b_w = $UpLoadPicMax_b;
			$thumb_b_h = intval($src_h / $src_w * $UpLoadPicMax_b);

			$thumb_s_w = $UpLoadPicMax_s;
			$thumb_s_h = intval($src_h / $src_w * $UpLoadPicMax_s);
		} else { //圖的原長和寬
			$thumb_b_w = $src_w; //圖的原寬
			$thumb_b_h = $src_h; //圖的原高

			$thumb_s_w = $UpLoadPicMax_s;
			$thumb_s_h = intval($src_h / $src_w * $UpLoadPicMax_s);
		}


		//創建新圖
		$newImg_b = imagecreatetruecolor($thumb_b_w, $thumb_b_h);
		$newImg_s = imagecreatetruecolor($thumb_s_w, $thumb_s_h);


		//分配顏色 + alpha，將顏色填充到新圖上
		$alpha_b = imagecolorallocatealpha($newImg_b, 0, 0, 0, 127);
		imagefill($newImg_b, 0, 0, $alpha_b);

		$alpha_s = imagecolorallocatealpha($newImg_s, 0, 0, 0, 127);
		imagefill($newImg_s, 0, 0, $alpha_s);


		//將源圖拷貝到新圖上，並設置在保存 PNG 圖像時保存完整的 alpha 通道資訊
		imagecopyresampled($newImg_b, $srcImg, 0, 0, 0, 0, $thumb_b_w, $thumb_b_h, $src_w, $src_h);
		imagesavealpha($newImg_b, true);

		imagecopyresampled($newImg_s, $srcImg, 0, 0, 0, 0, $thumb_s_w, $thumb_s_h, $src_w, $src_h);
		imagesavealpha($newImg_s, true);

		// 儲存縮圖到指定goods_banner3目錄
		imagepng($newImg_b, "./upload/" . $pic_b);
		imagepng($newImg_s, "./upload/" . $pic_s);
	}

	//處理gif檔不縮圖，所以大小圖同一張

	if (($ext == '.GIF') || ($ext == '.gif')) {
		//上傳檔案
		//上傳到的地點(請已"/"結束)
		$upload_path = './upload/';

		//可接受的最大檔案大小(單位: bytes)
		//不設代表可以接受任意大小
		$max_size = '';

		/* 上傳程序開始 */

		//檢查是否有錯誤
		if (isset($_FILES['imgfile']) && sizeof($_FILES['imgfile']) > 0) {
			if ($_FILES['imgfile']['error'] > 0) {
				//發生錯誤
				//錯誤代碼資訊可以上php官網看:
				//http://tw.php.net/manual/en/features.file-upload.errors.php
				echo '上傳錯誤代碼: ' . $_FILES['imgfile']['error'] . '<br />';
				exit;
			}

			//是否有限制檔案大小?
			if (($max_size > 0) && ($_FILES['imgfile']['size'] > $max_size)) {
				//檔案過大
				echo '您上傳的檔案大小大於系統可接受的範圍<p>';
				echo '<input type="button" class="input" style="CURSOR:hand; height:25px; width:100px;" onclick="history.back()" value="Back" />';
				exit;
			}

			//檢查檔案是否已存在
			if (file_exists($upload_path . basename($_FILES['imgfile']['name']))) {
				echo '檔案已存在,請重新選擇上傳檔案<p>';
				echo '<input type="button" class="input" style="CURSOR:hand; height:25px; width:100px;" onclick="history.back()" value="Back" />';
				exit;
			}

			//檢查目錄是否存在, 不存在的話新增一個
			if (!is_dir($upload_path) && !mkdir($upload_path)) {
				//目錄不存在, 無法新增資料夾
				echo '系統無法新增資料夾';
				exit;
			}


			//移動已上傳的檔案
			$file_name = $pic_b; //檔案名稱
			$pic_s = $pic_b; //應為沒縮圖，所以讓大小圖都存同一個檔名

			move_uploaded_file($_FILES['imgfile']['tmp_name'], $upload_path . $file_name);
		}
		//上傳檔案

	}
	//處理gif檔不縮圖，所以大小圖同一張


	//圖片上傳
	//判斷是否有上傳檔案沒有就不寫入資料庫了//看扣除附檔名長度有沒有小於13和15
	if (strlen($pic_s) < 23)
		$pic_s = '';
	if (strlen($pic_b) < 21)
		$pic_b = '';

	//判斷是否有上傳檔案沒有就不寫入資料庫了//看扣除附檔名長度有沒有小於13和15

	$sql = "SELECT * FROM `webinfo`";
	$result = $db->prepare($sql); //防sql注入攻擊
	$result->execute();
	$rows = $result->fetch(PDO::FETCH_ASSOC);


	$send_email = $rows["send_email"]; //收件者

	//新增
	$sql = "insert into mail (
`name` ,
`mail` ,
`tel` ,
`message` ,
`date` ,
`ip`,
`pic_s`,
`pic_b`
)	VALUES (
:contact_name,
:contact_email,
:contact_tel,
:contact_message,
:edittime,
:ip,
:pic_s,
:pic_b
)";


	$result = $db->prepare($sql); //防sql注入攻擊
	// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	$result->bindValue(':contact_name', $contact_name, PDO::PARAM_STR);
	$result->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
	$result->bindValue(':contact_tel', $contact_tel, PDO::PARAM_STR);
	$result->bindValue(':contact_message', $contact_message, PDO::PARAM_STR);
	$result->bindValue(':pic_s', $pic_s, PDO::PARAM_STR);
	$result->bindValue(':pic_b', $pic_b, PDO::PARAM_STR);

	$result->bindValue(':edittime', $edittime, PDO::PARAM_STR);
	$result->bindValue(':ip', $ip, PDO::PARAM_STR);


	$result->execute();


	$db = null; // 關閉連線

	$HTTP_HOST = $_SERVER['HTTP_HOST']; //取網址

	//Mail
	$message  = "
		<table width='700' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td align='left'>姓名 ：$contact_name</td>
  </tr>
  <tr>
    <td align='left'>連絡電話 ： $contact_tel </td>
  </tr>";

	if ($pic_b <> '') {
		$message  .= "
	   <tr>
		<td align='left'>上傳圖檔 ：  http://$HTTP_HOST/upload/$pic_b> </td>
	  </tr>
	  ";
	}

	$message  .= " <tr>
    <td align='left'>電子郵件   ： $contact_email</td>
  </tr>  
  <tr>
    <td align='left'>留言   ： </td>
  </tr>

    <tr>
      <td align='left'>" . nl2br($contact_message) . "</td>
    </tr>
</table>
";


	set_time_limit(120);

	$send_email_array = explode(",", $send_email); //根据逗号分割存入数组
	foreach ($send_email_array as $recipient) {
		$recipient = trim($recipient); // 移除可能的空格
		if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
			// $mail->addAddress($recipient);
			$emails[] = $recipient;
		}
	}

	$postData = [
		'from_email' => 'bloomami2022@gmail.com',
		'from_name' => 'TTPC 警民聯防',
		'emails' => $emails,
		'message' => $message,
		'subject' => '網站線上申請',
		'mail_username' => 'bloomami2022@gmail.com',
		'mail_password' => 'vbahrmbbdiafomvf',
	];

	$ch = curl_init('https://message-sent.dev-vue.com/api/send-mail');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

	$response = curl_exec($ch);
	curl_close($ch);

	if ($response === false) {
		echo "<Script Language =\"Javascript\">";
		echo "alert('伺服器寄送失敗，或請直接來信或來電連繫，謝謝您!');";
		echo "location='./';";
		echo "</script>";
	} else {
		echo "<Script Language =\"Javascript\">";
		echo "alert('已順利送出資訊，我們將會盡快與您做聯繫，謝謝您!');";
		echo "location='./';";
		echo "</script>";
	}
	// //mail發送

} else { // error//google我不是機器人
	echo '<script language="javascript">';
	echo 'alert("請勾選 我不是機器人");';
	echo "history.back();";
	echo '</script>';
	exit();
}
//google我不是機器人
