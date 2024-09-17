<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
include "../include/check_all.php";//檢查登入權限和使用者是否被凍
include "../include/check_powerisroot.php";//檢查有沒有最高權限=0結
include "../common.func.php";

$sql="SELECT * FROM `webinfo`";
$result = $db->prepare("$sql");//防sql注入攻擊
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>後台管理系統</title>  
<?PHP include '../include_head.php';?> 
<!-- 表單css -->
<link rel="stylesheet" href="/admin/style_form.css">  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?PHP include '../phpinclude_body.php';?>
<div class="wrapper">
<?PHP include '../head.php';?> 
  <!-- Left side column. contains the logo and sidebar -->
<?PHP include '../menu.php';?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">  
</section>
<!-- Main 內容開始 -->
<section class="content">
  <div class="row">
    <div class=" col-xs-12 col-md-12 col-sm-12 col-xs-12">
      <div class="info-box txt_main">
<div class="box-header txt_12">
<span>|| 後台管理介面 > 網站基本資料設定</span>
    <div class="box-tools">
    
    </div>
</div>
<span class="txt_12_red">
        <?PHP 
		//取得資料新增修改刪除狀態
		if(isset($_GET['msg'])){
			$msg	= $_GET['msg'];
			switch($msg){
				case 'add':
					echo $msg='【資料狀態】：&nbsp;&nbsp;新增成功';
				break;
				case 'updata':
					echo $msg='【資料狀態】：&nbsp;&nbsp;修改成功';
				break;
				case 'del':
					echo $msg='【資料狀態】：&nbsp;&nbsp;刪除成功';
				break;
	}		
}
		?>
 </span>
<form  class="form-horizontal" method="post" action="edit_ok.php" name="form" id="form" data-toggle="validator" enctype="multipart/form-data">
<div class="text-center txt_title">網站基本資料設定</div>
<div class="box-body">
	<div class="form-group">
   		<label class="col-md-2 control-label">公司網站名稱：</label>
    	<div class="col-md-10">       
    	<input name="conpany" type="text" id="conpany" value="<?=$rows["conpany"]; ?>"  required="required" data-error="請填寫公司網站名稱" />
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">跑馬燈文字：</label>
    	<div class="col-md-10">       
    	<input name="runtxt" type="text" id="runtxt" value="<?=$rows["runtxt"]; ?>"/>
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">關鍵字：</label>
    	<div class="col-md-10">       
    	<textarea name="keywords" wrap="virtual" id="keywords" style="height:100px;"><?=$rows["keywords"]; ?></textarea>
        <DIV class="txt_12_gl1">說明：友好搜尋引擎最佳化SEO,每個關鍵字中間用,分隔,建議創10~20個關鍵字(範例:網頁設計,程式設計,網頁行銷)</DIV>
   	 	</div>
     </div>	

      <div class="form-group">
   		<label class="col-md-2 control-label">網站描述：</label>
    	<div class="col-md-10">       
    	 <textarea name="description" wrap="virtual" id="description"  style="height:100px;"><?=$rows["description"]; ?></textarea>
        <DIV class="txt_12_gl1" >說明：友好搜尋引擎最佳化SEO,網頁內容簡述,介紹公司及商品等簡單資訊,當網站分享於FB或Line等社群網站時所呈現的預設文字</DIV>
   	 	</div>
     </div>	
 
     <div class="form-group">
   		<label class="col-md-2 control-label">網站分享圖：</label>
    	<div class="col-md-10">    
       <!--預覽區塊-->
    	<label for="imgfile">
        	<img id="view_uppic" src="../goods_pic/<?=$rows["share_pic"]; ?>" class="view_uppic" /> 
        </label>		
      	<!--預覽區塊-->    
			<input name="imgfile" type="file" id="imgfile" onChange="chkfile(this);" accept="image/gif, image/jpeg, image/png" />   
        <DIV class="txt_12_gl1">說明：友好搜尋引擎最佳化SEO,當網站分享於FB或Line等社群網站時所呈現的預設圖片</DIV>
   	 	</div>
     </div>
      <div class="form-group">
   		<label class="col-md-2 control-label">接收mail設定：</label>
    	<div class="col-md-10">       
    	<input name="send_email" type="text" id="send_email" value="<?=$rows["send_email"]; ?>"/>
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>
     <!--<div class="form-group">
   		<label class="col-md-2 control-label">跑馬燈文字：</label>
    	<div class="col-md-10">       
    	 <textarea name="runtxt" wrap="virtual" id="runtxt" style="height:100px;"><?=$rows["runtxt"]; ?></textarea>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">電話：</label>
    	<div class="col-md-10">       
    	<input name="tel" type="text" id="tel"  value="<?=$rows["tel"]; ?>" />
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">傳真：</label>
    	<div class="col-md-10">       
    	<input name="fax" type="text" id="fax"  value="<?=$rows["fax"]; ?>" />
   	 	</div>
     </div>
    <div class="form-group">
   		<label class="col-md-2 control-label">地址：</label>
    	<div class="col-md-10">       
    	<input name="address" type="text" id="address"  value="<?=$rows["address"]; ?>" />
   	 	</div>
     </div>
     <div class="form-group">
   		<label class="col-md-2 control-label">Line ID：</label>
    	<div class="col-md-10">       
    	<input name="line" type="text" id="line"  value="<?=$rows["line"]; ?>" />
   	 	</div>
     </div>
     <div class="form-group">
   		<label class="col-md-2 control-label">服務時間：</label>
    	<div class="col-md-10">       
    	<input name="servicetime" type="text" id="servicetime" value="<?=$rows["servicetime"]; ?>" />
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">地址：</label>
    	<div class="col-md-10">       
    	 <input name="address" type="text" id="address" value="<?=$rows["address"]; ?>"/>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">呈現E-Mail：</label>
    	<div class="col-md-10">       
    	<input name="email" type="text" id="email" value="<?=$rows["email"]; ?>"/>
    	<DIV class="txt_12_gl1">說明：網站內所呈現的E-Mail</DIV>
   	 	</div>
     </div>	-->
     
     

     
    	 <div class="col-md-10 pull-right"> 
     	<input type="submit" name="Submit2" value="儲存修改" class="btn btn-info" style="width:150px;" />
        </div> 
</div>


</form>


 
  
       
      </DIV>
    </DIV>
  </DIV>
</section>
<!-- Main 內容結束 -->
</div>
<!-- /.content-wrapper -->
<?PHP include '../footer.php';?> 
<?PHP include '../include_js.php';?>  
<!--引用 Validator-->
<script src="../../js/validator.min.js"></script>

<!--執行 Validator-->
<script>
$('#form').validator().on('submit', function(e) {
if (e.isDefaultPrevented()) { // 未驗證通過 則不處理
return;
} else { // 通过后，送出表单
//alert("已送出表單");
}
//e.preventDefault();  防止原始 form 提交表单
});
</script>
<!--檢查上傳檔案-->
<?PHP include '../include/chkfile_size.php';?> 
<!--檢查上傳檔案-->

<!--預覽區塊-->	
		<script>  
		 $('#imgfile').change(function() {
		  var file = $('#imgfile')[0].files[0];
		  var reader = new FileReader;
		  reader.onload = function(e) {
			$('#view_uppic').attr('src', e.target.result);
		  };
		  reader.readAsDataURL(file);
		});
		</script>  
<!--預覽區塊--> 
</div> 
</body>
</html>
