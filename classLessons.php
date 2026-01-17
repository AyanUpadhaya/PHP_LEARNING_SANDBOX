<?php

class Fruit{
    //properties
    public $name;
    public $color;
    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro() {
        echo "The fruit is $this->name and the color is $this->color.<br>";
    }
}

$apple = new Fruit('Apple', 'red');

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
    public $quanitity;

    function __construct($name, $color, $quanitity){
        $this->quanitity = $quanitity;
         parent::__construct($name, $color); // explicit call
    }
    public function message() {
        echo "Am I a fruit or a berry? ";
    }
    public function amount():void{
        echo "Total quantity: $this->quanitity";
    }
}

$strawberry = new Strawberry("Strawberry", "red",40);
// $strawberry->intro();
// $strawberry->amount();

//class constants
class MESSAGE_QUE{
    const GOOD_BYE="Thank you for visiting W3Schools.com!";
}

class ALLOW_DISCOUNT{
    const FREE_PLAN = false;
    const STARTER_PLAN = true;
    const PRO_PLAN = true;
}

// echo "Discount allowed in free plan: ".ALLOW_DISCOUNT::FREE_PLAN ;

// interface oop
interface Animal {
  public function makeSound();
}

class Cat implements Animal {
  public function makeSound() {
    echo "Meow";
  }
}

$animal = new Cat();
// $animal->makeSound();

//trait

trait ClassLessons{
    public function todayLesson(){
        echo "We learned about OOP in php today";
    }
    public function tomorrowLesson(){
        echo "Tomorrow we will learn about CRUD operations with MYSQL";
    }
    public function welcomeStudent($name):void{
        echo "Welcom $name in your dashboard";
    }
}

class StudentDashboard{
    use ClassLessons;
}

$newNotification = new StudentDashboard();

// $newNotification->tomorrowLesson();

// $newNotification->welcomeStudent("Rajib");

// static method class
class greeting {
  public static function welcome() {
    echo "Hello Ayan!";
  }
}

// Call static method
// greeting::welcome();

class AuthController{
    public static $secret_token = "hifhaidhfihqi3hhi4h483ladlfaldf%adnfk$#%akdkfadhf";
    public static function register($name,$email,$password){
       $user = [$name,$email,$password];
       return $user;
    }
}

// $newUser = AuthController::register("Ayan","ayan@gmail.com","123456");

// echo "New user registered \n";

// echo $newUser[1];

echo AuthController::$secret_token;