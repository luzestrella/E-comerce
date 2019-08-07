<?php
    namespace app\Models;

    class OrderModel extends Models {
        public function insertOrder($order) {
           $oderNumber = time();
           $lines = $order['cart']['lines'];
           $this->db->pdo->beginTransaction();
           $this->db->insert('orders', [
               'orderNumber' => $oderNumber,
               'orderDate' => date('Y-m-d', time()),
               'requiredDate' => date('Y-m-d', time()),
               'status' => 'In Process',
               'customerNumber' => '496'
           ]);

           foreach ($lines as $key => $line) {
               $this->db->insert('orderdetails',[
                   'orderNumber' => $oderNumber,
                   'productCode' => $line['product']['productCode'],
                   'quantityOrdered' => $line['quantity'],
                   'priceEach' => $line['product']['MSRP'],
                   'orderLineNumber' => $key + 1
               ]);
           }

           if(!is_null($this->db->error()[1])) {
                $this->db->pdo->commit();
                return array('error' => true, 'Description' => $this->db->error()[2]);
           }            
           
           $this->db->pdo->commit();
           return array('success' => true, 'Description' => 'order registered');
    
        }
    }
?>