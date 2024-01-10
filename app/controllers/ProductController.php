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

    public function productDetail()
    {
        $result = false;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = new Product();
            $product->setId($id);
            $result = $product->getDetailById();
            require_once 'app/views/product/productDetail.php';

        }
    }

}?>