<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
require_once ($_SERVER['DOCUMENT_ROOT']."/header.php");
?> 
    <div id="templatemo_main" style="  display: flex;
  justify-content: center;
">
        <div id="content" class="faq float_r">
			<h2>FAQs</h2>
            <h3>How will I  know you received my order?</h3>
            <p>You'll  receive an email confirming that your order has been received. If you do not  receive an email confirmation, please check to see if the email address on your  order was entered correctly.</p>
            
            <h3>When will my order be shipped?</h3>
            <p>Please read our shipping policy. Click <a href="#">here</a></p>
            
            <h3>What payment methods do you accept?</h3>
            <p>PayPal and 2Checkout (2CO)</p>
            
            <h3>Can I return or exchange my purchase if I don't like it?</h3>
            <p>Please read our exchange policy. Click <a href="#">here</a></p>
            
            <h3>How do I know if online ordering is secure?</h3>
            <p>
            Protecting your information is a  priority for Glory Silver. We use Secure Sockets Layer (SSL) to encrypt your  credit card number, name and address so only Glory Silver is able to decode  your information. SSL is the industry standard method for computers to  communicate securely without risk of data interception, manipulation or  recipient impersonation. To be sure your connection is secure; when you are in  the Shopping Cart, look at the lower corner of your browser window. If you see  an unbroken key or closed lock, the SSL is active and your information is  secure. Since most of the customers are still uncomfortable with providing your  credit card online, we use PayPal and 2CheckOut services so they don't need to  give out credit card information. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
            <p>
            Glory Silver is registerd with HackerGuardian. HackerGuardian certification for  a hacker free website and a Credit Card TrustLogo confirming your  trustworthiness to take credit card details online.</p>		
            <h3>What is your privacy policy?</h3>
            <p>Glory Silver respects your privacy and wants to ensure that  you understand what information we need to complete your order, and what  information you can choose to share with us and with our marketing partners.  For complete information on our privacy policy, please visit our <a href="#">Privacy Policy</a>  page.</p>
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