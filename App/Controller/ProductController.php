<?php
namespace App\Controller;
class ProductController{
    public static function add_product($name,$price,$qty){
        return ["product_name"=>$name,"product_price"=>$price,"product_qty"=>$qty];
    }
}