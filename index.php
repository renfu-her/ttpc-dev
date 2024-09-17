<?PHP
include "./admin/common.func.php";

$sql="SELECT * FROM `webinfo`";
$result = $db->prepare("$sql");//防sql注入攻擊
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta http-equiv="Content-Language" content="zh-tw">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="<?=$rows["keywords"];?>" />
		<meta name="description" content="<?=$rows["description"];?>" />
		<meta name="company" content="<?=$rows["conpany"];?>" />
		<meta name="robots" content="all">
		<meta name="robots" content="index,follow">
		<meta name="distribution" content="Taiwan"/>
		<meta name="revisit-after" content="7 days"/>
		<meta name="rating" content="general"/>
		<meta property="og:title" content="<?=$rows["conpany"];?>"/>
		<meta property="og:description" content="<?=$rows["description"];?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:site_name" content="<?=$rows["conpany"];?>" />
		<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>"/>
		<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>" />	
		<title><?=$rows["conpany"];?></title>
        <link rel="icon" type="image/x-icon" href="./assets/favicon.svg" />

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google reCAPTCHA -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- AOS core CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />
        <!-- Owl Carousel CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <div class="d-flex justify-content-center align-items-center w-100 text-warning">
                    <marquee width="100%" scrollamount="5" behavior="slice"><img class="pe-3" src="./assets/img/ico_arrow.png"><?=$rows["runtxt"];?></marquee>    
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-center">
                    <div class="kv-img text-center">
                        <img class="img-fluid" src="./assets/img/bg_kv.jpg">
                    </div>
                    <div class="kv-caption">
                        <div class="row align-items-center gx-3 gx-lg-5">
                            <div class="col-3 col-lg-auto px-1 px-md-4" data-aos="fade-right">
                                <img class="img-fluid ps-0 ps-md-4" src="./assets/img/kv_left.png"></img>
                            </div>
                            <div class="col-9 col-lg px-1 px-md-5" data-aos="fade-left" data-aos-delay="150" data-aos-duration="800">
                                <div class="d-flex flex-column justify-content-center align-items-start text-white ps-0 ps-lg-5">
                                    <h2 class="fw-bold mb-1 mb-md-4">歡迎加入與警民聯防工作</h2>
                                    <h5 class="mb-1 mb-md-5">警力有限  民力無窮  警民合作  安定繁榮</h5>
                                    <a class="btn rounded-pill fw-bold text-white bg-primary-gradient" href="#form" role="button"><h5 class="fw-bold mb-0">加入我們</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </header>

        <div class="content-body">
            <!-- Intro-->
            <section class="intro-section" id="intro">
                <div class="container-fluid px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center align-items-center">                   
                        <div class="col-lg-7 px-3 px-md-5 text-white order-1 order-md-0" data-aos="zoom-in" data-aos-duration="800">
                            <h2 class="fw-bold text-dark mb-3 pt-lg-5">協會介紹</h2>
                            <h4 class="mb-3" style="color: #E95514;">社團字號:北市府社字第1632號</h4>
                            <h5 class="lh-base text-dark">
                                為確保市民的生命財產安全，積極推展本市「建立全國社區治安維護體系—守望相助再出發推行方案」
                                ，加強輔導本市各行政區內里、社區、公寓大廈成立守望相助巡守隊，並輔導轄內金融機構、 機關、學校
                                、銀樓、當鋪、加油站、二十四小時營業超商、一般商店、居民住戶等裝設「家戶聯防」 、「警民連線」、「錄
                                影監視」系統等安全設施，構成綿密之社區安全防護網，協助維護社區治安 工作，俾藉由警民合作共同
                                預防及打擊犯罪；並經常舉辦輔導青少年、反綁架宣導婦女人身安全 防護等活動，建立良好的警民關
                                係，期警民團結一 條心，共同維護社會治安。
                            </h5>
                            <img class="img-fluid mb-3 mb-md-5" src="./assets/img/img_intro_left.jpg">
                            <h4 class="mb-0">
                                <a class="btn rounded-pill fw-bold text-white bg-primary-gradient" href="http://www.youtube.com" role="button" target="_blank"><img class="img-fluid pe-2" src="./assets/img/ic_arr-right.png">協會成立章程影片</a>   
                            </h4>
                            
                        </div>
                        <div class="col-lg-3 text-center p-5 p-lg-0 order-0 order-md-1" data-aos="zoom-in-up" data-aos-easing="ease-out-cubic" data-aos-delay="450" data-aos-duration="1000">
                            <img class="img-fluid px-5 px-lg-0" src="./assets/img/img_badge.png" alt="..." />
                        </div>
                    </div>
                </div>
            </section>
            <!-- Gallery-->
            <section class="gallery-section" id="gallery" data-aos="zoom-in" data-aos-easing="ease-in-out" data-aos-anchor="intro">
                <div class="container-fluid px-4 px-lg-5">
                    <div class="row justify-content-center align-items-center gx-4 gx-lg-5 px-3">
                        <div class="col-12 col-md-3 col-lg-auto py-1">
                            <h2 class="fw-bold text-dark mb-2 mb-md-4">活動相簿</h2>
                            <p class="mb-2 mb-md-4" style="color: #727171;">歷年相關活動影集</p>
                            <div class="d-flex align-items-center">
                                <div id="owl-custom-dots" class="owl-dots">
                                    
                                 <?PHP 
								$banner_o=0;
								$sql_banner="
								SELECT * FROM `album` 
								WHERE `album_hide`='1'
								ORDER BY `album_sort` ,`album_no` DESC 
								";//DESC是遞減
								$result_banner = $db->prepare("$sql_banner");//防sql注入攻擊
								$result_banner->execute();
								$total_banner=$result_banner->rowCount();//算出總筆數
								//列出內容
								if($total_banner<>0){//如果判斷結果有值才跑回圈抓資
								   while($rows_banner = $result_banner->fetch(PDO::FETCH_ASSOC))
								{ 
								?>
									<button role="button" class="owl-dot <?PHP if($banner_o==0) echo ' active';?>"><span></span></button>
								 <?PHP
								$banner_o=$banner_o+1;//判斷第一次要給li style值
								}}
								?>  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg col-xxl-9 py-1">
                            <div id="gallery-owl-carousel" class="owl-carousel owl-theme owl-loaded">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage">
                                        
                                      <?PHP 
