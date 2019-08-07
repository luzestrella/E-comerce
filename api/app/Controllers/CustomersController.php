<?php
    namespace app\Controllers;

    class CustomersController extends Controllers {
        
        function selectCustomers($request, $response) {
            $message = $this->CustomersModel->selectCustomers();
            return json_encode($message);
        }

        function insertCustomers($request, $response) {
            $customers = $request->getParsedBody();
            $message = $this->CustomersModel->insertCustomers($customers);
            return json_encode($message);
        }
    }
?>