<?php

namespace App\Controllers;

use App\Core\FormVerification;
use App\Core\View;
use App\Form\SettingsForm;
use App\Models\User;
use App\Models\Product;
use App\Models\Setting;

class DashboardController
{

    public function dashboard()
    {
        $user = new User();
        $users = $user->findBy(['role' => "client"]);

        $view = new View('Dashboard/index', 'back-template');
        $view->title = 'Tableau de bord - Foodpress';

        $view->users = $users;

        $product = new Product();
        $products = $product->findAll();
        $view->products = $products;

    }

    public function settings() {

        $setting = new Setting;
        $config = SettingsForm::getConfig();
        if (!empty($_POST)) {
            $errors = FormVerification::check($_POST, $config);
            if (!$errors) {
                foreach ($_POST as $postKey => $postValue) {
                    $setting = $setting->findByOne(['name' => $postKey]);
                    $setting->setValue($postValue);
                    $setting->save();
                }
                header('Location: /admin/settings');
            }
        }

        $settings = $setting->findAll();
        $filteredSettings = array_map(function($setting) {
            return ["{$setting->getName()}" => $setting->getValue()];
        }, $settings);
        $filteredSettings = call_user_func_array('array_merge', $filteredSettings);

        $form = new SettingsForm($filteredSettings);
        
        $view = new View('Admin/settings', 'back-template');
        $view->errors = $errors ?? null;
        $view->form = $form->renderHtml();
    }
}
