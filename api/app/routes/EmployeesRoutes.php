<?php
    $app->get('/employees','EmployeesController:selectEmployees');
    $app->get('/employees/{employeesNumber}','EmployeesController:selectEmployee');
    $app->post('/employees','EmployeesController:insertEmployees');
    $app->put('/employees','EmployeesController:updateEmployees');
?>