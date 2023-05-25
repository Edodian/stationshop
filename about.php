<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
 require_once ($_SERVER['DOCUMENT_ROOT']."/header.php") ?> 
    
    
    
    <div id="templatemo_main"style="  display: flex;
  justify-content: center;
">
        <div id="content" class="float_r">
        <h1>About Us</h1>
        	<h2>History of our online shop</h2>
        <p>Nam cursus facilisis nibh nec eleifend. Mauris nulla leo, tempus ac laoreet in, aliquet eu sem. Nullam est est, imperdiet vitae mollis nec, aliquet varius ante. Donec laoreet <a href="#">eleifend velit a tristique</a>. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vehicula elit vel ante venenatis laoreet. Station Shop is free <a rel="nofollow" href="http://www.templatemo.com">website template</a> by templatemo for ecommerce websites or online stores.</p>
        <ul class="templatemo_list">
        	<li>Donec aliquam metus a odio molestie eu consequat.</li>
            <li>Sed a rutrum risus, nam sed ligula et nunc fermentum.</li>
            <li>Maecenas sit amet diam quis sem euismod porttitor.</li>
            <li>Aliquam fermentum cursus risus aliquam erat volutpat.</li>
            <li>Sed fermentum tempus enim, eget iaculis purus imperdiet eget.</li>
		</ul>
        <div class="cleaner h20"></div>
        <h3>Background of our company</h3>
		<p>Nam nec leo. Curabitur quis eros <a href="#">a arcu feugiat</a> egestas. Nunc sagittis, dui non porttitor tincidunt, mi tortor tincidunt sem, et aliquet mi tortor eu turpis. Ut nisi ligula, viverra ac, placerat sed, ultricies vitae, neque. Morbi feugiat neque non odio eleifend pulvinar. In risus lacus, consequat eu porta ac, mattis a lacus. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
        <div class="cleaner"></div>
        <blockquote>Pellentesque vulputate cursus arcu vel pellentesque. Etiam facilisis imperdiet enim at tempus. Ut tincidunt venenatis est, quis viverra quam scelerisque vel. Aenean eu tellus a arcu blandit lobortis.
        </blockquote>
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