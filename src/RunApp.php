<?php
require"vendor/autoload.php";
use academic\Basic;
use academic\College;
use academic\Tertiary;

class RunApp{
    public function __construct(){

    }

    public function basic(){
        $basic = new academic\Basic("olamilekan","Basic1","iba new site ojo","male");
        echo $basic->firstName;
        echo "Hello am from basic class";
    }

    public function college(){
        echo "Hello am from basic class";
    }

    public function tertiary(){
        echo "Hello am from basic class";
    }
}

$result =  new RunApp();
$result->basic();
?>