$album_o=0;
$sql_album="
SELECT * FROM `album` 
WHERE `album_hide`='1'
ORDER BY `album_sort` ,`album_no` DESC 
";//DESC是遞減
$result_album = $db->prepare("$sql_album");//防sql注入攻擊
$result_album->execute();
$total_album=$result_album->rowCount();//算出總筆數
//列出內容
if($total_album<>0){//如果判斷結果有值才跑回圈抓資
   while($rows_album = $result_album->fetch(PDO::FETCH_ASSOC))
{ 
$album_o=$album_o+1;//判斷第一次要給li style值
?> 
                                    <div class="owl-item" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="150" data-aos-duration="1500" data-aos-anchor="#gallery">
                                        <div class="card p-3">
                                            <div class="card-img">
                                                <a class="hover-img" role="button" data-bs-toggle="modal" data-bs-target="#galleryModal_<?=$album_o?>">
                                                    <img class="card-img-top" src="./admin/goods_pic/<?=$rows_album["album_pic_b"]; ?>" alt="<?=$rows_album["album_title"]; ?>">
                                                </a>
                                            </div>
                                            <div class="card-body px-0">
                                                <a role="button" data-bs-toggle="modal" data-bs-target="#galleryModal_<?=$album_o?>">
                                                    <h4 class="tag mb-0"><?=$rows_album["album_title"]; ?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
<?PHP
}}
?>			
                                       
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form -->
            <section class="form-section" id="form">
                <div class="container-fluid ps-0 ps-lg-8">
                    <div class="row align-items-center bg-lightwhite p-3 p-lg-5" id="forms" data-aos="zoom-out-left" data-aos-anchor="#gallery" data-aos-easing="ease-in-out" data-aos-delay="800">
                        <div class="col-12 col-md-auto mx-auto px-2 px-lg-4">
                            <div class="d-flex flex-column justify-content-center align-items-center px-5 px-md-0 text-center">
                                <img class="img-fluid mb-4 px-5 px-md-2" src="./assets/img/img_alert.png">
                                <h2 class="mb-3">
                                    線上申請<br>
                                    加入協會
                                </h2>
                                <h5 class="fw-normal mb-0">
                                    請填寫表單並送出申請<br>
                                    我們將會與您聯繫
                                </h5>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mx-auto py-2 py-lg-5">
                          
                                 <form class=" py-2 py-lg-5"  action="send_contact.php" method="post"   enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="username" class="form-label" ><span style="color:#ff0000">*</span>姓名</label>
                                    <input type="text" class="form-control"  name="contact_name" id="contact_name" required>
                                </div>
                                <div class="mb-4">
                                    <label for="formFile" class="form-label" >上傳照片</label>
                                    <input type="file" class="form-control" name="imgfile" id="imgfile"  onChange="chkfile(this);" accept="image/gif, image/jpeg, image/png">
                                  </div>
                                <div class="mb-4">
                                    <label for="phone" class="form-label"><span style="color:#ff0000">*</span>聯絡電話</label>
                                    <input type="number" class="form-control" id="contact_tel" name="contact_tel" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label"><span style="color:#ff0000">*</span>電子郵件</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="form-label"><span style="color:#ff0000">*</span>備註</label>
                                    <textarea class="form-control" rows="4"  id="contact_message" name="contact_message" required></textarea>
                                </div>
                                <div class="w-100 text-center mb-3">
                                   
                                    <script src='https://www.google.com/recaptcha/api.js'></script>	   
						   <div class="g-recaptcha wow fadeInDown animated" data-sitekey="<?=$google_data_sitekey?>"></div>
                                    <br/>
                                   
                                </div>
                
                                <input type="submit" class="btn btn-main rounded-pill fw-bold w-100 bg-primary-gradient py-2 py-md-3 text-white fw-semibold" value="送出申請" style="font-size: 1.25rem;"></input>
                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
        <!-- Side Social Link -->
        <aside class="sidebar">
            <ul class="list-unstyled">
                <li data-aos="zoom-in-up" data-aos-easing="ease-in-out" data-aos-delay="150" data-aos-duration="1500" data-aos-anchor=".navbar"><a href="https://lin.ee/M3MrGtP" role="button" target="_blank"><img src="./assets/img/ic_line.png" srcset="./assets/img/ic_line.svg" class="side_ic ic_line"></a></li>
            </ul>
        </aside>
        <!-- Footer-->
        <footer class="footer bg-white text-center">
            <div class="container px-4 px-lg-5">
                <div class="d-flex flex-md-row flex-column justify-content-center align-items-md-center align-items-start">
                    <div class="mb-3 pe-md-4 pe-0">
                        <img class="img-fluid pe-2" src="./assets/img/ic_phone.png">
                        <a href="tel:02-2930-5695" style="color: #727171;" role="button" target="_blank">(02)2930-5695</a>
                    </div>
                    <div class="mb-3 pe-md-4 pe-0">
                        <img class="img-fluid pe-2" src="./assets/img/ic_marker.png">
                        <a href="https://maps.app.goo.gl/HHevMhj9ebLdR3qp6" style="color: #727171;" role="button" target="_blank">台北市文山區育英街2巷1弄11號</a>
                    </div>
                    <span class="mb-3">Copyright &copy; 2023 台北市警民聯防協會 著作權所有</span>
                </div>
            </div>
        </footer>
        
