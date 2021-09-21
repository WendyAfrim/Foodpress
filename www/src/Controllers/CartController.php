<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Cart;


class CartController {

    public function confirm_order() {

        $order = new Cart();

        $date = new \Datetime;
        $date = $date->format('Y-m-d H:i:s');

        $order->setReference("Chicken");
        $order->setStatus('Ready');
        $order->setamount(5.59);
        $order->setPaymentMethod('CB');
        $order->setDate($date);
        $order->setAddress('1 place Henri Barbusse');
        $order->setZipcode('92300');
        $order->setCity('Levallois');
        $order->setPhone('33618377546');
        $order->setUserId('2');
        
        // echo '<pre>';
        // var_dump($order);
        // echo '</pre>';
        // die;

        $order->save();
    
    }

}