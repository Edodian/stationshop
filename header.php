<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Station Shop</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />
</head>

<body>

<div id="templatemo_wrapper">
	
    <header id="templatemo_header">
    
    	<div id="site_title">
        	<h1><a href="#">Station Shop</a></h1>
        </div>
        
        <div id="header_right">
            
            <!-- <a href="login.php">Log in</a> -->
             <?php if($_SESSION['IdAccount']){ ?>
              <a href="index.php?action=1" ><span>Log out</span></a>
             <?php }else{ ?>
              <a href="login.php"><span>Log in</span></a>
              <?php } ?>
		</div>
        
        <div class="cleaner"></div>

    </header>     <div id="templatemo_menu">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" >Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="faqs.php">FAQs</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($_SESSION['Account']['IsAdmin'] == 1){ //проверяем, равняется ли переменная IsAdmin 1 в таблице account, аккаунта который выбран сессией
                    ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php } ?>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
    </div> <!-- END of templatemo_menu -->
    