<?PHP 
$album_o=0;
$sql_album="
SELECT * FROM `album` 
WHERE `album_hide`='1'
ORDER BY `album_sort` ,`album_no` DESC 
";//DESC是遞減
$result_album = $db->prepare("$sql_album");//防sql注入攻擊
$result_album->execute();
$total_album=$result_album->rowCount();//算出總筆數
//列出內容
if($total_album<>0){//如果判斷結果有值才跑回圈抓資
   while($rows_album = $result_album->fetch(PDO::FETCH_ASSOC))
{ 
$album_o=$album_o+1;//判斷第一次要給li style值
?> 
<!-- Modal -->
<div class="modal fade" id="galleryModal_<?=$album_o?>" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<h2 class="text-dark text-center py-3 py-lg-5"><?=$rows_album["album_title"]; ?></h2>
						<div class="col-md-12 mb-3" id="img-responsive">
							<?=$rows_album["album_content"]; ?>
						</div>
						<?PHP
$uppics_class = 'album';//所屬類別						
$album_no=$rows_album["album_no"];//no
	
$sql_uppics="
SELECT * FROM `uppics` 
WHERE `uppics_class` =:uppics_class && `uppics_ing` =:album_no
ORDER BY  `uppics_sort` ASC 
";//sql語法


$result_uppics = $db->prepare("$sql_uppics");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
$result_uppics->bindValue(':album_no', $album_no, PDO::PARAM_INT);
$result_uppics->bindValue(':uppics_class', $uppics_class, PDO::PARAM_STR);
$result_uppics->execute();
$counts_uppics=$result_uppics->rowCount();//算出總筆數

if($counts_uppics<>0){//如果判斷結果有值才跑回圈抓資料
   while($rows_uppics = $result_uppics->fetch(PDO::FETCH_ASSOC)) {
$no_id=$no_id+1;
?>	
						
						<div class="col-md-6 mb-3">
							<img class="img-fluid" src="./admin/goods_pic/<?=$rows_uppics["uppics_pic_b"]; ?>" width="100%" alt="">
						</div>
<?PHP
}
?>	
<?PHP
}
?>							
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-center border-0">
				<button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal"><h5 class="fw-semibold mb-0 px-4">關閉</h5></button>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->     
<?PHP
}}
?>	
        <!-- Jquery JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- AOS core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <!-- Owl Carousel JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- Iconify core JavaScript -->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <!-- Core theme JS-->
        <script>
            $(document).ready(function(){
                AOS.init({
                    offset: 120,
                    once: true,
                });
    
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop: false, // 是否循環播放
                    nav: true, // 顯示控制箭頭
                    rewind: true,
                    navText: ['<iconify-icon icon="iconamoon:arrow-left-2-light" style="color: #b5b5b6;" width="64"></iconify-icon>','<iconify-icon icon="iconamoon:arrow-right-2-light" style="color: #b5b5b6;" width="64"></iconify-icon>'],
                    dotsEach: true, // 顯示點點
                    dotsContainer: '#owl-custom-dots',
                    autoplay: true,
                    autoplaySpeed: 500,
                    lazyLoad: true,
                    responsive:{
                        0:{
                        items:1, // 螢幕大小為 0~575 顯示 1 個項目
                        stagePadding: 20, // 物件內距
                        margin: 25, // 物件外距
                        },
                        576: {
                            items: 2, // 螢幕大小為 576~767 顯示 2 個項目
                            stagePadding: 20, // 物件內距
                            margin: 25, // 物件外距   
                        },
                        768:{
                            items:2, // 螢幕大小為 768~991 顯示 3 個項目
                            stagePadding: 30, // 物件內距
                            margin: 25, // 物件外距
                        },
                        992:{
                            items:3, // 螢幕大小為 992 以上 顯示 5 個項目
                            stagePadding: 30, // 物件內距
                            margin: 25, // 物件外距
                        },
                        1600:{
                            items:4, // 螢幕大小為 992 以上 顯示 5 個項目
                            stagePadding: 30, // 物件內距
                            margin: 25, // 物件外距
                        }
                    }
                });
    
                // Go to the next item
                $('.owl-control-next').click(function() {
                    owl.trigger('next.owl.carousel');
                })
                // Go to the previous item
                $('.owl-control-prev').click(function() {
                    // With optional speed parameter
                    // Parameters has to be in square bracket '[]'
                    owl.trigger('prev.owl.carousel', [300]);
                })
    
            });
        </script>
