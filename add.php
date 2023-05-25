<?php session_start();
?>
<link href="css/add.css" rel="stylesheet" type="text/css" />
<div style="margin: auto;">
<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/db.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/product.php");
$product = new Product ($_GET['id']);

if ($_POST['Send'])
{
$url = '/images/items/';
   // 1)Проверяем, существует ли имя.
if($_FILES['FILE']['name']){
   
    if($_FILES['FILE']['type'] == 'image/jpeg' || $_FILES['FILE']['type'] == 'image/png') 
 {
    
// 2)Проверяем размер файла
        if($_FILES['FILE']['size'] > 0 && $_FILES['FILE']['size'] <= 1024000) 
    {
       // 3)Проверяем загрузился ли файл на сервер
        if(is_uploaded_file($_FILES['FILE']['tmp_name'])) {
            // 4)Перемещаем загруженный файл в необходимую папку $url
            $id_img = md5($_FILES['FILE']['name'].date("YmdHis"));
            if(move_uploaded_file($_FILES['FILE']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$url.$id_img.($_FILES['FILE']['type'] == 'image/jpeg' ? ".jpg":".png"))) 
            {
                  $_POST['url']=$url.$id_img.($_FILES['FILE']['type'] == 'image/jpeg' ? ".jpg":".png");
                    //Выводим сообщение что файл обработан и загружен                
            }
            else { echo 'Error to move image to '.$url;}
                                                            
        }
        else {echo 'Error to downloads images on serve';}                                               
    }
    else { echo 'Size of images is  more then 1000 Kb';}
                            
  }
  else { echo 'Format is not  JPG or PNG' ;}
                             
}
else { echo 'Images must have name!';}
//var_dump($_POST);
$product->saveData();
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Station Shop</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
</div>
<?php $product->displayInput(); ?>
