<?php
require_once 'app/models/product.php';
class ProductController{
    public function index(){
        $product = new Product();
        $result = $product->lastFiveNews();
        $childProduct = new Product();
        $childResult = $childProduct->childFive();
        ?>


        <?php require_once 'app/views/index/index.php';
    }
}?>