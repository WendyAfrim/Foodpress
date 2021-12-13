<?php

// Controller destiné à la gestion des commandes

namespace App\Controllers;

use App\Core\Auth;
use App\Core\View;
use App\Models\Product;
use App\Form\ProductForm;
use App\Core\FormVerification;
use App\Core\Mailer;
use App\Form\OrderForm;
use App\Form\TypeForm;
use App\Helpers\Generator;
use App\Models\Order;
use App\Models\Type;
use App\Models\User;
use DateTime;
use PDO;

class OrderController
{

    /**
     * Commande d'un produit
     *
     * @return void
     */
    public function order_product($id)
    {
        if (!Auth::check()) header('Location: /login');

        if (!empty($_POST)) {

            $order = new Order;
            $product = (new Product)->findByOne(['id' => $id]);

            if (!$product) {
                header('Location: /shop');
            }

            $errors = FormVerification::check($_POST, OrderForm::getConfig());
            if (!$errors) {
                $date = Generator::generateDate();
                $order->setProductId($product->getId());
                $order->setUserId(Auth::id());
                $order->setQuantity($_POST['quantity']);
                $order->setCreatedAt($date);
                $order->setUpdatedAt($date);
                $order->save();
                $dirname = dirname(__DIR__, 1);

                $productName = $product->getName();
                $orderQuantity = $order->getQuantity();
                $orderDate = new DateTime($order->getCreatedAt());
                $date = $orderDate->format('d/m/Y');
                $time = $orderDate->format('H:i');

                ob_start();
                include($dirname . '/Views/Mails/order_confirmation.php');
                $orderConfirmationHtml = ob_get_contents();
                ob_end_clean();
                Mailer::sendEmail($orderConfirmationHtml, ((new User)->findByOne(['id' => Auth::id()]))->getEmail(), 'Confirmation de votre commande');
            }
        } else {
            header('Location: /shop');
        }

        $view = new View('Order/confirm', 'front-template');
        $view->errors = $errors ?? null;
        $view->product = $product;
        $view->order = $order;
        $view->title = "Confirmation de commande";
    }
}
