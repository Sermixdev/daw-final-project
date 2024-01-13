<?php
require_once 'app/models/product.php';

class ProductController
{
    public function index()
    {
        $product = new Product();
        $result = $product->lastFiveNews();
        $childProduct = new Product();
        $childResult = $childProduct->childFive();
        require_once 'app/views/index/index.php';
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
        }else{
            echo "no ProductFound";
        }
    }

    public function productList()
    {
        $product = new Product();
        $totalPages = $product->totalPages();
        // Verificar si 'page' está seteado y tiene el valor 1 o si no está seteado
        if (isset($_GET['page']) && $_GET['page'] == 1 || !isset($_GET['page'])) {
            $result = $product->productList(1);
            $page=1;
        } else {
            $page=$_GET['page'];
            $result = $product->productList($page);
        }
        require_once 'app/views/product/productList.php';
    }
}

