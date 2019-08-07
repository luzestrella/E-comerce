<?php
    namespace app\Controllers;

    class OfficesController extends Controllers {
        
        function selectOffices($request, $response) {
            $message = $this->OfficesModel->selectOffices();
            return json_encode($message);
        }
    }
?>