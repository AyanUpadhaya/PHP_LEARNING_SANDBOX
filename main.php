<?php
require_once __DIR__ . '/vendor/autoload.php';
//composer dump-autoload
use App\Models\User;
use App\Admin\User as AdminUser;
use App\Controller\AuthController;
use App\Controller\ProductController;

use function App\Utils\formatPrice;
use function App\Utils\slugify;

$modelUser = new User();
$adminUser = new AdminUser();

// $adminUser->sayHello();

// echo formatPrice(1234.5);
// echo slugify("Hello World!");

//register new user

$newUser = AuthController::register("Ayan","ayan@gmail.com","123456");

// echo "New user registered \n";
// echo $newUser[1];

$newProduct = ProductController::add_product("Iphone16Pro","1,00,000",36);

echo $newProduct['product_name'];

