<?php
    namespace app\Models;

    class CustomersModel extends Models {
        public function selectCustomers () {
            
            $result = $this->db->select('customers',[
                'customerNumber',
                'customerName',
                'contactLastName',
                'contactFirstName',
                'phone',
                'addressLine1',
                'addressLine2',
                'city',
                'state',
                'postalCode',
                'country',
                'salesRepEmployeeNumber',
                'creditLimit'
            ]);
            
            if(!is_null($this->db->error()[1])) {
                return array(
                    'error' => true,
                    'description' => $this->db->error()[2]
                );
            } else if(empty($result)) {
                return array (
                    'notFound' => true,
                    'description' => 'The result is empty'
                );
            }

            return array (
                'success' => true,
                'description' => 'The Customers were found',
                'Customers' => $result
            );
        }
    }
?>