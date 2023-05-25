<?php //запуск сессии
session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/db.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/product.php'); //рут - корневая папка
if ($_POST['Login'] && $_POST['Password'])//вытаскиваем из поступающих с инптутов данные о логине и пароле
{
    $login=addslashes($_POST['Login']); //переменной логин присваиваем данные логина с поста
    $password=md5($_POST['Password']); //переменной логин присваиваем данные пароля с поста мд5 - выводит спецсимволы которых в аддхэше нет
    $mysqli = new Database; //обращаемся к классу database который прописан в дб
     $mysqli->getConnection(); //подключает датабазу mysqli
     $sql = "Select * from Account where Login ='$login' and Password='$password';";
     $mysqli->runQuery($sql);
     if ($mysqli->num_rows == 1) //если есть логин и пароль - пользователь существует
     {
        //создает сессию Account
        $_SESSION['Account'] = $mysqli->getRow(); //возвращает строку с sql запроса введенного через runQuery($sql) в виде ассоциативного массива

        //создает сессию IdAccount, привязываем пользователя
        $_SESSION['IdAccount'] = $_SESSION['Account']['IdAccount'];
 // echo "Flag 1";
   }
     else //если нет, завершаем сессию
     {
        session_destroy();           
        unset($_SESSION); //освободжаем массив session, освобождаем кеш от удаленной сессии
        // var_dump($_SESSION);
     }
}
if ($_GET['action']==1){
    session_destroy();//завершаем сессию при аттрибуте action 1 при логауте
    unset($_SESSION);//освободжаем массив session, освобождаем кеш от удаленной сессии
}

require($_SERVER['DOCUMENT_ROOT']."/header.php");
?>
    <div id="templatemo_middle" class="carousel">
    	<div class="panel">
				
				<div class="details_wrapper">
					
					<div class="details">
					
						<div class="detail">
							<h2><a href="#">Station Shop</a></h2>
                            <p>Station Shop is free website template by templatemo for ecommerce websites or online stores. Sed aliquam arcu. Donec urna massa, cursus et mattis at, mattis quis lectus. </p>
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Fusce hendrerit</a></h2>
                            <p>Duis dignissim tincidunt turpis eget pellentesque. Nulla consectetur accumsan facilisis. Suspendisse et est lectus, at consectetur sem.</p>
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Aenean massa cum</a></h2>
                            <p>Sed vel interdum sapien. Aliquam consequat, diam sit amet iaculis ultrices, diam erat faucibus dolor, quis auctor metus libero vel mi.</p>
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
					</div><!-- /details -->
					
				</div><!-- /details_wrapper -->
				
				<div class="paging">
					<div id="numbers"></div>
					<a href="javascript:void(0);" class="previous" title="Previous" >Previous</a>
					<a href="javascript:void(0);" class="next" title="Next">Next</a>
				</div><!-- /paging -->
				
				<a href="javascript:void(0);" class="play" title="Turn on autoplay">Play</a>
				<a href="javascript:void(0);" class="pause" title="Turn off autoplay">Pause</a>
				
			</div><!-- /panel -->
	
			<div class="backgrounds">
				
				<div class="item item_1">
					<img src="images/slider/02.jpg" alt="Slider 01" />
				</div><!-- /item -->
				
				<div class="item item_2">
					<img src="images/slider/03.jpg" alt="Slider 02" />
				</div><!-- /item -->
				
				<div class="item item_3">
					<img src="images/slider/01.jpg" alt="Slider 03" />
				</div><!-- /item -->
				
			</div><!-- /backgrounds -->
    </div> <!-- END of templatemo_middle -->
    
    <div id="templatemo_main" style="  display: flex;
  justify-content: center;
">
        <div id="content" class="float_r">
        	<h1>New Products</h1>
            <?php
            $sql= "Select id from product"; // sql запрос в ДБ продукт
            $mysqli = new Database (); //создаем ноаый класс ДБ mysqli
            $mysqli->getConnection(); //присоединяемся к дб  
            $dat = $mysqli->getArray($sql); //записываем в $dat массив массивов из getArray($sql)
            foreach ($dat as $val) //перебираем массивы из $dat как $val, каждый $val-ассоциативный массив
            {
               $Product[$val['id']] = new Product ($val['id']); // создаем класс датабазы Product
               $Product[$val['id']]->displayCard('false');  //выбираем отображение панелей без кнопок для редактирования тк аккаунт не админский
            }
            ?>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php") ?> 
    
</div> <!-- END of templatemo_wrapper -->


</body>

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="js/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>

<script type="text/javascript">
    
    $(document).ready(function() {
        
        $(".carousel").dualSlider({
            auto:true,
            autoDelay: 6000,
            easingCarousel: "swing",
            easingDetails: "easeOutBack",
            durationCarousel: 1000,
            durationDetails: 600
        });
        
    });
</script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
<script src="js/functions.js"></script>
</html>