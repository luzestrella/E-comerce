<?php
    namespace app\Models;

    class EmployeesModel extends Models {
        public function selectEmployees () {
            
            // $result = $this->db->select('employees',[
            //     'employeeNumber',
            //     'lastName',
            //     'firstName',
            //     'extension',
            //     'email',
            //     'officeCode',
            //     'reportsTo',
            //     'jobTitle'
            // ]);
            
            // if(!is_null($this->db->error()[1])) {
            //     return array(
            //         'error' => true,
            //         'description' => $this->db->error()[2]
            //     );
            // } else if(empty($result)) {
            //     return array (
            //         'notFound' => true,
            //         'description' => 'The result is empty'
            //     );
            // }

            // return array (
            //     'success' => true,
            //     'description' => 'The employees were found',
            //     'employees' => $result
            // );

            $sth = $this->db->pdo->prepare('SELECT * FROM employees');

            if(!$sth->execute()) {
                return array(
                    'success' => false,
                    'description' => $sth->errorInfo()[1]
                );
            }
            return array (
                'success' => true,
                'description' => 'The employees were found',
                'employees' => $sth->fetchAll($this->db->pdo__FETCH_ASSOC)
            );
        }

        public function selectEmployee ($number) {
            $sth = $this->db->pdo->prepare('SELECT * FROM employees WHERE employeeNumber = :employeeNumber');
            $sth->bindParam(':employeeNumber', $number, \PDO::PARAM_INT);
            if(!$sth->execute()) {
                return array(
                    'success' => false,
                    'description' => $sth->errorInfo()[1]
                );
            }
            return array (
                'success' => true,
                'description' => 'The employee was found',
                'employees' => $sth->fetchAll($this->db->pdo::FETCH_ASSOC)
            );
        }

        public function insertEmployees($employees) {
            // var_dump('Hola');die();
            // $result = $this->db->insert('employees', [
            //     'employeeNumber' => $employees['employeeNumber'],
            //     'lastName' => $employees['lastName'],
            //     'firstName' => $employees['firstName'],
            //     'extension' => $employees['extension'],
            //     'email' => $employees['email'],
            //     'officeCode' => $employees['officeCode'],
            //     'reportsTo' => $employees['reportsTo'],
            //     'jobTitle' => $employees['jobTitle']
            // ]);

            // if(!is_null($this->db->error()[1])) {
            //     return array(
            //         'success' => false,
            //         'description' => $this->db->error()[2]
            //     );
            // }
            // return array (
            //     'success' => true,
            //     'description' => 'The employees was inserted'
            // );
            
            $employeeNumber = $employees['employeeNumber'];
            $lastName = $employees['lastName'];
            $firstName = $employees['firstName'];
            $extension = $employees['extension'];
            $email = $employees['email'];
            $officeCode = $employees['officeCode'];
            $reportsTo = $employees['reportsTo'];
            $jobTitle = $employees['jobTitle'];
            
            $sth = $this->db->pdo->prepare('INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, reportsTo, jobTitle) VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :reportsTo, :jobTitle)');
            
            $sth->bindParam(':employeeNumber', $employeeNumber, \PDO::PARAM_INT);
            $sth->bindParam(':lastName', $lastName, \PDO::PARAM_STR, 50);
            $sth->bindParam(':firstName', $firstName, \PDO::PARAM_STR, 50);
            $sth->bindParam(':extension', $extension, \PDO::PARAM_STR, 10);
            $sth->bindParam(':email', $email, \PDO::PARAM_STR, 100);
            $sth->bindParam(':officeCode', $officeCode, \PDO::PARAM_STR, 10);
            $sth->bindParam(':reportsTo', $reportsTo, \PDO::PARAM_INT);
            $sth->bindParam(':jobTitle', $jobTitle, \PDO::PARAM_STR, 50);
           
            if(!$sth->execute()) {
                return array(
                    'success' => false,
                    'description' => $sth->errorInfo()[1]
                );
            }
            return array (
                'success' => true,
                'description' => 'The employees was inserted'
            );
            
        }

        public function updateEmployees($employees) {

            $employeeNumber = $employees['employeeNumber'];
            $lastName = $employees['lastName'];
            $firstName = $employees['firstName'];
            $extension = $employees['extension'];
            $email = $employees['email'];
            $officeCode = $employees['officeCode'];
            $reportsTo = $employees['reportsTo'];
            $jobTitle = $employees['jobTitle'];
            
            $sth = $this->db->pdo->prepare('UPDATE employees SET lastName= :lastName, firstName= :firstName , extension= :extension, email= :email, officeCode= :officeCode, reportsTo= :reportsTo, jobTitle= :jobTitle WHERE employeeNumber=:employeeNumber');
            
            $sth->bindParam(':employeeNumber', $employeeNumber, \PDO::PARAM_INT);
            $sth->bindParam(':lastName', $lastName, \PDO::PARAM_STR, 50);
            $sth->bindParam(':firstName', $firstName, \PDO::PARAM_STR, 50);
            $sth->bindParam(':extension', $extension, \PDO::PARAM_STR, 10);
            $sth->bindParam(':email', $email, \PDO::PARAM_STR, 100);
            $sth->bindParam(':officeCode', $officeCode, \PDO::PARAM_STR, 10);
            $sth->bindParam(':reportsTo', $reportsTo, \PDO::PARAM_INT);
            $sth->bindParam(':jobTitle', $jobTitle, \PDO::PARAM_STR, 50);
           
            if(!$sth->execute()) {
                return array(
                    'success' => false,
                    'description' => $sth->errorInfo()[1]
                );
            }
            return array (
                'success' => true,
                'description' => 'The employees was Update'
            );
        }
    }
?>