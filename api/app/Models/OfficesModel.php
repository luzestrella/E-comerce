<?php
    namespace app\Models;

    class OfficesModel extends Models {
        public function selectOffices () {
            
            $result = $this->db->select('offices',[
                'officeCode',
                'city',
                'phone',
                'addressLine1',
                'addressLine2',
                'state',
                'country',
                'postalCode',
                'territory'
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
                'description' => 'The Offices were found',
                'Offices' => $result
            );
        }
    }
?>