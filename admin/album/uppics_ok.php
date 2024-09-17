<?php 
include "../include/check_all.php";
include "../common.func.php";
// 啟用錯誤報告
error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = $_FILES['imgfile'];

for ($i = 0; $i < count($files['tmp_name']); $i++) {
    if ($files['tmp_name'][$i] != '') {
        // 上傳開始
        $src = imagecreatefromjpeg($_FILES['imgfile']['tmp_name'][$i]);
        $src_w = imagesx($src);
        $src_h = imagesy($src);

        if ($src_w > $UpLoadPicMax_b) {
            $thumb_b_w = $UpLoadPicMax_b;
            $thumb_b_h = intval($src_h / $src_w * $UpLoadPicMax_b);
            $thumb_s_w = $UpLoadPicMax_s;
            $thumb_s_h = intval($src_h / $src_w * $UpLoadPicMax_s);
        } else {
            $thumb_b_w = $src_w;
            $thumb_b_h = $src_h;
            $thumb_s_w = $UpLoadPicMax_s;
            $thumb_s_h = intval($src_h / $src_w * $UpLoadPicMax_s);
        }

        $thumb_s = imagecreatetruecolor($thumb_s_w, $thumb_s_h);
        $thumb_b = imagecreatetruecolor($thumb_b_w, $thumb_b_h);

        imagecopyresampled($thumb_s, $src, 0, 0, 0, 0, $thumb_s_w, $thumb_s_h, $src_w, $src_h);
        imagecopyresampled($thumb_b, $src, 0, 0, 0, 0, $thumb_b_w, $thumb_b_h, $src_w, $src_h);

        $filename = $_FILES['imgfile']['name'][$i];
        $ext = strrchr($filename, ".");

        putenv("TZ=Asia/Taipei");
        $t1 = date("Y") - 1911;
        $t2 = date("md");
        $date = (int)($t1.$t2);
        $time = date("his");
        $rand_name = rand(100, 999);
        $pic_s = $date.$time.'-'.$rand_name.'_s'.$ext;
        $pic_b = $date.$time.'-'.$rand_name.$ext;

        imagejpeg($thumb_s, "../goods_pic/".$pic_s, 100);
        imagejpeg($thumb_b, "../goods_pic/".$pic_b, 90);

        if (strlen($pic_s) < 20) {
            $pic_s = '';
        }
        if (strlen($pic_b) < 18) {
            $pic_b = '';
        }

        $no = $_POST["no"];
        $uppics_class = $_POST["uppics_class"];
        $sort = 0;

        $sql = "INSERT INTO uppics (
            uppics_ing,
            uppics_class,
            uppics_pic_b,
            uppics_pic_s,
            uppics_sort
        )
        VALUES (
            :no,
            :uppics_class,
            :pic_b,
            :pic_s,
            :sort
        );";

        $result = $db->prepare($sql);
        $result->bindValue(':uppics_class', $uppics_class, PDO::PARAM_STR);
        $result->bindValue(':no', $no, PDO::PARAM_INT);
        $result->bindValue(':sort', $sort, PDO::PARAM_INT);
        $result->bindValue(':pic_s', $pic_s, PDO::PARAM_STR);
        $result->bindValue(':pic_b', $pic_b, PDO::PARAM_STR);
        $result->execute();
    }
}

$db = null;
?>
<script language="javascript">
location.href= ('./uppics.php?msg=add&no=<?=$no?>');
</script>