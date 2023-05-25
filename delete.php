<?php
session_start(); 
require_once($_SERVER["DOCUMENT_ROOT"] . "/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/product.php");

if ($_GET['id']) {
    $product = new Product(addslashes($_GET['id'])); // Create product object
    $product->deleteData();
}
?>
<script>
    window.location.reload();
    window.close();
</script>