<!--變更圖片和frame ID成為響應式大小-->
<script type="text/javascript">
	$(document).ready(function() {
		$("#img-responsive img")
			.addClass("img-responsive")//增加bootstrap內健RWD寬度
			.css("height",'');//高度清除
		
	});
</script>
<!--變更圖片和frame ID成為響應式大小-->
<style>
#img-responsive,#img-responsive>img,#img-responsive a>img{display:block;max-width:100%;height:auto}
#img-responsive iframe {  width: 100%; height: auto; aspect-ratio: 16/9;}/*youtube崁入自動100%*/
</style>
   <!--表單避免重複發送-->
 <script>
    // 取得表單元素
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('[type="submit"]');

    // 禁用送出按鈕
   form.addEventListener('submit', (e) => {
   e.preventDefault();
	  if (!form.checkValidity()) {
		// 如果表單未通過驗證，就不執行後續的程式碼
	  } else {
		submitBtn.disabled = true;
		submitBtn.value = '上傳中...';
		// 在這裡加入檔案上傳的程式碼
		form.submit(); // 手動送出表單
	  }
	});
</script>
<!--表單避免重複發送-->
<!--檢查上傳檔案-->
<script>
    function chkfile(target) {
        var fileSize = 0;
        if (target.files && target.files.length > 0) {
            fileSize = target.files[0].size;
        } else {
            // 如果不支持File API，這裡可以添加一些其他處理邏輯
            //alert('您的瀏覽器不支持檔案上傳功能，建議使用新版瀏覽器。');
           // return;
        }

        var sizeInKB = fileSize / 1024;

        if (sizeInKB > 2048) {
            alert('檔案過大，請重新上傳小於2M的圖檔');
            target.value = "";
            return;
        }

        var reg = /\.(jpg|jpeg|png|gif)$/i;
        if (!target.value.match(reg)) {
            alert('您選擇的檔案不是jpg、png或gif格式!!!');
            target.value = "";
        }
    }
</script>
<!--檢查上傳檔案-->
    </body>
</html>
