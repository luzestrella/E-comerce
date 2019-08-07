<?php
    namespace app\Controllers;

    class EmployeesController extends Controllers {
        
        function selectEmployees($request, $response) {
            $message = $this->EmployeesModel->selectEmployees();
            return json_encode($message);
        }

        function selectEmployee($request, $response, array $args) {
            $number = $args['employeesNumber'];
            $message = $this->EmployeesModel->selectEmployee($number);
            return json_encode($message);
        }

        function insertEmployees($request, $response) {
            $employees = $request->getParsedBody();
            $message = $this->EmployeesModel->insertEmployees($employees);
            return json_encode($message);
        }

        function updateEmployees($request, $response) {
            $employees = $request->getParsedBody();
            $message = $this->EmployeesModel->updateEmployees($employees);
            return json_encode($message);
        }

        
    }
?>