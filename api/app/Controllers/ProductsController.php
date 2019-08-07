<?php
    namespace app\Controllers;

    class ProductsController extends Controllers {
        
        function selectProducts($request, $response) {
            $message = $this->ProductsModel->selectProducts();
            return json_encode($message);
        }

        function insertProducts($request, $response) {
            $products = $request->getParsedBody();
            $message = $this->ProductsModel->insertProducts($products);
            return json_encode($message);
        }
    }
?>