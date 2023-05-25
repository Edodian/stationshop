<?php 
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]."/db.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/product.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <?php require_once ($_SERVER['DOCUMENT_ROOT']."/header.php") ?>
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	
            <div class="sidebar_box" ><span class="bottom"></span>
            	<h3>Admin panel</h3>   
                <div class="content"> 
                	<div class="bs_box">
                        <h4><a href="add.php" target="_blank">Add new products</a></h4><br>
                        <div class="cleaner"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
        	<h1>Administrate</h1>
            <?php
            $sql= "Select id from product";
            $mysqli = new Database ();
            $mysqli->getConnection();
            $dat = $mysqli->getArray($sql);
            foreach ($dat as $val)
            {
               $Product[$val['id']] = new Product ($val['id']);
               $Product[$val['id']]->displayCard('true');
            }
        ?>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php") ?> 
    
</div> <!-- END of templatemo_wrapper -->


</body>
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

<script>
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
</html>